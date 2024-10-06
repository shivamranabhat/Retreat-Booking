<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OpenGraphController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MtbFaqController;
use App\Http\Controllers\ActivityFaqController;
use App\Http\Controllers\TrekFaqController;
use App\Http\Controllers\BikeTourFaqController;
use App\Http\Controllers\TwitterCardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TrekBookingController;
use App\Http\Controllers\ActivityBookingController;
use App\Http\Controllers\MtbTourBookingController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BodyContentController;
use App\Http\Controllers\FooterContentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CollaborationRequestController;
use App\Http\Controllers\ScriptController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MtbCycleController;
use App\Http\Controllers\CyclingDestinationCategoryController;
use App\Http\Controllers\CyclingDestinationController;
use App\Http\Controllers\BikeTourCategoryController;
use App\Http\Controllers\BikeTourController;
use App\Http\Controllers\BikeTourBookingController;
use App\Http\Controllers\RouteTypeController;
use App\Http\Controllers\BikeTourRouteController;
use App\Http\Controllers\BikeTourFeatureController;
use App\Http\Controllers\TrekkingController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityTypeController;
use App\Http\Controllers\ActivityCategoryController;
use App\Http\Controllers\TrekCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\TrendingBikeController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\RepairRequestController;
use App\Http\Controllers\AboutDetailController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VoiceController;
use App\Http\Controllers\Auth\VerifyController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AdminPasswordResetController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\RepairContentController;
use App\Http\Controllers\B2bContentController;
use App\Http\Controllers\ExtrapageController;
use App\Http\Controllers\ActivityFeatureController;
use App\Http\Controllers\ActivityDepartureController;
use App\Http\Controllers\MtbDepartureController;
use App\Http\Controllers\TrekDepartureController;
use App\Http\Controllers\BikeTourDepartureController;
use App\Http\Controllers\MtbFeatureController;
use App\Http\Controllers\TrekFeatureController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\YoutubeLinkController;
use App\Http\Controllers\YoutubeLinkCategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\AdminAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::fallback(function () {
    abort(404);
});
Route::prefix('/dashboard')->controller(AdminAuthController::class)->group(function(){
    Route::get('/login','login')->name('admin.login');
    Route::post('/auth','authenticate')->name('admin.authenticate');
    Route::post('/logout','logout')->name('admin.logout');
});

Route::prefix('/dashboard')->controller(AdminPasswordResetController::class)->group(function(){
    Route::get('/forgot-password','index')->name('admin.forgot.password');
    Route::get('/send-reset-otp/email={email}','getResetOtp')->name('admin.get.verifyOtp');
    Route::post('/send-reset-otp','sendResetOtp')->name('admin.send.verifyOtp');
    Route::post('/verify-reset-otp/{email}','verifyToken')->name('admin.forgot.verifyOtp');
    Route::get('/reset-password/email={email}&otp={otp}', 'resetPassword')->name('admin.reset.password');
    Route::post('/update-password/{email}','updatePassword')->name('admin.password.update');
});

