<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
// dd($user);

            $finduser = User::where('google_id', $user->id)->first();
// dd($finduser);
            if ($finduser) {

                Auth::login($finduser);

                return redirect('/');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'role' => "2",
                    'img_path' => $user->getAvatar(),
                    // "password" => Hash::make("@*!@#$@#!%^@-!@!+_@)#*$(!@@#!")
                ]);

                Auth::login($newUser);

                return redirect(url("verification/view"));
            }
        } catch (Exception $e) {

            return redirect('/login')->with('socialite_execption', 'network error please try again');
        }
    }
}
