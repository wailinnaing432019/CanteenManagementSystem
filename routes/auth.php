<?php

use App\Models\Menu;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\DetailController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\SlideSettingController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Customer\MenuController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\LikeCommentController;
use App\Http\Controllers\Admin\CustomerOrderController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\RestaurantTableController;
use App\Http\Controllers\Message\TwilioMessageController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Purchaser\PurchaseOrderController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\AuthenticatedSessionController as StaffAuth;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
    // google login
    Route::controller(GoogleController::class)->group(function(){
        Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
        Route::get('auth/google/callback', 'handleGoogleCallback');
    });
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

});

    // customer routes
    Route::controller(\App\Http\Controllers\Customer\DashboardController::class)->group(function (){
        Route::get('/','index');
        Route::get('/cart','cartShow');

    });
    Route::controller(MenuController::class)->group(function(){
        Route::get('/menus','index');
        Route::get('/menus/{id}','view');
    });

    // Route::get('/index',function(){
    //     return view('layout.customerhome');
    // });
// admin Routes
// login
Route::get('staff/login', [StaffAuth::class, 'create'])
    ->name('staff.login')->middleware('guest:staff');
Route::post('staff/login', [StaffAuth::class, 'store'])->middleware('guest:staff');


// Route::middleware('staff')->group(function (){
    Route::post('staff/logout',[StaffAuth::class,'destroy'])->name('staff.logout');

    Route::prefix('/admin')->middleware(['auth:staff', 'role:admin'])->group(function(){

        Route::controller(\App\Http\Controllers\Admin\DashboardController::class)->group(function (){
            Route::get('/dashboard','index');
        });
        // tables route

        Route::get('/tables',\App\Http\Livewire\Admin\TableView::class);
        Route::get('/tables/create',\App\Http\Livewire\Admin\TableCreate::class);
        Route::get('/tables/edit/{id}',\App\Http\Livewire\Admin\TableEdit::class);

        // employee  create
        Route::prefix('/employees')->group(function (){
            Route::get('/',\App\Http\Livewire\Admin\EmployeeView::class);
            Route::get('/create',\App\Http\Livewire\Admin\EmployeeCreate::class);
            Route::get('/edit/{id}',\App\Http\Livewire\Admin\EmployeeEdit::class);

        });

        Route::get('/setting',\App\Http\Livewire\Admin\SettingView::class);

        Route::controller(SlideSettingController::class)->group(function (){
            Route::get('/slide','list');
            Route::get('/slide/create','create');
            Route::post('/slide/store','store');
            Route::get('/slide/edit/{id}','edit')->name("slide#edit");
            Route::post('/slide/update/{id}','update')->name("slide#update");
            Route::get('/slide/delete/{id}','delete')->name("slide#delete");
        });
         // menu routes
        Route::prefix('menus')->group(function(){
            Route::get('/',\App\Http\Livewire\Admin\MenuView::class);
            Route::get('/create',\App\Http\Livewire\Admin\MenuCreate::class);
            Route::get('/edit/{id}',\App\Http\Livewire\Admin\MenuEdit::class);
        });

        // category routes
        Route::prefix('categories')->group(function(){
            Route::get('/',\App\Http\Livewire\Admin\CategoryView::class);
        });

        // detail routes
        Route::controller(DetailController::class)->group(function(){
            Route::get('/menudetail/{id}','menudetail');
             Route::get('/employeedetail/{id}','employeedetail');
        });

        // reports routes
        Route::prefix('/reports/')->controller(ReportController::class)->group(function(){
           Route::get('/income','income');
           Route::get('/expense','expense');
        });
         // purchaser routes
        Route::prefix('purchase')->group(function(){
            Route::get('/order',\App\Http\Livewire\Admin\PurchaseOrderView::class);
        });

        // likes and comments
        Route::controller(LikeCommentController::class)->group(function(){
            Route::get('/likes','index');
            Route::get('/comments/menus/{id}','viewComment');
            Route::delete('/comments/delete/{menuId}/{userId}/{commentId}','destoryComment');
        });

        Route::prefix('customers')->controller(CustomerOrderController::class)->group(function(){
            Route::get('/orders','index');
            Route::get('/orders/{id}','show');
            Route::get('/orders/invoice/{id}','previewInvoice');
            Route::get('/orders/{id}/send-mail','sendMailInvoice');
        });
        // Route::prefix('menus')->controller(\App\Http\Controllers\Admin\MenuController::class)->group(function(){
        //     Route::get('/view','index');
        //     Route::get('/create','create');
        //     Route::post('/store','store');
        // });
    });
Route::post('send-email',[MailController::class,'index']);
    # chef Routes

    Route::prefix('/chef')->middleware(['auth:staff', 'role:chef'])->group(function (){
        Route::controller(\App\Http\Controllers\Chef\DashboardController::class)->group(function (){
            Route::get('/dashboard','index');
        });

        Route::get('/menus',\App\Http\Livewire\Chef\MenuView::class);
        Route::get('/categories',\App\Http\Livewire\Chef\CategoryView::class);
        Route::get('/menus/other',\App\Http\Livewire\Chef\OtherMenuView::class);

        Route::get('/purchase-order',\App\Http\Livewire\Chef\PurchaseView::class);
    });

    # Purchaser Routes
    Route::prefix('/purchaser')->middleware(['auth:staff', 'role:purchaser'])->group(function (){
        Route::controller(\App\Http\Controllers\Purchaser\DashboardController::class)->group(function (){
            Route::get('/dashboard','index');
            Route::get('/purchased','purchased');
            Route::post('/purchased','purchasedStore');
            Route::get('/today-order','todayOrder');
            Route::get('/today-order/print','downloadpdf');
        });

        Route::controller(PurchaseOrderController::class)->group(function(){

        });

    });

    Route::get('/send-sms',[TwilioMessageController::class,'index']);
// });




    # admin routes