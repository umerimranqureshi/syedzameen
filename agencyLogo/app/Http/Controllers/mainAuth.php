<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class mainAuth extends Controller
{

    public function __construct(Request $req)
    {
        $this->req = $req;
    }


    public function loginView()
    {
        return view('login');
    }


    public function register()
    {

        $this->validateWithBag("register", $this->req, [
            'name' => "required|min:2",
            'email' => "required|email",
            'mobile_number' => "required",
            'password' => "required|confirmed|min:6",


        ]);

        $checkEmailExist = User::where("email", $this->req->email)->first();
        $checkMobileExist = User::where("mobile_number", $this->req->mobile_number)->first();

        if (!empty($checkEmailExist)) {
            $msg = "Email Already exists";
            return back()->with("msg", $msg);
        } else if (!empty($checkMobileExist)) {
            $msg = "mobile number Already exists";
            return back()->with("msg", $msg);
        }



        $pass = Hash::make($this->req->password);

        $user = User::create([
            "name" => $this->req->name,
            "email" => $this->req->email,
            "mobile_number" => $this->req->mobile_number,
            "password" => $pass,

            "role" => 2,
        ]);

        $msg = "Account created succesfully please verify your email address, A link has been send to your email address";

        //event(new Registered($user));
        Auth::login($user);

        return redirect(url("verification/view"));
        //return  back()->with("msg", $msg);
        ///return $this->emailVerifyView();
    }




    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect("/");
        }
        $msg = "email or password is incorrect";
        return back()->with("msgg", $msg);
    }


    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }



    //////////////////////////////////email verify section///////////////////////////

    /* public function emailVerifyView()
    {
        return view('Auth.verifyEmailView');
    }

    public function emailVerify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/');
    } */

    /* public function sendEmailVerifyLinkAgain(Request $request)
    {

        if (!Auth::user()->hasVerifiedEmail()) {
            $request->user()->sendEmailVerificationNotification();

            return back()->with('status', 'verification-link-sent');
        }

        return redirect("/");
    } */
}
