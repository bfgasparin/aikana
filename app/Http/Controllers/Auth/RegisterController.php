<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Invite;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use ValidatesEmail;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $data = $request->all();

        if($request->hasFile('avatar')){
            $data['avatar'] = $request->file('avatar')->store('avatar');
        }

        event(new Registered($user = $this->create($data)));

        return redirect('login')->with([
            'title' => trans('email.confirm.title'),
            'status' => trans('email.confirm.message', ['app'  => config('app.name')])
        ]);
    }


    /**
     * Handle the completion of the registration.
     *
     */
    public function showRegisterComplete()
    {
        return view('auth.register-complete');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'social_avatar' => 'required_without:avatar|url',
            'avatar' => 'required_without:social_avatar|image',
            'username' => 'required|unique:users',
            'password' => 'required_without_all:facebook_id,google_id|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $nonEmptyData = (new Collection($data))->filter(function($value){
            return !empty($value);
        })->toArray();

        $nonEmptyData['password'] = isset($nonEmptyData['password']) ? bcrypt($nonEmptyData['password']) : null;
        $user = User::create($nonEmptyData);

        if(session()->has('invite_id')){
            $user->acceptInvite(Invite::find(session()->pull('invite_id')));
        }

        return $user;
    }
}
