<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use DataTables;

class UserController extends Controller
{

    public function index(Request $request)
    {

        if($request->ajax()) {

            $search = $request->input('search.value');
            $start = $request->input('start') ?? 0;
            $length = $request->input('length') ?? 10;
            
            $query = User::Leftjoin('users', 'users.id', '=', 'tickets.user_id');

             if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('users.id', 'like', "%{$search}%")
                    ->orWhere('users.firstName', 'like', "%{$search}%");
                });
            }

            $totalData = clone $query;
            $data = $query->select(
                    'users.*',
            )
            ->orderBy('users.created_at','desc')
            ->offset($start)
            ->limit($length)
            ->get()
            ->map(function ($row) {
        
                    $html = '';
                    $html .= '<a href="' .url('/admin/users/'.$row->id). '" class="btn btn-sm btn-warning" >View</a>';
                    $html .= '<a href="' .url('/admin/users/'.$row->id.'/edit'). '" class="btn btn-sm btn-warning" >Edit</a>';
                    $html .= '<form action="' .url('/admin/users/'.$row->id). '" method="POST" style="display:inline-block;">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Delete this news?\')">Delete</button>
                    </form>';

                    $status =  $row->status == 1 ? '<a href="'.url('/admin/users/'.$row->id.'/status/0').'" class="btn btn-success btn-sm">Active</a>' : 
                    '<a href="'.route('admin.users.status', [$row->id, 1]).'" class="btn btn-danger btn-sm">Deactive</a>';
            
                  return [
                        $row->id,
                        $row->company,
                        $row->firstName.' '.$row->surname,
                        $row->email,
                        $status,
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

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

     public function create(Request $request)
    {
        return view('admin.users.edit',[

        ]);

    }

     public function store(Request $request)
    {

        dd($request->all());   
    }



    public function edit($id)
    {

        if($id == 0){
            $user = false;
        }else{
            $user = User::findOrFail($id);
        }
        
        $data = ['user' => $user];

        return view('admin.users.edit',$data);
    }


    public function update(Request $request, $id)
    {
        
        if($id == 0){
            $user = new User();
        }else{
            $user = User::findOrFail($id);
        }

        $validations = [
            'businessEmail' => 'required|email',
            'personalEmail' => 'required|email',
            'password' => 'nullable|string',
            'avatar' => 'nullable|file',
            'uploadID' => 'nullable|file',
            'motorTradeProof' => 'nullable|file',
            'addressProof' => 'nullable|file',
        ];

        $request->validate($validations);

        $user->companyName = $request->companyName;
        $user->businessType = $request->businessType;
        $user->companyReg = $request->companyReg;
        $user->website = $request->website;
        $user->businessEmail = $request->businessEmail;
        $user->motorTradeInsurance = $request->motorTradeInsurance;
        $user->vatNumber = $request->vatNumber;
        $user->companyAddress1 = $request->companyAddress1;
        $user->companyAddress2 = $request->companyAddress2;
        $user->townCity = $request->townCity;
        $user->country = $request->country;
        $user->postcode = $request->postcode;
        $user->telephone = $request->telephone;
        
        $user->firstName = $request->firstName;
        $user->surname = $request->surname;
       
        $user->title = $request->title;
        $user->jobTitle = $request->jobTitle;
        $user->phone = $request->phone;
        $user->personalEmail = $request->personalEmail;
        $user->status = $request->status;
        $user->user_type = 0;


        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->file('avatar')) {
            // Remove existing thumbnail if it exists
            if ($user->avatar && file_exists(public_path('uploads/' . $user->avatar))) {
                unlink(public_path('uploads/' . $user->avatar));
            }
            $fileName = time() . '__ff__' . $request->file('avatar')->getClientOriginalName();
            $filePath = public_path('uploads/avatar');
            $request->file('avatar')->move($filePath, $fileName);
            $user->avatar = $fileName;
            // $user->save();
        }

        if ($request->file('uploadID')) {
            // Remove existing thumbnail if it exists
            if ($user->uploadID && file_exists(public_path('uploads/' . $user->uploadID))) {
                unlink(public_path('uploads/' . $user->uploadID));
            }
            $fileName = time() . '__ff__' . $request->file('uploadID')->getClientOriginalName();
            $filePath = public_path('uploads/uploadID');
            $request->file('uploadID')->move($filePath, $fileName);
            $user->uploadID = $fileName;
            // $user->save();
        }

        if ($request->file('motorTradeProof')) {
            // Remove existing thumbnail if it exists
            if ($user->motorTradeProof && file_exists(public_path('uploads/' . $user->motorTradeProof))) {
                unlink(public_path('uploads/' . $user->motorTradeProof));
            }
            $fileName = time() . '__ff__' . $request->file('motorTradeProof')->getClientOriginalName();
            $filePath = public_path('uploads/motorTradeProof');
            $request->file('motorTradeProof')->move($filePath, $fileName);
            $user->motorTradeProof = $fileName;
            // $user->save();
        }

        if ($request->file('addressProof')) {
            // Remove existing thumbnail if it exists
            if ($user->addressProof && file_exists(public_path('uploads/' . $user->addressProof))) {
                unlink(public_path('uploads/' . $user->addressProof));
            }
            $fileName = time() . '__ff__' . $request->file('addressProof')->getClientOriginalName();
            $filePath = public_path('uploads/addressProof');
            $request->file('addressProof')->move($filePath, $fileName);
            $user->addressProof = $fileName;
            // $user->save();
        }

        $user->save();

        return redirect('/admin/users')->with('success', 'User updated successfully.');        

    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/admin/users')->with('success', 'User deleted successfully.');
    }

    public function updateStatus($id, $status)
    {
        $user = User::findOrFail($id);
        $user->status = $status;
        $user->save();

        return redirect('/admin/users')->with('success', 'User status updated.');
    }
}