Route::prefix('/dashboard')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::prefix('/dashboard')->controller(AdminAuthController::class)->group(function(){
        Route::get('/profile','edit')->name('admin.profile');
        Route::put('/update-profile','update')->name('adminProfile.update');
    });
    
    //Routes for account
    Route::prefix('/account')->controller(UserController::class)->group(function(){
        Route::get('/','index')->name('accounts');
        Route::get('/create','create')->name('account.create');
        Route::post('/store','store')->name('account.store');
        Route::get('/{id}','edit')->name('account.edit');
        Route::put('/update/{id}','update')->name('account.update');
        Route::delete('/delete/{id}','destroy')->name('account.destroy');
    });
   
 
    //Routes for locations
     Route::prefix('/location')->controller(LocationController::class)->group(function(){
        Route::get('/','index')->name('locations');
        Route::get('/create','create')->name('location.create');
        Route::post('/store','store')->name('location.store');
        Route::get('/{slug}','edit')->name('location.edit');
        Route::put('/update/{slug}','update')->name('location.update');
        Route::delete('/delete/{slug}','destroy')->name('location.destroy');
    });
    //Routes for extra pages
     Route::prefix('/page')->controller(ExtrapageController::class)->group(function(){
        Route::get('/','index')->name('pages');
        Route::get('/create','create')->name('page.create');
        Route::post('/upload-description','uploadDescription')->name('pageDescription.upload');
        Route::post('/store','store')->name('page.store');
        Route::get('/{slug}','edit')->name('page.edit');
        Route::put('/update/{slug}','update')->name('page.update');
        Route::delete('/delete/{slug}','destroy')->name('page.destroy');
    });
  
  
    //Routes for blog
     Route::prefix('/blogs')->controller(BlogController::class)->group(function(){
        Route::get('/','index')->name('blogs');
        Route::get('/create','create')->name('blog.create');
        Route::post('/upload-blog-img','uploadCkImage')->name('ckeditor.upload');
        Route::post('/store','store')->name('blog.store');
        Route::get('/{slug}','edit')->name('blog.edit');
        Route::put('/update/{slug}','update')->name('blog.update');
        Route::delete('/delete/{slug}','destroy')->name('blog.destroy');
    });
    Route::prefix('/seo')->group(function(){
        //Routes for tags
        Route::prefix('/tags')->controller(TagController::class)->group(function(){
            Route::get('/','index')->name('tags');
            Route::get('/create','create')->name('tag.create');
            Route::post('/store','store')->name('tag.store');
            Route::get('/{slug}','edit')->name('tag.edit');
            Route::put('/update/{slug}','update')->name('tag.update');
            Route::delete('/delete/{slug}','destroy')->name('tag.destroy');
        });
        
         //Routes for open graphs
        Route::prefix('/open-graph')->controller(OpenGraphController::class)->group(function(){
            Route::get('/','index')->name('graphs');
            Route::get('/create','create')->name('graph.create');
            Route::post('/store','store')->name('graph.store');
            Route::get('/{slug}','edit')->name('graph.edit');
            Route::put('/update/{slug}','update')->name('graph.update');
            Route::delete('/delete/{slug}','destroy')->name('graph.destroy');
        });
        //Routes for twitter cards
        Route::prefix('/twitter-card')->controller(TwitterCardController::class)->group(function(){
            Route::get('/','index')->name('cards');
            Route::get('/create','create')->name('card.create');
            Route::post('/store','store')->name('card.store');
            Route::get('/{slug}','edit')->name('card.edit');
            Route::put('/update/{slug}','update')->name('card.update');
            Route::delete('/delete/{slug}','destroy')->name('card.destroy');
        });
        //Routes for script
        Route::prefix('/scripts')->controller(ScriptController::class)->group(function(){
            Route::get('/','index')->name('scripts');
            Route::get('/create','create')->name('script.create');
            Route::post('/store','store')->name('script.store');
            Route::get('/{slug}','edit')->name('script.edit');
            Route::put('/update/{slug}','update')->name('script.update');
            Route::delete('/delete/{slug}','destroy')->name('script.destroy');
        });
    });

    //Route for message sent by user
    Route::prefix('/messages')->controller(MessageController::class)->group(function(){
        Route::get('/','index')->name('messages');
        Route::get('/{slug}','show')->name('message.show');
        Route::delete('/delete/{slug}','destroy')->name('message.destroy');
    });
 
      //Routes for faqs
      Route::prefix('/faqs')->controller(FaqController::class)->group(function(){
        Route::get('/','index')->name('faqs');
        Route::get('/create','create')->name('faq.create');
        Route::post('/store','store')->name('faq.store');
        Route::get('/{slug}','edit')->name('faq.edit');
        Route::put('/update/{slug}','update')->name('faq.update');
        Route::delete('/destroy/{slug}','destroy')->name('faq.destroy');
    });
    //Route for subscribers
    Route::prefix('/subscribers')->controller(SubscriberController::class)->group(function(){
        Route::get('/','index')->name('subscribers');
        Route::delete('/delete/{slug}','destroy')->name('subscriber.destroy');
    });
   
     //Route for currency
     Route::prefix('/currency')->controller(CurrencyController::class)->group(function(){
        Route::get('/','index')->name('currencies');
        Route::get('/create','create')->name('currency.create');
        Route::post('/store','store')->name('currency.store');
        Route::get('/{slug}','edit')->name('currency.edit');
        Route::put('/update/{slug}','update')->name('currency.update');
        Route::delete('/delete/{slug}','destroy')->name('currency.destroy');
    });
});


