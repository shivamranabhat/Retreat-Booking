<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutContentController;
use App\Http\Controllers\ContactDetailController;
use App\Http\Controllers\OpenGraphController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TwitterCardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BodyContentController;
use App\Http\Controllers\FooterContentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ScriptController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminPasswordResetController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SubscriberController;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\WhyUsController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FeaturedPackageController;
use App\Http\Controllers\InquiryController;

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
Route::prefix('/dashboard')->controller(AdminAuthController::class)->group(function () {
    Route::get('/login', 'login')->name('admin.login');
    Route::post('/auth', 'authenticate')->name('admin.authenticate');
    Route::post('/logout', 'logout')->name('admin.logout');
});

Route::prefix('/dashboard')->controller(AdminPasswordResetController::class)->group(function () {
    Route::get('/forgot-password', 'index')->name('admin.forgot.password');
    Route::get('/send-reset-otp/email={email}', 'getResetOtp')->name('admin.get.verifyOtp');
    Route::post('/send-reset-otp', 'sendResetOtp')->name('admin.send.verifyOtp');
    Route::post('/verify-reset-otp/{email}', 'verifyToken')->name('admin.forgot.verifyOtp');
    Route::get('/reset-password/email={email}&otp={otp}', 'resetPassword')->name('admin.reset.password');
    Route::post('/update-password/{email}', 'updatePassword')->name('admin.password.update');
});

