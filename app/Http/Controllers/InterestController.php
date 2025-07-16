<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use App\Models\User;
use App\Models\Make;
use App\Models\VehicleModel;
use App\Models\ModelVariant;
use App\Models\Year;
use App\Models\AuctionPlatform;
use App\Models\BodyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {


            $search = $request->input('search.value');
            $start = $request->input('start') ?? 0;
            $length = $request->input('length') ?? 10;

            $query = Interest::where("user_id", Auth::user()->id);
             if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('tickets.issue_topic', 'like', "%{$search}%")
                    ->orWhere('tickets.issue_type', 'like', "%{$search}%");
                    // ->orWhere('users.companyName', 'like', "%{$search}%");
                });
            }

            $totalData = clone $query;
            $data = $query->select(
                    'interest.*',
            )
            ->orderBy('created_at','desc')
            ->offset($start)
            ->limit($length)
            ->get()
            ->map(function ($row) {

                 

                  return [
                      $row->id,
                      '',
                      '',
                      '',
                      '', 
                      '',
                      '',
                      '',
                  ];

              });

    
                return  [
                    "draw" => intval($request->input('draw')),
                    "recordsTotal" => $totalData->count(),
                    "recordsFiltered" => $totalData->count(),
                    "data" => $data
                ];
        }
        
        return view('user.interests.index',[]);

    }


    public function create()
    {
        return view('user.interests.create', [
            'makes' => Make::all(),
            'models' => VehicleModel::all(),
            'years' => Year::all(),
            'modelVariants' => ModelVariant::all(),
            'auctionHouses' => AuctionPlatform::all(),
            'bodyTypes' => BodyType::all(),
        ]);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'make_id' => 'required|integer|exists:make,id',
        'model_id' => 'required|integer|exists:model,id',
        'model_variant_id' => 'nullable|integer|exists:model_variant,id',
        'year_from' => 'nullable|integer',
        'year_to' => 'nullable|integer',
        'transmission' => 'nullable|string|max:255',
        'engine_size_min' => 'nullable|numeric',
        'engine_size_max' => 'nullable|numeric',
        'mileage_max' => 'nullable|numeric',
        'auction_house_id' => 'nullable|integer|exists:auction_platform,id',
        'auction_grade_condition' => 'nullable|string|max:255',
        'previous_owners_max' => 'nullable|integer',
        'body_type_id' => 'nullable|integer|exists:body_types,id',
        'no_of_service_max' => 'nullable|integer',
        'estimated_retail_value_min' => 'nullable|numeric',
        'estimated_retail_value_max' => 'nullable|numeric',
    ]);

    $validatedData['user_id'] = Auth::id();

    Interest::create($validatedData);

    return redirect()->route('interests.index')->with('success', 'Interest created successfully.');
    }



    public function getModelsByMake(Request $request)
    {
        $models = VehicleModel::where('make_id', $request->make_id)->get();
        return response()->json($models);
    }


    public function getVariantsByModel(Request $request)
    {
        $modelId = $request->model_id;
        $variants = \App\Models\ModelVariant::where('model_id', $modelId)->get(); // Adjust namespace if needed

        return response()->json($variants);
    }

    

    public function show(Interest $interest)
    {
        return view('user.interests.show', compact('interest'));
    }

    public function edit(Interest $interest)
    {
        return view('user.interests.edit', [
            'interest' => $interest,
            'makes' => Make::all(),
            'models' => VehicleModel::all(),
            'years' => Year::all(),
            'modelVariants' => ModelVariant::all(),
            'auctionHouses' => AuctionPlatform::all(),
            'bodyTypes' => BodyType::all(),
        ]);
    }

    public function update(Request $request, Interest $interest)
    {
        $interest->update($request->all());
        return redirect()->route('interests.index')->with('success', 'Interest updated successfully.');
    }

        public function destroy(Interest $interest)
        {
            $interest->delete();
            return redirect()->route('interests.index')->with('success', 'Interest deleted successfully.');
        }
}
