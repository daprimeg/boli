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
use App\Http\Controllers\WebController;
use App\Models\BodyType;
use App\Models\Color;
use App\Models\Make;
use App\Models\ModelVariant;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes


Route::get('/', [WebController::class,'index']);
Route::get('/feautres', [WebController::class,'feautres']);




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







Route::get('/register', function (Request $request) {
    $planId = $request->query('plan');
    return view('auth.register', compact('planId'));
})->name('register.form');

Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::get('/login',  [AuthController::class, 'loginform'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/packages', [FrontendController::class, 'pricing'])->name('packages');

Route::view('/registration', 'front.register')->name('registration');


// Logout (shared)
Route::post('/logout', fn () => Auth::logout() ?: redirect('/login'))->name('logout');

Route::middleware(['auth'])->prefix('user/settings')->group(function () {
    Route::get('/ui', [UiSettingController::class, 'edit'])->name('user.settings.ui');
    Route::post('/ui', [UiSettingController::class, 'update'])->name('user.settings.ui.update');
});


// News (public)
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::post('/news/{id}/toggle-pin', [NewsController::class, 'togglePin'])->name('news.togglePin');

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
Route::middleware('auth')->group(function () {

    Route::resource('associate-users', \App\Http\Controllers\AssociateUserController::class);

    // User Dashboard & Pages
    Route::view('/dashboard', 'user/dashboard')->name('dashboard');


    Route::get('/auctionfinder', [AuctionFinderController::class,'index'])->name('auctionfinder');
    Route::get('/auctionfinder/data', [AuctionFinderController::class,'data'])->name('auctionfinder.data');

    

    Route::get('/auction-finder/filter', [AuctionFinderController::class,'filter'])->name('auction.filter');
   

    


    
    Route::view('/upcoming', 'user/upcoming')->name('upcoming');

    Route::view('/auctioncalender', 'user/auctioncalender')->name('auctioncalender');

    Route::view('/auctiondetail', 'user/auctiondetail')->name('auctiondetail');
    Route::view('/futureauction', 'user/futureauction')->name('futureauction');
    Route::view('/timeauction', 'user/timeauction')->name('timeauction');




    Route::view('/vinsearch', 'user/vinsearch')->name('vinsearch');
    // Route::view('/interest', 'user/interest')->name('interest');

    Route::resource('/interest',InterestController::class);

    // Route::get('interests', [InterestController::class, 'index'])->name('interests.index');        // List all interests
    // Route::get('interests/create', [InterestController::class, 'create'])->name('interests.create'); // Show form to create
    // Route::post('interests/store', [InterestController::class, 'store'])->name('interests.store');   // Handle storing
    // Route::get('interests/{interest}/edit', [InterestController::class, 'edit'])->name('interests.edit');  // Show form to edit
    // Route::post('interests/{interest}/update', [InterestController::class, 'update'])->name('interests.update'); // Handle updating
    // Route::delete('interests/{interest}/delete', [InterestController::class, 'destroy'])->name('interests.destroy'); // Handle delete
    // Route::get('/get-models-by-make', [InterestController::class, 'getModelsByMake'])->name('get.models.by.make');
    // Route::get('/get-variants-by-model', [InterestController::class, 'getVariantsByModel'])->name('get.variants.by.model');



    Route::view('/gellery', 'user/gellery')->name('gellery');
    Route::view('/comparevehicles', 'user/comparevehicles')->name('comparevehicles');
    Route::view('/reauctiontracker', 'user/reauctiontracker')->name('reauctiontracker');
    Route::view('/pricing', 'user/pricing')->name('pricing');
    Route::view('/platformwise', 'user/platformwise')->name('platformwise');
    Route::view('/search', 'user/search')->name('search');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('user.checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('user.checkout.store');

    // Route::get('/checkout/{id?}', [CheckoutController::class, 'index'])->name('checkout.index');
    // Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');




    // Profile Settings
    Route::get('/profilesetting', [ProfileSettingController::class, 'edit'])->name('profile.edit');
    Route::post('/profilesetting/update', [ProfileSettingController::class, 'update'])->name('profile.update');
    Route::post('/changepassword', [ProfileSettingController::class, 'changePassword'])->name('profile.changePassword');
    Route::get('/changepassword', [ProfileSettingController::class, 'editSecuritySettings'])->name('profile.editSecuritySettings');

    Route::view('/billingplan', 'user.profile.billingplans')->name('profile.billingplans');
    Route::get('/userprofile', [AlertController::class, 'userAlerts'])->name('profile.userprofile');

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
Route::prefix('admin')->group(function () {

    //Profile
    Route::view('/importcsv', 'admin/datamanagement/importcsv');
    Route::view('/scrappinglogs', 'admin/datamanagement/scrappinglogs');
    Route::view('/datascrapereview', 'admin/datamanagement/datascrapereview');
    Route::view('/rolepermission', 'admin/securitysetting/rolepermission');
    Route::view('/backuprestore', 'admin/securitysetting/backuprestore');
    Route::view('/activitylog', 'admin/securitysetting/activitylog');
    Route::view('/mostsearch', 'admin/reportsanalytics/mostsearch');
    Route::view('/auctionperformancereport', 'admin/reportsanalytics/auctionperformancereport');
    Route::view('/realtimeuseractivity', 'admin/reportsanalytics/realtimeuseractivity');
    Route::view('/customemailtemplate', 'admin/alerts/customemailtemplate');


    //Masters
    Route::get('/masters/platforms/getPlatforms', [PlatformController::class,'getPlatforms']);
    Route::resource('masters/platforms',PlatformController::class);

    Route::get('/masters/centers/getCenters', [CenterController::class,'getCenters']);
    Route::resource('masters/centers',CenterController::class);

    Route::get('/masters/colours/getColours', [ColorController::class,'getColours']);
    Route::resource('masters/colours',ColorController::class);

    Route::get('/masters/bodytypes/getBodyTypes', [BodyTypeController::class,'getBodyTypes']);
    Route::resource('masters/bodytypes',BodyTypeController::class);

    Route::get('/masters/vehicletypes/getVehicleTypes', [VehicleTypeController::class, 'getVehicleTypes']);
    Route::resource('masters/vehicletypes',VehicleTypeController::class);
    
    Route::get('/masters/makes/getMakes', [MakeController::class, 'getMakes']);
    Route::resource('masters/makes',MakeController::class);

    Route::get('/masters/models/getModels', [ModelController::class, 'getModels']);
    Route::resource('/masters/models',ModelController::class);

    Route::get('/masters/variants/getVariants', [VariantController::class, 'getVariants']);
    Route::resource('/masters/variants',VariantController::class);

    
    //Auctions
    Route::prefix('auctions')->group(function () {

        Route::get('/getAuction', [AuctionController::class, 'getAuctions']);
        Route::get('/', [AuctionController::class, 'index']);
        Route::get('/viewCsv/{id}', [AuctionController::class,'viewCsv']);
        Route::get('/create', [AuctionController::class, 'create']);
    
        Route::post('/', [AuctionController::class, 'store']);
        Route::get('/{auction}/edit', [AuctionController::class, 'edit']);
        Route::put('/{auction}', [AuctionController::class, 'update']);
        Route::delete('/{auction}', [AuctionController::class, 'destroy']);
    
        Route::get('/ajax/get', [AuctionController::class, 'getAjaxData']);
        Route::get('/ajax/platform/{id}/centers', [AuctionController::class,'getCentersByPlatform']);
    });


    //Plans
    Route::prefix('plans')->group(function () {
        Route::get('/', [PlanController::class, 'index']);
        Route::get('/create', [PlanController::class, 'create']);
        Route::post('/store', [PlanController::class, 'store']);
        Route::put('/update/{plan}', [PlanController::class, 'update']);

        Route::get('/{plan}/edit', [PlanController::class, 'edit']);
       
        Route::delete('/{plan}', [PlanController::class, 'destroy']);
        Route::get('/ajax/get', [PlanController::class, 'getAjaxData']);
    });


    //Tickets
    Route::prefix('tickets')->group(function () {
        Route::get('/', [TicketsController::class, 'index']);
        Route::get('/{id}', [TicketsController::class, 'show']);
        Route::post('/{id}/reply', [TicketsController::class, 'reply']);
        Route::post('/{id}/update', [TicketsController::class, 'updateStatus']);
    });


    //Membership
    Route::prefix('memberships')->group(function () {
        Route::get('/', [MembershipController::class, 'index']);
        Route::get('/create', [MembershipController::class, 'create']);
        Route::post('/store', [MembershipController::class, 'store']);
        Route::post('/fetch-user', [MembershipController::class, 'fetchUser']);
        Route::get('/{id}/edit', [MembershipController::class, 'edit']);
        Route::post('/{id}/update', [MembershipController::class, 'update']);
        Route::post('/{id}/destroy', [MembershipController::class, 'destroy']);
    });


    // Blog Categories (CRUD)
    Route::prefix('blogcategories')->group(function () {
        Route::get('/', [BlogCategoryController::class, 'index']);
        Route::get('/create', [BlogCategoryController::class, 'create']);
        Route::post('/', [BlogCategoryController::class, 'store']);
        Route::get('/{blogcategory}/edit', [BlogCategoryController::class, 'edit']);
        Route::put('/{blogcategory}', [BlogCategoryController::class, 'update']);
        Route::delete('/{blogcategory}', [BlogCategoryController::class, 'destroy']);
    });


    // Blogs (CRUD with AJAX)
    Route::middleware('auth')->prefix('blogs')->name('blogs.')->group(function () {
        Route::get('/', [AdminBlogController::class, 'index']);
        Route::get('/create', [AdminBlogController::class, 'create']);
        Route::post('/store', [AdminBlogController::class, 'store']);
        Route::get('/{slug}', [AdminBlogController::class, 'show']);
        Route::get('/{blog}/edit', [AdminBlogController::class, 'edit']);
        Route::put('/{blog}', [AdminBlogController::class, 'update']);
        Route::delete('/{blog}', [AdminBlogController::class, 'destroy']);
        Route::post('/upload-image', [AdminBlogController::class, 'uploadImage']);
    });


    //Vehicles
    Route::get('/vehicles', [AVehicleController::class,'index']);
    Route::get('/vehicles/create', [AVehicleController::class,'create']);
    Route::post('/vehicles/store', [AVehicleController::class, 'store']);
    Route::get('/vehicles/edit/{id}', [AVehicleController::class,'edit']);
    Route::put('/vehicles/update/{id}', [AVehicleController::class,'update']);
    Route::delete('/vehicles/destroy/{id}', [AVehicleController::class,'destroy']);
    Route::get('/vehicles/show/{id}', [AVehicleController::class, 'show']);
    

    //News
    Route::prefix('news')->name('admin.news.')->group(function () {
        Route::get('/', [AdminNewscrudController::class, 'index']);
        Route::post('/', [AdminNewscrudController::class, 'store']);
        Route::get('/create', [AdminNewscrudController::class, 'create']);
        
        Route::get('/{news}/edit', [AdminNewscrudController::class, 'edit']);
        Route::put('/{news}', [AdminNewscrudController::class, 'update']);
        Route::delete('/{news}', [AdminNewscrudController::class, 'destroy']);
    });


    //Alerts
    Route::prefix('alerts')->middleware('auth')->name('alerts.')->group(function () {
        Route::get('/', [AlertController::class, 'index'])->name('index');
        Route::get('/create', [AlertController::class, 'create'])->name('create');
        Route::post('/store', [AlertController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AlertController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AlertController::class, 'update'])->name('update');
        Route::delete('/{id}', [AlertController::class, 'destroy'])->name('destroy');
        Route::get('/ajax/data', [AlertController::class, 'ajaxData'])->name('ajax');
    });


    //Users
    Route::get('users', [UserController::class, 'index']);
    Route::get('users-data', [UserController::class, 'getData']);
    Route::get('users/create', [UserController::class, 'create']);
    Route::post('users/store', [UserController::class, 'store']);
    Route::get('users/{id}/edit', [UserController::class, 'edit']);
    Route::post('users/{id}/update', [UserController::class, 'update']);
    Route::get('users/{id}/delete', [UserController::class, 'destroy']);
    Route::get('users/{id}/status/{status}', [UserController::class, 'updateStatus']);

    // Admin Authentication
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard']);
    Route::get('/profile', [AdminAuthController::class, 'profile']);

    Route::get('/', [AdminAuthController::class, 'showLoginForm']);
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout']);

});

