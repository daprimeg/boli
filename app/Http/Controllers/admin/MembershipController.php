<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;
use App\Models\Membership;
use App\Models\MembershipPayment;
use DataTables;
use Illuminate\Support\Facades\URL;

class MembershipController extends Controller
{
    public function index(Request $request) {


         if ($request->ajax()) {

            $search = $request->input('search.value');
            $start = $request->input('start') ?? 0;
            $length = $request->input('length') ?? 10;
            
            $query = Membership::Leftjoin('users', 'users.id', '=', 'memberships.user_id')
            ->Leftjoin('membership_plans', 'membership_plans.id', '=', 'memberships.plan_id');

             if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    
                    $q->where('memberships.membership_id', 'like', "%{$search}%")
                    ->orWhere('users.firstName', 'like', "%{$search}%")
                    ->orWhere('users.surname', 'like', "%{$search}%")
                    ->orWhere('users.personalEmail', 'like', "%{$search}%")
                    ->orWhere('membership_plans.plan_name', 'like', "%{$search}%");

                    // ->orWhere('users.companyName', 'like', "%{$search}%");
                });
            }

                
            $totalData = clone $query;
            $data = $query->select(
                    'memberships.*',
                    'users.firstName',
                    'users.surname',
                    'users.personalEmail',
                    'membership_plans.plan_name',
                    'membership_plans.price',
            )
            ->orderBy('created_at','desc')
            ->offset($start)
            ->limit($length)
            ->get()
            ->map(function ($item) {
        
                    
                    $html = '<a href="'.URL::to('/admin/memberships/'.$item->membership_id.'/edit').'" class="btn btn-sm btn-primary">Edit</a>
                        <form action="'.URL::to('/admin/memberships/'.$item->membership_id).'" method="POST" style="display:inline-block;">
                            '.csrf_field().method_field('POST').'
                            <button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                        </form>';

                    $badgeClass = match($item->membership_status) {
                        'Active' => 'bg-success',
                        'Inactive' => 'bg-secondary',
                        'Pending' => 'bg-warning',
                        default => 'bg-danger'
                    };
                
                  return [
                      $item->membership_id,
                      $item->firstName . ' ' . $item->surname . '<br><small class="text-muted">' . $item->personalEmail . '</small>',
                      $item->plan_name . '<br><small class="text-muted">£' . number_format($item->price, 2) . '</small>',
                     '<span class="badge ' . $badgeClass . '">' . $item->membership_status . '</span>',
                      $item->membership_start_date ? \Carbon\Carbon::parse($item->membership_start_date)->format('Y-m-d') : '',
                      $item->membership_expiry_date ? \Carbon\Carbon::parse($item->membership_expiry_date)->format('Y-m-d') : '',
                      $item->created_at ? $item->created_at->format('Y-m-d') : '',
                      $html,
                  ];
              });

                return  [
                    "draw" => intval($request->input('draw')),
                    "recordsTotal" => $totalData->count(),
                    "recordsFiltered" => $totalData->count(),
                    "data" => $data
                ];
        
        }
    
        return view('admin.memberships.index');

    }

    public function create() {
        $plans = Plan::all();
        return view('admin.memberships.create', compact('plans'));
    }

    public function fetchUser(Request $request) {
        $user = User::where('personalEmail', $request->email)->first();
        return response()->json($user);
    }


    public function edit($id)
    {
    $membership = Membership::with(['user', 'plan'])->findOrFail($id);
    $plans = Plan::all();
    $paymentMethods = ['paypal', 'stripe', 'manual'];

    return view('admin.memberships.edit', compact('membership', 'plans', 'paymentMethods'));
    }



    public function update(Request $request, $id)
    {
        // dd($request->all());

        $membership = Membership::findOrFail($id);

        $request->validate([
            'plan_id' => 'required|integer',
            'membership_type' => 'required|string',
            'membership_status' => 'required|string',
        ]);

        $membership->plan_id = $request->plan_id;
        $membership->membership_status = $request->membership_status;
        $membership->membership_type = $request->membership_type;

        if ($request->membership_type === 'custom') {
            $membership->membership_start_date = $request->membership_start_date;
            $membership->membership_expiry_date = $request->membership_expiry_date;
        } else {

            // auto-calculate based on type
            $start = now();
            $end = match($request->membership_type) {
                'weekly' => $start->copy()->addWeek(),
                'monthly' => $start->copy()->addMonth(),
                'yearly' => $start->copy()->addYear(),
            };

            $membership->membership_start_date = $start;
            $membership->membership_expiry_date = $end;

        }

        $membership->save();

        return redirect()->route('admin.memberships.index')->with('success', 'Membership updated successfully.');
    }

    public function store(Request $request) {

        $request->validate([
            'email' => 'required|email|exists:users,personalEmail',
            'plan_id' => 'required|exists:membership_plans,id',
            'membership_type' => 'required|in:weekly,monthly,yearly,custom',
            'payment_method' => 'required|in:paypal,stripe,manual',
            'amount' => 'required|numeric',
            'currency' => 'required|string|max:10',
            'payment_status' => 'required|in:Pending,Completed,Failed,Refunded',
        ]);

        $user = User::where('personalEmail', $request->email)->first();

        // dd($request->all());

        // Start & expiry calculation
        $start_date = now();
        if ($request->membership_type === 'weekly') {
            $expiry_date = now()->addWeek();
        } elseif ($request->membership_type === 'monthly') {
            $expiry_date = now()->addMonth();
        } elseif ($request->membership_type === 'yearly') {
            $expiry_date = now()->addYear();
        } else {
            $start_date = $request->start_date;
            $expiry_date = $request->end_date;
        }

        $membership = Membership::create([
            'user_id' => $user->id,
            'plan_id' => $request->plan_id,
            'membership_start_date' => $start_date,
            'membership_expiry_date' => $expiry_date,
            'membership_status' => 'Active',
            'membership_type' => $request->membership_type,
        ]);

        MembershipPayment::create([
            'user_id' => $user->id,
            'membership_id' => $membership->membership_id,
            'plan_id' => $request->plan_id,
            'payment_date' => now(),
            'payment_method' => $request->payment_method,
            'transaction_id' => $request->transaction_id ?? '',
            'payer_id' => $request->payer_id ?? '',
            'charge_id' => $request->charge_id ?? '',
            'amount' => $request->amount,
            'currency' => $request->currency,
            'payment_status' => $request->payment_status,
        ]);

        return redirect()->route('admin.memberships.index')->with('success', 'Membership created successfully.');
        
    }


    public function destroy($id)
    {
    $membership = Membership::findOrFail($id);
    $membership->delete();

    return redirect()->route('admin.memberships.index')->with('success', 'Membership deleted successfully.');
    }

}
