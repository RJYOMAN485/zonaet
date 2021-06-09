<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Video;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Transaction;
use Validator;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function __construct()
    {
        
        $dt = Carbon::now();

       

        //check if the current subscription is expired
       
            
            Subscription::where('expires', '<=', $dt->toDateString())
                            ->update(['status'=> 'expired']);

            Transaction::where('expires', '<=', $dt->toDateString())
                            ->update(['status'=> 'expired']);

       

    }
    

    public function index() {
        $videos = Video::get();
        return view('home',compact('videos'));
    }

    public function show($id) {

     
        $sub = Subscription::where('user_id',Auth::id())
                            ->where('status','success')->first();


        $video = Video::where('id',$id)->first();
        return view('show',['video'=>$video ,'sub'=>$sub]);    
         
    }

    public function getRegisterPage()
    {
        return view('registration');
    }

    public function getLoginPage()
    {
        if (Auth::check()) {
            return redirect()->route('zonet.index');
        } else {
            return view('login');
        }
    }

    public function registeredUser(Request $request)
    {
        
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ])->validate();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('auth.login')->withSuccess('Registration sucessful');
    }

    public function loginAuth(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logoutAuth(Request $request)
    {
        //dd('logout user');
        Auth::logout();
        return redirect('/');
    }

    public function getProfile() {
        return view('profile');
    }

    public function getAccountPage() {
        return view('auth_account');
    }

    public function getAccountSettingsPage() {
        $user = Auth::user();
        //dd($user);
        return view('auth_account_settings',compact('user'));
    }

    public function getAccountSubscriptionsPage() {

      
                            
         $subs = Subscription::where('user_id',Auth::id())->first();

        $transactions = Transaction::where('user_id',Auth::id())->get();
          
    


        return view('auth_account_subscriptions',compact(['subs','transactions']));
    }

    public function authUpdateUser(Request $request) {
        $user = Auth::user();
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'password' => 'required|confirmed|min:6',
            'phone' => 'required|min:10|max:10',
            'password_confirmation' => 'required',
        ])->validate();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return back()->withSuccess('Profile update sucessful');




    }
}

