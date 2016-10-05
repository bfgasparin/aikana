<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Foundation\Auth\RedirectsUsers;
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
       $googleUser = Socialite::driver('google')->user();

        $user = $this->findGoogleUser(
            $googleUser
        );

        if(is_null($user)){
            return redirect('register/complete')->withInput([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'social_avatar' => $googleUser->avatar,
                'google_id' => $googleUser->id
            ]);
        }

        $user->fill([
            'social_avatar' => $googleUser->avatar,
        ]);

        $user->save();

        auth()->login($user);

        return redirect()->intended($this->redirectPath());
    }

    public function findGoogleUser($googleUser)
    {
        $user = User::where(function($query) use ($googleUser){
            $query->where('google_id', $googleUser->id)
                ->orWhere('email', $googleUser->email)
            ;
        })->first();

        if ($user) {
            if(!$user->google_id){
                $user->google_id = $googleUser->id;
                $user->save();
            }
        }

        return $user;
    }
}