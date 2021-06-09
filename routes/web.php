<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('auth/google', [GoogleController::class,'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class,'handleGoogleCallback']);

Route::get('/redirect', [FacebookController::class,'redirect'])->name('auth.facebook');
Route::get('/callback', [FacebookController::class,'callback']);




Route::get('/', [HomeController::class,'index'])->name('zonet.index');

//Route::get('/',[HomeController::class,'index']);

Route::get('/videos',[HomeController::class,'index'])->name('zonet.index');

Route::get('/video/{id}/',[HomeController::class,'show'])->name('show');

Route::post('/post/signup',[PostSignupController::class,'signup']);

Route::post('/post/login',[PostLoginController::class,'login']);

// Route::get('api/admin/login',[AdminController::class,'getAdminLoginPage'])->name('admin.login');





Route::get('/login',[HomeController::class,'getLoginPage'])->name('auth.login');
Route::get('/register', [HomeController::class, 'getRegisterPage'])->name('auth.register');
Route::post('/registerUser', [ HomeController::class, 'registeredUser' ]);
Route::post('/login', [ HomeController::class, 'loginAuth' ]);
Route::post('/logout', [ HomeController::class, 'logoutAuth' ])->name('logoutAuth');




//Route::get('product', 'RazorpayController@index');
//Route::post('paysuccess', 'RazorpayController@paysuccess');
//Route::post('razor-thank-you', 'RazorpayController@thankYou');

Route::group([ 'middleware' => 'auth' ], function () {

    
    $c = HomeController::class;

    Route::get('/profile', [
        $c,
        'getProfile'
    ])->name('auth.profile');

    Route::get('/auth/account',[
        $c,'getAccountPage'
    ])->name('auth.account');

    Route::get('/auth/settings',[
       $c,'getAccountSettingsPage'
    ])->name('auth.account.settings');

    Route::get('/auth/subscriptions',[
       $c,'getAccountSubscriptionsPage'
    ])->name('auth.account.subscriptions');

    Route::post('/auth/authUpdateUser',[
        $c,'authUpdateUser'
    ])->name('auth.update.user');

    Route::get('/payment-initiate',function(){
        $user = Auth::user();
        if(!Auth::check()) {
            return redirect()->route('auth.login');
        }
        return view('payment-initiate',compact('user'));
    })->name('payment.initiate');
    
    // for Initiate the order
    Route::post('/payment-initiate-request',[RazorpayController::class,'Initiate']);
    
    // for Payment complete
    Route::post('/payment-complete',[RazorpayController::class,'complete']);

    Route::get('/payment-renew',[RazorpayController::class,'renewPayment']);

});


