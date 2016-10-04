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
        $user = User::firstOrNew(['facebook_id' => $facebookUser->id]);

        if ($user->exists) return $user;

        $user->fill([
            'username' =>  str_slug($facebookUser->name),
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'avatar' => $facebookUser->avatar,
        ])->save();

        return $user;
    }
}