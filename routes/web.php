<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ProfileSettingController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminNewscrudController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AlertController;
use App\Http\Controllers\admin\PlanController;
use App\Http\Controllers\admin\MembershipController;
use App\Http\Controllers\admin\TicketsController;
use App\Http\Controllers\admin\EmailTemplateController;
use App\Http\Controllers\admin\AuctionController;
use App\Http\Controllers\Admin\AVehicleController;
use App\Http\Controllers\admin\BodyTypeController;
use App\Http\Controllers\admin\CenterController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\MakeController;
use App\Http\Controllers\admin\ModelController;
use App\Http\Controllers\admin\PlatformController;
use App\Http\Controllers\admin\VariantController;
use App\Http\Controllers\admin\VehichleTypeController;
use App\Http\Controllers\admin\VehicleTypeController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\PaymentController; // Import the controller
use App\Http\Controllers\TestPaymentController;
use App\Http\Controllers\UiSettingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\AuctionFinderController;
use App\Http\Controllers\ReauctionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\WebController;
use App\Http\Middleware\CheckUserStatus;
use App\Http\Middleware\IsAdmin;
use App\Models\BodyType;
use App\Models\Color;
use App\Models\Make;
use App\Models\Membership;
use App\Models\ModelVariant;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use Carbon\Carbon;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes


Route::get('/', [WebController::class,'index']);
Route::get('/features', [WebController::class,'features']);

Route::get('/pricing', [WebController::class,'pricing']);

Route::get('/autionshadule', [WebController::class, 'AutionShadule']);

Route::get('/exploreevery', [WebController::class, 'ExploreEvery']);
Route::get('/compair', [WebController::class, 'compairaution']);

Route::get('/login',  [AuthController::class, 'login'])->name('login');
Route::post('/login_submit', [AuthController::class, 'login_submit']);

Route::get('/register', [AuthController::class, 'register']);

Route::post('/register_submit', [AuthController::class, 'register_submit']);





