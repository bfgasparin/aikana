<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Socialite;

trait AuthenticatesGoogleUsers
{

    /**
     * Redirect the Google provider.
     *
     * @return Response
     */
    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleGoogleProviderCallback()
    {
        $user = $this->findOrCreateGoogleUser(
            Socialite::driver('google')->user()
        );

        auth()->login($user);

        return redirect('/');
    }

    public function findOrCreateGoogleUser($googleUser)
    {
        $user = User::firstOrNew(['google_id' => $googleUser->id]);

        if ($user->exists) return $user;

        $user->fill([
            'username' =>  str_slug($googleUser->name),
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'avatar' => $googleUser->avatar,
        ])->save();

        return $user;
    }
}