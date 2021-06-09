<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;
use Auth;
use Exception;
use App\Models\User;

class GoogleController extends Controller
{
    //
    public function redirectToGoogle()
    {
        //dd('hello');
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            
    
            $user = Socialite::driver('google')->stateless()->user();


            //$finduser = User::where('facebook_id','!=',null)->first();
            
            // if($finduser) {
            //     $finduser = User::where('facebook_id','!=',null)->first()
            //         ->update([
            //         'name' => $user->name,
            //         'email' => $user->email,
            //     ]);
            // }
     
            $finduser = User::where('google_id', $user->id)->first();
                                //->orWhere('google_id', '!=', null)->first();
     
            if($finduser){

               
     
                Auth::login($finduser);
    
                return redirect()->route('zonet.index');
     
            }else{
                
                $newUser = User::create([
                    'name' => $finduser->name,
                    'email' => $finduser->email,
                    'google_id'=> $finduser->id,
                    'password' => encrypt('dummy')
                ]);
    
                Auth::login($newUser);
     
                return redirect()->route('zonet.index');
            }
    
        } catch (Exception $e) {
            dd($e);
            dd($e->getMessage());
        }
    }
}
