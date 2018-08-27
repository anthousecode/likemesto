<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Socialite;



class AuthController extends Controller
{
    //
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();

    }
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        //dd($user);
        //$user = Socialite::with('VKontakte')->redirect();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect('/home');
    }
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'password' => '123456',
'roles' => '0',
'verify' => '1',
//            'provider' => $provider,
//            'provider_id' => $user->id
        ]);
    }
}
