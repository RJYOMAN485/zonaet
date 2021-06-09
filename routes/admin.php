<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\AdminController;

//Route::group(['middleware' => 'auth'], function(){








//});

  Route::get('/admin/login',[AdminController::class,'getAdminLoginView'])->name('admin.login');

  Route::post('/admin/login',[AdminController::class,'postAdminLogin'])->name('auth.admin');

  Route::post('/admin/logout', [ AdminController::class, 'adminLogoutAuth' ])->name('adminLogoutAuth');

  Route::get('/admin/register', [AdminController::class, 'getAdminRegisterPage'])->name('admin.register');

  Route::post('/admin/register', [ AdminController::class, 'registeredAdmin' ])->name('admin.create');



  Route::group([ 'middleware' => 'auth:admin'], function () {

    Route::resource('videos',AdminController::class);

    
    $c = AdminController::class;

    Route::get('/profile', [
        $c,
        'getAdminProfile'
    ])->name('admin.profile');

    Route::get('/admin/account',[
        $c,'getAdminAccountPage'
    ])->name('admin.account');

    Route::get('/admin/settings',[
       $c,'getAdminAccountSettingsPage'
    ])->name('admin.account.settings');

    Route::get('/admin/subscriptions',[
       $c,'getUsersSubscriptionsPage'
    ])->name('user.subscriptions');

    Route::post('/admin/updateAdmin',[
        $c,'authUpdateAdmin'
    ])->name('auth.update.admin');


});





?>