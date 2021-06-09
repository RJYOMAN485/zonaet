<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialFacebookAccountService;
use App\Models\User;


class FacebookController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service)
    {


        $user = Socialite::driver('facebook')->stateless()->user();

        $finduser = User::where('google_id','!=',null)->first()
                            ->update([
                                'name' => $user->getName(),
                                'email' => $user->getEmail(),
                            ]);
        
        //return redirect()->route('zonet.index');


        $finduser = User::where('facebook_id', $user->id)
                            ->orWhere('google_id', '!=', null)->first();

        if($finduser){
            
            //dd('exists');

            Auth::login($finduser);

            return redirect()->route('zonet.index');
 
        } else {
            //dd('not exist');

        //dd($user->email);
            $name = $user->getName();
            $email = $user->getEmail();
            $fb_id= $user->getId();

            $newUser = User::create([
                'name' => $name,
                'email' => $email,
                'facebook_id' => $fb_id,
                'password' => encrypt('dummy'),
            ]);
            Auth::login($newUser);
            return redirect()->route('zonet.index');


        }

        // $userModel = new User;
        // $createdUser = $userModel->addNew($create);
        


        //return redirect()->route('zonet.index');


        // $user = Socialite::driver('facebook')->user();
        // $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        // dd($user);
        //auth()->login($user);
        //Auth::lo($user);
        // return redirect()->route('zonet.index');
    }
}