Route::get('/uploading1', function (Request $request) {

        Vehicle::query()->delete();
        BodyType::query()->delete();
        VehicleType::query()->delete();
        Color::query()->delete();
        ModelVariant::query()->delete();
        VehicleModel::query()->delete();
        Make::query()->delete();


        $path = public_path('color.csv');
        $csv = file($path);
        $rows = array_map('str_getcsv', $csv);
        foreach ($rows as $value) {
            if($value[1]){
                Color::create([
                    'id' => $value[0],
                    'name' => $value[1],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        $path = public_path('body.csv');
        $csv = file($path);
        $rows = array_map('str_getcsv', $csv);
        foreach ($rows as $value) {
            if($value[1]){
                BodyType::create([
                    'id' => $value[0],
                    'name' => $value[1],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }


        $path = public_path('vehicle.csv');
        $csv = file($path);
        $rows = array_map('str_getcsv', $csv);
        foreach ($rows as $value) {
            if($value[1]){
                 VehicleType::create([
                    'id' => $value[0],
                    'name' => $value[1],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
        

        //Path
        $path = public_path('make.csv');
        $csv = file($path);
        $rows = array_map('str_getcsv', $csv);
        foreach ($rows as $value) {
            if($value[1]){
                Make::create([
                'id' => $value[0],
                'name' => $value[1],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
            }
        }


        //Path
        $path = public_path('model.csv');
        $csv = file($path);
        $rows = array_map('str_getcsv', $csv);
        foreach ($rows as $value) {
            if($value[1]){
                VehicleModel::create([
                'id' => $value[0],
                'name' => $value[1],
                'make_id' => $value[2],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
            }
        }
     
});



Route::get('/uploading2', function (Request $request) {


        $path = public_path('variant.csv');
        $csv = file($path);
        $rows = array_map('str_getcsv', $csv);
        foreach ($rows as $value) {
            if($value[1]){
                ModelVariant::create([
                'id' => $value[0],
                'name' => $value[1],
                'model_id' => $value[2],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
            }
        }

});













Route::get('/packages', [FrontendController::class, 'pricing'])->name('packages');

Route::view('/registration', 'front.register')->name('registration');


// Logout (shared)
Route::post('/logout', fn () => Auth::logout() ?: redirect('/login'))->name('logout');

Route::middleware(['auth'])->prefix('user/settings')->group(function () {
    Route::get('/ui', [UiSettingController::class, 'edit'])->name('user.settings.ui');
    Route::post('/ui', [UiSettingController::class, 'update'])->name('user.settings.ui.update');
});




// Dashboard data (AJAX)
Route::get('dashboard/data', [VehicleController::class, 'getVehicles']);
Route::get('/dashboard/filters', [VehicleController::class, 'getFilterOptions']);

Route::get('/test-payment', [TestPaymentController::class, 'showPaymentForm'])->name('test.payment.form');
Route::post('/processpayment', [TestPaymentController::class, 'processPayment'])->name('payment.process');
Route::get('/payment/success', [TestPaymentController::class, 'paymentSuccess'])->name('payment.successs');
Route::get('/payment/cancel', [TestPaymentController::class, 'paymentCancel'])->name('payment.cancels');
Route::get('/payment/successful', [TestPaymentController::class, 'paymentSuccessful'])->name('payment.successful');
Route::get('/payment/failed', [TestPaymentController::class, 'paymentFailed'])->name('payment.failed');


Route::get('/pay-12-pounds', [PaymentController::class, 'showPaymentForm'])->name('pay.twelve');
Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process.payment');
Route::get('/payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment-cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');


Route::post('/stripe/create-checkout-session', [PaymentController::class, 'createStripeCheckoutSession'])->name('stripe.checkout');
Route::get('/stripe/success', [PaymentController::class, 'stripeSuccess'])->name('stripe.success');
Route::get('/stripe/cancel', [PaymentController::class, 'stripeCancel'])->name('stripe.cancel');
Route::post('/stripe/webhook', [WebhookController::class, 'handleStripeWebhook']); // Add this route for webhooks



// User Authenticated Routes
Route::middleware(['auth'])->group(function () {

    // account-setting
    Route::match(['get', 'post'],'/checkout', [AuthController::class,'checkout']);
    Route::match(['get','post'],'/account-setting/profile', [ProfileSettingController::class,'profile']);
    Route::match(['get','post'],'/account-setting/changePassword', [ProfileSettingController::class, 'changePassword']);
    Route::match(['get','post'],'/account-setting/billing', [ProfileSettingController::class, 'billing']);
    Route::get('/userprofile', [ProfileSettingController::class, 'userprofile']);
    
    // News (public)
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::post('/news/{id}/toggle-pin', [NewsController::class, 'togglePin'])->name('news.togglePin');

});



//Membership Routes
Route::middleware(['auth',CheckUserStatus::class])->group(function () {
    
            Route::resource('associate-users', \App\Http\Controllers\AssociateUserController::class);
           
            // User Dashboard & Pages
            Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dasahbord');
            Route::get('/dashboard/online', [DashboardController::class, 'onlineAuctions']);
            Route::get('/dashboard/time', [DashboardController::class, 'timeAuctions']);
            Route::get('/dashboard/favourite', [DashboardController::class, 'favouriteAuctions']);
            Route::get('/dashboard/stats', [DashboardController::class, 'statsAuctions']);

            Route::get('/dashboard/getTotalAuctions', [DashboardController::class, 'getTotalAuctions']);
            Route::get('/dashboard/getOnlineAuctions', [DashboardController::class, 'getOnlineAuctions']);
            Route::get('/dashboard/getTimeAuctions', [DashboardController::class, 'getTimeAuctions']);
            Route::get('/dashboard/vehicleStates', [DashboardController::class, 'vehicleStates']);

            Route::get('/dashboard/bestAuctions', [DashboardController::class, 'bestAuctions']);
            Route::get('/dashboard/previousLots', [DashboardController::class, 'previousLots']);
            Route::get('/dashboard/lookbestauction', [DashboardController::class, 'lookbestauction']);

            Route::get('/dashboard/upComingVehicles', [DashboardController::class, 'upComingVehicles']);
            Route::get('/dashboard/getValuation', [DashboardController::class, 'getValuation']);


            Route::get('/auction-finder/getPlatformVehicle',[AuctionFinderController::class,'getPlatformVehicle']);
            Route::get('/auction-finder/getRelatedVehicle/{id}',[AuctionFinderController::class,'getRelatedVehicle']);
            Route::get('/auction-finder/{id}', [AuctionFinderController::class, 'vehicle']);
            
            
            Route::get('/auctionfinder',[AuctionFinderController::class,'index'])->name('auctionfinder');
            

            Route::get('/auctionfinder/data', [AuctionFinderController::class,'data'])->name('auctionfinder.data');
            Route::get('/auction-finder/filter', [AuctionFinderController::class,'filter'])->name('auction.filter');
            Route::get('/auctionscheduler', [AuctionFinderController::class,'auctionScheduler']);
            
        
            Route::view('/upcoming', 'user/upcoming')->name('upcoming');
            
            Route::view('/auctioncalender', 'user/auctioncalender')->name('auctioncalender');
            
            Route::view('/auctiondetail', 'user/auctiondetail')->name('auctiondetail');
            Route::view('/futureauction', 'user/futureauction')->name('futureauction');
            Route::view('/timeauction', 'user/timeauction')->name('timeauction');
            
            // Reauction
            Route::get('/reauction', [ReauctionController::class,'index'])->name('reauction');
            Route::get('/reauction/interest', [ReauctionController::class,'interest'])->name('reauction-interest');
            Route::post('/reauction/info', [ReauctionController::class,'information'])->name('reauctioninfo');
 


            Route::view('/vinsearch', 'user/vinsearch')->name('vinsearch');
            // Route::view('/interest', 'user/interest')->name('interest');

            Route::get('/interest/myintrest', [InterestController::class,'myintrest']);
            Route::get('/interest/setintrest/{id}', [InterestController::class,'setintrest']);
            Route::resource('/interest',InterestController::class);

            Route::view('/gellery', 'user/gellery')->name('gellery');
            Route::view('/comparevehicles', 'user/comparevehicles')->name('comparevehicles');
            Route::view('/reauctiontracker', 'user/reauctiontracker')->name('reauctiontracker');
            // Route::view('/pricing', 'user/pricing')->name('pricing');
            Route::view('/platformwise', 'user/platformwise')->name('platformwise');
            Route::view('/search', 'user/search')->name('search');

            // Ticket Management
            Route::get('/createticket', [TicketController::class, 'create'])->name('ticket.create');
            Route::post('/ticket/store', [TicketController::class, 'store'])->name('ticket.store');
            Route::get('/tickethistory', [TicketController::class, 'history'])->name('ticket.history');
            Route::get('/ticket/{id}', [TicketController::class, 'view'])->name('ticket.view');
            Route::post('/ticket/{id}/reply', [TicketController::class, 'reply'])->name('ticket.reply');
            Route::get('/ticket-history/data', [TicketController::class, 'historyData'])->name('ticket.history.data');
            Route::post('/ticket/{id}/feedback', [TicketController::class, 'submitFeedback'])->name('ticket.feedback');

  

    });




   // Admin Routes
   require __DIR__.'/admin.php';

   

