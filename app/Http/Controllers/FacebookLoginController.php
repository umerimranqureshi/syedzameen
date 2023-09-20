<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;

class FacebookLoginController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('facebook_id', $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                return redirect()->route("dashbored");
            } else {
                $createUser = User::create([

                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make("@*!@#$@#!%^@-!@!+_@)#*$(!@@#!"),
                    "role" => 2,
                    'facebook_id' => $user->id,

                ]);
                Auth::login($createUser);
                return redirect()->route("dashbored");
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
