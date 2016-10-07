<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Socialite;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;

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
    public function handleFacebookProviderCallback(Request $request)
    {
        try{
            $facebookUser = Socialite::driver('facebook')->user();
        } catch (ClientException $e) {
            return redirect('/login');
        }

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

        return $this->sendLoginResponse($request);

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