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
        $user = $this->findOrCreateFacebookUser(
            Socialite::driver('facebook')->user()
        );

        auth()->login($user);

        return redirect('/');
    }

    public function findOrCreateFacebookUser($facebookUser)
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

            return $user;
        }

        return User::create([
            'username' =>  str_slug($facebookUser->name),
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'avatar' => $facebookUser->avatar,
            'facebook_id' => $facebookUser->id,
        ]);
    }
}