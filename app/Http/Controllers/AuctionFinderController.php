<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Auctions;
use App\Models\AutoBasic;
use App\Models\AutoAdvance;
use App\Models\AutoPrice;
use App\Models\AutoLegal;
use App\Models\AuctionPlatform;
use App\Models\AuctionCenter;
use App\Models\VehicleType;
use App\Models\Make;
use App\Models\VehicleModel;
use App\Models\ModelVariant;
use App\Models\Year;
use App\Models\BodyType;
use App\Models\Color;
use App\Models\Vehicle;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class AuctionFinderController extends Controller
{

    public function index()
    {

        $platforms = AuctionPlatform::all();
        $vehicles = [];

        $vehicleTypes = VehicleType::withCount(['vehicle as total'])->whereHas('vehicle')->get();

        $vehiclemakes = Make::withCount(['vehicle as total'])->whereHas('vehicle')->get();

        $vehiclemodels = VehicleModel::withCount(['vehicle as total'])->whereHas('vehicle')->get();

        $vehiclevariants  = ModelVariant::withCount(['vehicle as total'])->whereHas('vehicle')->get();

        $vehiclebodys = BodyType::withCount(['vehicle as total'])->whereHas('vehicle')->get();

        $vehiclecolors = Color::withCount(['vehicle as total'])->whereHas('vehicle')->get();
        

        $transmissions = Vehicle::select('transmission', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('transmission')
            ->where('transmission', '!=', '')
            ->groupBy('transmission')
            ->orderByDesc('total')
            ->get();

        $fuel_types = Vehicle::select('fuel_type', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('fuel_type')
            ->where('fuel_type', '!=', '')
            ->groupBy('fuel_type')
            ->orderByDesc('total')
            ->get();

        $doors = Vehicle::select('doors', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('doors')
            ->where('doors', '!=', '')
            ->groupBy('doors')
            ->orderByDesc('total')
            ->get();

        $seats = Vehicle::select('seats', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('seats')
            ->where('seats' , '!=', '')
            ->groupBy('seats')
            ->orderByDesc('seats')
            ->get();

        $grades = Vehicle::select('grade', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('grade')
            ->where('grade' , '!=', '')
            ->groupBy('grade')
            ->orderByDesc('grade')
            ->get();

        $vehicleyears = Vehicle::select('year', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('year')
            ->where('year' , '!=', '')
            ->groupBy('year')
            ->orderByDesc('year')
            ->get();  

        $v5 = Vehicle::select('v5', \DB::raw('COUNT(*) as total'))
            ->where('v5', '=', 'present')
            ->groupBy('v5')
            ->orderByDesc('total')
            ->get();

        $cc = Vehicle::select('cc', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('cc')
            ->where('cc' , '!=', '')
            ->groupBy('cc')
            ->orderByDesc('cc')
            ->get();

        $vehicleyears = Vehicle::select('year', \DB::raw('COUNT(*) as total'))
        ->whereNotNull('year')
        ->where('year', '!=', '')
        ->groupBy('year')
        ->orderByDesc('year')
        ->get();

        $former_keepers = Vehicle::select('former_keepers', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('former_keepers')
            ->where('former_keepers' , '!=', '')
            ->groupBy('former_keepers')
            ->orderByDesc('former_keepers')
            ->get();

        $number_of_services = Vehicle::select(
            \DB::raw("COALESCE(no_of_services, 'None') as no_of_services"),
            \DB::raw('COUNT(*) as total')
        )
        ->groupBy('no_of_services')
        ->orderByDesc('total')
        ->get();

        return view('user.auctionfinder.index', compact(
            'platforms', 'vehicleTypes', 'vehiclemakes', 'vehiclemodels', 'vehiclevariants',
            'vehicleyears', 'transmissions', 'fuel_types', 'vehiclebodys', 'vehiclecolors',
            'doors', 'seats', 'grades', 'v5', 'cc', 'former_keepers', 'number_of_services', 'vehicles'
        ));

    }
    

    public function vehicle($id)
    {
        
        $vehicle = Vehicle::where('id',$id)->first();
        if(!$vehicle){
            return back()->with('error','Vehicle Not Found');
        }

        $auctionsPlatform = AuctionPlatform::all();
        $colors = DB::table('color')->where('id', $vehicle->color_id)->first();
        $biddingHistoryArray = json_decode($vehicle->bidding_history, true);

        $data = [
            'vehicle' => $vehicle,
            'colors' => $colors,
            'auctionsPlatform' => $auctionsPlatform,
            'biddingHistoryArray' => $biddingHistoryArray,
        ];
        
        return view('user.auctionfinder.vehicle.index',$data);

    }


    public function auctionScheduler(Request $request){

            if ($request->ajax()) {
                // $search = $request->input('search.value');
                
                $start = $request->input('start') ?? 0;
                $length = $request->input('length') ?? 10;

                $query = Auctions::join('auction_platform','auction_platform.id','=','auctions.platform_id');

                // if (!empty($search)) {
                //     $query->where(function ($q) use ($search) {
                //         $q->where('auction_platform.name', 'like', "%{$search}%")
                //           ->orWhere('auction_center.name', 'like', "%{$search}%")
                //           ->orWhere('auctions.auction_date', 'like', "%{$search}%");
                //     });
                // }

                if ($request->has('platform_id') && $request->platform_id != '') {
                    $query->where('auctions.platform_id', $request->platform_id);
                }

                if ($request->has('center_id') && $request->center_id != '') {
                    $query->whereExists(function ($sub) use ($request) {
                        $sub->select(DB::raw(1))
                            ->from('vehicles')
                            ->whereColumn('vehicles.auction_id', 'auctions.id')
                            ->where('vehicles.center_id', $request->center_id);
                    });
                }

                // if ($request->has('center_id') && $request->platform_id != '') {
                //     $query->where('auctions.platform_id', $request->platform_id);
                // }

                if ($request->has('date_range') && $request->date_range != '') {
                        
                            $dateRange = $request->input('date_range');
                            $now = \Carbon\Carbon::now();

                            $fromDate = match ($dateRange) {
                                'today' => $now->copy()->startOfDay(),
                                'yesterday' => $now->copy()->subDay()->startOfDay(),
                                'last_week' => $now->copy()->subWeek(),
                                'last_month' => $now->copy()->subMonth(),
                                'past_3_months' => $now->copy()->subMonths(3),
                                default => $now->copy()->subMonths(3),
                            };

                            $toDate = $now->copy()->endOfDay();

                            // $query->whereBetween('auctions.auction_date', [$fromDate->toDateString(),$toDate->toDateString()]);
                            $query = $query->whereBetween('auctions.auction_date', [$fromDate, $toDate]);

                }
            
                $totalData = clone $query;

                $data = $query ->select(
                        'auctions.id',
                        'auction_platform.name as platform_name',
                        // 'auction_center.name as center_name',
                        // 'auctions.total_vehicles', 
                        'auctions.auction_date',
                        'auctions.status',
                        DB::raw('(SELECT COUNT(*) FROM vehicles WHERE vehicles.auction_id = auctions.id) as car_count'),
                        DB::raw('(
                            SELECT GROUP_CONCAT(DISTINCT auction_center.name)
                            FROM vehicles
                            JOIN auction_center ON auction_center.id = vehicles.center_id
                            WHERE vehicles.auction_id = auctions.id
                        ) as center_names')
                    )
                    
                    ->offset($start)
                    ->limit($length)
                    ->get()
                    ->map(function ($auction) {
                        $view = URL::to('/auctionfinder');

                        // ✅ Add status badge with color
                        $statusColor = match (strtolower($auction->status)) {
                            'planned'   => 'danger-red',
                            'in progress' => 'warning',
                            'update' => 'success',
                            'cancel'    => 'primary',
                            default     => 'secondary',
                        };

                        $statusBadge = '<span class="badge bg-' . $statusColor . '">' . ucfirst($auction->status ?? '-') . '</span>';

                        $centers = "<div class='centers' >";
                        foreach (explode(',',$auction->center_names) as $key => $value) {
                          $centers .="<span>".$value."</span>";
                        }

                        $centers .="</div>";


                        return [
                            "<span class='text-primary' >".$auction->platform_name ?? 'N/A'."</span>",
                            $centers,
                            $auction->car_count,
                            "<span>".date('d-m-Y',strtotime($auction->auction_date))."</span > <br> <span  style='font-size: var(--font-p2) !important;'>".date('h:s A',strtotime($auction->auction_date))."</span>",
                            $statusBadge ?? '-',
                            '<a href="'.$view.'" class="btn btn-sm btn-primary"  style="  font-size: var(--font-p2) !important;">View</a> 
                            '
                        ];
                    });
            

                return [
                    "draw" => intval($request->input('draw')),
                    "recordsTotal" => $totalData->count(),
                    "recordsFiltered" => $totalData->count(),
                    "data" => $data
                ];
            }


          return view('user.auctionscheduler.index');
    }


}
