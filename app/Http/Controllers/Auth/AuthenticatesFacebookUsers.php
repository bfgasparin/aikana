<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Socialite;

trait AuthenticatesFacebookUsers
{

    /**
     * Redirect the facebook provider.
     *
     * @return Response
     */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleFacebookProviderCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();

        $user = $this->findFacebookUser(
            $facebookUser
        );

        if(is_null($user)){
            return redirect('register/complete')->withInput([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'social_avatar' => $facebookUser->avatar,
                'facebook_id' => $facebookUser->id
            ]);
        }

        $user->fill([
            'social_avatar' => $facebookUser->avatar,
        ]);
        $user->save();

        auth()->login($user);

        return redirect()->intended($this->redirectPath());

    }

    public function findFacebookUser($facebookUser)
    {
        $user = User::where(function($query) use ($facebookUser){
            $query->where('facebook_id', $facebookUser->id)
                ->orWhere('email', $facebookUser->email)
            ;
        })->first();

        if ($user) {
            if(!$user->facebook_id){
                $user->facebook_id = $facebookUser->id;
                $user->save();
            }
        }

        return $user;
    }
}