Route::prefix('/dashboard')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::prefix('/dashboard')->controller(AdminAuthController::class)->group(function () {
        Route::get('/profile', 'edit')->name('admin.profile');
        Route::put('/update-profile', 'update')->name('adminProfile.update');
    });

    //Routes for account
    Route::prefix('/account')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('accounts');
        Route::get('/create', 'create')->name('account.create');
        Route::post('/store', 'store')->name('account.store');
        Route::get('/{id}', 'edit')->name('account.edit');
        Route::put('/update/{id}', 'update')->name('account.update');
        Route::delete('/delete/{id}', 'destroy')->name('account.destroy');
    });


    //Routes for locations
    Route::prefix('/location')->controller(LocationController::class)->group(function () {
        Route::get('/', 'index')->name('locations');
        Route::get('/create', 'create')->name('location.create');
        Route::post('/store', 'store')->name('location.store');
        Route::get('/{slug}', 'edit')->name('location.edit');
        Route::put('/update/{slug}', 'update')->name('location.update');
        Route::delete('/delete/{slug}', 'destroy')->name('location.destroy');
    });
    
    Route::prefix('/content')->group(function(){
        //Routes for footer contents
        Route::prefix('/footer')->controller(FooterContentController::class)->group(function () {
            Route::get('/', 'index')->name('footers');
            Route::get('/create', 'create')->name('footer.create');
            Route::post('/store', 'store')->name('footer.store');
            Route::get('/{slug}', 'edit')->name('footer.edit');
            Route::put('/update/{slug}', 'update')->name('footer.update');
            Route::delete('/delete/{slug}', 'destroy')->name('footer.destroy');
        });
        //Routes for about body contents
        Route::prefix('/about')->controller(AboutContentController::class)->group(function () {
            Route::get('/', 'index')->name('abouts');
            Route::get('/create', 'create')->name('about.create');
            Route::post('/store', 'store')->name('about.store');
            Route::get('/{slug}', 'edit')->name('about.edit');
            Route::put('/update/{slug}', 'update')->name('about.update');
            Route::delete('/delete/{slug}', 'destroy')->name('about.destroy');
        });

        //Routes for main body contents
        Route::prefix('/')->controller(BodyContentController::class)->group(function () {
            Route::get('/', 'index')->name('mains');
            Route::get('/create', 'create')->name('main.create');
            Route::post('/store', 'store')->name('main.store');
            Route::get('/{slug}', 'edit')->name('main.edit');
            Route::put('/update/{slug}', 'update')->name('main.update');
            Route::delete('/delete/{slug}', 'destroy')->name('main.destroy');
        });
    });

    //Routes for blog
    Route::prefix('/blogs')->controller(BlogController::class)->group(function () {
        Route::get('/', 'index')->name('blogs');
        Route::get('/create', 'create')->name('blog.create');
        Route::post('/upload-blog-img', 'uploadCkImage')->name('ckeditor.upload');
        Route::post('/store', 'store')->name('blog.store');
        Route::get('/{slug}', 'edit')->name('blog.edit');
        Route::put('/update/{slug}', 'update')->name('blog.update');
        Route::delete('/delete/{slug}', 'destroy')->name('blog.destroy');
    });
    Route::prefix('/instructors')->controller(InstructorController::class)->group(function () {
        Route::get('/', 'index')->name('instructors');
        Route::get('/create', 'create')->name('instructor.create');
        Route::post('/store', 'store')->name('instructor.store');
        Route::get('/{slug}', 'edit')->name('instructor.edit');
        Route::put('/update/{slug}', 'update')->name('instructor.update');
        Route::delete('/delete/{slug}', 'destroy')->name('instructor.destroy');
    });

    Route::prefix('/accommodations')->controller(AccommodationController::class)->group(function () {
        Route::get('/', 'index')->name('accommodations');
        Route::get('/create', 'create')->name('accommodation.create');
        Route::post('/store', 'store')->name('accommodation.store');
        Route::get('/{slug}', 'edit')->name('accommodation.edit');
        Route::put('/update/{slug}', 'update')->name('accommodation.update');
        Route::delete('/delete/{slug}', 'destroy')->name('accommodation.destroy');
    });
    Route::prefix('/room-types')->controller(RoomTypeController::class)->group(function () {
        Route::get('/', 'index')->name('roomTypes');
        Route::get('/create', 'create')->name('roomType.create');
        Route::post('/store', 'store')->name('roomType.store');
        Route::get('/{slug}', 'edit')->name('roomType.edit');
        Route::put('/update/{slug}', 'update')->name('roomType.update');
        Route::delete('/delete/{slug}', 'destroy')->name('roomType.destroy');
    });
    Route::prefix('/packages')->group(function(){
        Route::prefix('/featured')->controller(FeaturedPackageController::class)->group(function () {
            Route::get('/', 'index')->name('features');
            Route::get('/create', 'create')->name('feature.create');
            Route::post('/store', 'store')->name('feature.store');
            Route::get('/{slug}', 'edit')->name('feature.edit');
            Route::put('/update/{slug}', 'update')->name('feature.update');
            Route::delete('/delete/{slug}', 'destroy')->name('feature.destroy');
        });
        Route::prefix('/')->controller(PackageController::class)->group(function () {
            Route::get('/', 'index')->name('packages');
            Route::get('/create', 'create')->name('package.create');
            Route::post('/store', 'store')->name('package.store');
            Route::get('/{slug}', 'edit')->name('package.edit');
            Route::post('/upload-package-img', 'uploadPackageImage')->name('package.upload');
            Route::put('/update/{slug}', 'update')->name('package.update');
            Route::delete('/delete/{slug}', 'destroy')->name('package.destroy');
            Route::post('{slug}/change/Status/', 'updateStatus')->name('package.updateStatus');
        });
    });

    Route::prefix('/inquiries')->controller(InquiryController::class)->group(function () {
        Route::get('/pending', 'pending')->name('inquiry.pending');
        Route::get('/accepted', 'accepted')->name('inquiry.accepted');
        Route::get('/declined', 'declined')->name('inquiry.declined');
        Route::get('/{slug}', 'show')->name('inquiry.show');
    });
    
    Route::prefix('/categories')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('categories');
        Route::get('/create', 'create')->name('category.create');
        Route::post('/store', 'store')->name('category.store');
        Route::get('/{slug}', 'edit')->name('category.edit');
        Route::put('/update/{slug}', 'update')->name('category.update');
        Route::delete('/delete/{slug}', 'destroy')->name('category.destroy');
    });
    Route::prefix('/testimonials')->controller(TestimonialController::class)->group(function () {
        Route::get('/', 'index')->name('testimonials');
        Route::get('/create', 'create')->name('testimonial.create');
        Route::post('/store', 'store')->name('testimonial.store');
        Route::get('/{slug}', 'edit')->name('testimonial.edit');
        Route::put('/update/{slug}', 'update')->name('testimonial.update');
        Route::delete('/delete/{slug}', 'destroy')->name('testimonial.destroy');
    });
    
    
    Route::prefix('/seo')->group(function () {
        //Routes for tags
        Route::prefix('/tags')->controller(TagController::class)->group(function () {
            Route::get('/', 'index')->name('tags');
            Route::get('/create', 'create')->name('tag.create');
            Route::post('/store', 'store')->name('tag.store');
            Route::get('/{slug}', 'edit')->name('tag.edit');
            Route::put('/update/{slug}', 'update')->name('tag.update');
            Route::delete('/delete/{slug}', 'destroy')->name('tag.destroy');
        });

        //Routes for open graphs
        Route::prefix('/open-graph')->controller(OpenGraphController::class)->group(function () {
            Route::get('/', 'index')->name('graphs');
            Route::get('/create', 'create')->name('graph.create');
            Route::post('/store', 'store')->name('graph.store');
            Route::get('/{slug}', 'edit')->name('graph.edit');
            Route::put('/update/{slug}', 'update')->name('graph.update');
            Route::delete('/delete/{slug}', 'destroy')->name('graph.destroy');
        });
        //Routes for twitter cards
        Route::prefix('/twitter-card')->controller(TwitterCardController::class)->group(function () {
            Route::get('/', 'index')->name('cards');
            Route::get('/create', 'create')->name('card.create');
            Route::post('/store', 'store')->name('card.store');
            Route::get('/{slug}', 'edit')->name('card.edit');
            Route::put('/update/{slug}', 'update')->name('card.update');
            Route::delete('/delete/{slug}', 'destroy')->name('card.destroy');
        });
        //Routes for script
        Route::prefix('/scripts')->controller(ScriptController::class)->group(function () {
            Route::get('/', 'index')->name('scripts');
            Route::get('/create', 'create')->name('script.create');
            Route::post('/store', 'store')->name('script.store');
            Route::get('/{slug}', 'edit')->name('script.edit');
            Route::put('/update/{slug}', 'update')->name('script.update');
            Route::delete('/delete/{slug}', 'destroy')->name('script.destroy');
        });
    });
    //Route for subscribers
    Route::prefix('/subscribers')->controller(SubscriberController::class)->group(function () {
        Route::get('/', 'index')->name('subscribers');
        Route::delete('/delete/{slug}', 'destroy')->name('subscriber.destroy');
    });
    //Route for message sent by user
    Route::prefix('/messages')->controller(MessageController::class)->group(function () {
        Route::get('/', 'index')->name('messages');
        Route::get('/{slug}', 'show')->name('message.show');
        Route::delete('/delete/{slug}', 'destroy')->name('message.destroy');
    });

    //Routes for faqs
    Route::prefix('/faqs')->controller(FaqController::class)->group(function () {
        Route::get('/', 'index')->name('faqs');
        Route::get('/create', 'create')->name('faq.create');
        Route::post('/store', 'store')->name('faq.store');
        Route::get('/{slug}', 'edit')->name('faq.edit');
        Route::put('/update/{slug}', 'update')->name('faq.update');
        Route::delete('/destroy/{slug}', 'destroy')->name('faq.destroy');
    });
    //Routes for contact details
    Route::prefix('/contact-details')->controller(ContactDetailController::class)->group(function () {
        Route::get('/', 'index')->name('contactDetails');
        Route::get('/create', 'create')->name('contactDetail.create');
        Route::post('/store', 'store')->name('contactDetail.store');
        Route::get('/{id}', 'edit')->name('contactDetail.edit');
        Route::put('/update/{id}', 'update')->name('contactDetail.update');
        Route::delete('/delete/{id}', 'destroy')->name('contactDetail.destroy');
    });
    Route::prefix('/about')->group(function () {
        //Routes for team
        Route::prefix('/team')->controller(TeamController::class)->group(function () {
            Route::get('/', 'index')->name('teams');
            Route::get('/create', 'create')->name('team.create');
            Route::post('/team-upload', 'uploadTeam')->name('team.upload');
            Route::post('/store', 'store')->name('team.store');
            Route::get('/{slug}', 'edit')->name('team.edit');
            Route::put('/update/{slug}', 'update')->name('team.update');
            Route::delete('/delete/{slug}', 'destroy')->name('team.destroy');
        });
       
    });
    Route::prefix('/about')->group(function(){
        //Routes for team
         Route::prefix('/team')->controller(TeamController::class)->group(function(){
            Route::get('/','index')->name('teams');
            Route::get('/create','create')->name('team.create');
            Route::post('/team-upload','uploadTeam')->name('team.upload');
            Route::post('/store','store')->name('team.store');
            Route::get('/{slug}','edit')->name('team.edit');
            Route::put('/update/{slug}','update')->name('team.update');
            Route::delete('/delete/{slug}','destroy')->name('team.destroy');
        });
        //Routes for why us
        Route::prefix('/why-us')->controller(WhyUsController::class)->group(function () {
            Route::get('/', 'index')->name('whyUs');
            Route::get('/create', 'create')->name('whyUs.create');
            Route::post('/store', 'store')->name('whyUs.store');
            Route::get('/{slug}', 'edit')->name('whyUs.edit');
            Route::put('/update/{slug}', 'update')->name('whyUs.update');
            Route::delete('/delete/{slug}', 'destroy')->name('whyUs.destroy');
        });
       
    });
     //Routes for banner
     Route::prefix('/banner')->controller(BannerController::class)->group(function () {
        Route::get('/', 'index')->name('banners');
        Route::get('/create', 'create')->name('banner.create');
        Route::post('/store', 'store')->name('banner.store');
        Route::get('/{slug}', 'edit')->name('banner.edit');
        Route::put('/update/{slug}', 'update')->name('banner.update');
        Route::delete('/delete/{slug}', 'destroy')->name('banner.destroy');
    });
});
Route::prefix('/')->controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/faqs', 'faq')->name('home.faqs');
    Route::get('/blogs', 'blogs')->name('home.blogs');
    Route::get('/blog/{slug}', 'blog')->name('blog');
    Route::get('/about-us', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/{retreat}', 'retreat')->name('retreats');
    Route::get('/{slug}/inquiry', 'inquiry')->name('retreat.inquiry');
    Route::get('/{retreat}/{slug}', 'retreatDetails')->name('retreat.details');
});
