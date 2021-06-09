<?php
namespace App\Services;
use App\Models\SocialFacebook;
use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        //dd($providerUser);
        $account = SocialFacebook::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            dd($account);
            // return $account->user;
            return $account->provider_user_id;

        } else {
            $account = new SocialFacebook([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                    //dd('not user');
                    $user = User::create([
                    'email' => $providerUser->getEmail(),
                    //'name' => $providerUser->getName(),
                    'password' => md5(rand(1,10000)),
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}