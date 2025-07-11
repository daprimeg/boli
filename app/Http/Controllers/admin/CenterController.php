<?php


namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\AuctionCenter;
use App\Models\Make;
use App\Models\ModelVariant;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CenterController extends Controller
{

   public function getCenters(Request $request)
  {

        $search = $request->input('q');
        $models = AuctionCenter::where('name', 'like', "%$search%")
            ->select('id', 'name as text')
            ->limit(20)
            ->get();

        return response()->json(['results' => $models]);
  }


   public function index(Request $request)
  {
   
    if ($request->ajax()) {

            $search = $request->input('search.value');
            $start = $request->input('start') ?? 0;
            $length = $request->input('length') ?? 10;

            $query = AuctionCenter::join('auction_platform','auction_platform.id','=','auction_center.auction_platform_id');

            if(!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('auction_center.id', 'like', "%{$search}%")
                     ->orWhere('auction_center.name', 'like', "%{$search}%")
                     ->orWhere('auction_platform.name', 'like', "%{$search}%");
                });
            }

            $totalData = clone $query;
            $data = $query->select([
                'auction_center.*',
                'auction_platform.name AS center_name'
            ])
            ->orderBy('created_at','desc')
            ->offset($start)
            ->limit($length)
            ->get()
            ->map(function ($item) {

                $html = '<a href="' .URL::to('/admin/masters/centers/'.$item->id.'/edit').'" class="btn btn-sm btn-warning">Edit</a>
                        <form method="POST" action="' .URL::to('/admin/masters/centers/'.$item->id).'" style="display:inline-block">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                        </form>';

                  return [
                      $item->id,
                      $item->name,
                      $item->center_name,
                      $item->created_at,
                      $item->updated_at,
                      $html,
                  ];

              });

              return response()->json([
                    "draw" => intval($request->input('draw')),
                    "recordsTotal" => $totalData->count(),
                    "recordsFiltered" => $totalData->count(),
                    "data" => $data
                ],200);
        }

        return view('admin.masters.centers.index');
    }


    public function create()
    {
        return view('admin.masters.centers.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'auction_platform_id' => 'required|integer|exists:auction_platform,id',
        ]);

        AuctionCenter::create([
            'name' => $request->name,
            'auction_platform_id' => $request->auction_platform_id,
            'created_at' => Carbon::now(),
            'updated_at' => NULL,
        ]);

        return redirect('/admin/masters/centers')->with('success', 'Center created successfully');

    }


    public function edit($id)
    {
        $model = AuctionCenter::findOrFail($id);
        return view('admin.masters.centers.edit', compact('model'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'auction_platform_id' => 'required|integer|exists:auction_platform,id',
        ]);

        $model =  AuctionCenter::findOrFail($id);

        $model->update([
            'name' => $request->name,
            'auction_platform_id' => $request->auction_platform_id,
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/admin/masters/centers')->with('success', 'Center Updated successfully.');
    }


    public function destroy($id)
    {

        $model = AuctionCenter::findOrFail($id);

        if(Vehicle::where('center_id',$id)->first()){
            return redirect('/admin/masters/centers')->with('warning','Cannot Delete Exist In Vehicle');
        }

    
        $model->delete();

        return redirect('/admin/masters/centers')->with('success', 'Deleted successfully.');

    }


}
