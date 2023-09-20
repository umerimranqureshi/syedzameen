<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumberVarification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class helper extends Controller
{
    //

    public  function checkPhoneVerification()
    {

        $phone = PhoneNumberVarification::where("user_id", Auth::id())->first();
        if (!empty($phone)) {
            if ($phone->verified == 1) {
                return 1;
            }
        }
        return 0;
    }


    public static function DBDateToSimpleFormat($date = "12-14-2020")
    {

        $dateArray = [];

        $date = Carbon::createFromFormat('Y-m-d', $date);

        $dateArray[] = $date->format("d");

        $dateArray[] = $date->format("F");

        $dateArray[] = $date->format("yy");
        //dd($dateArray);
        return $dateArray;
    }

    public static function conciseContent($content)
    {

        $content = substr($content, 0, 30);

        return $content;
    }



    public static function labelWithAmount($amount)
    {
        $amount = intval($amount);

        switch ($amount) {
            case $amount > 999 && $amount < 100000:
                $amount = $amount / 1000;
                $amount = "$amount K";
                break;
            case $amount > 99999 && $amount < 10000000:
                $amount = $amount / 100000;
                $amount = "$amount Lac";
                break;
            case $amount > 9999999:
                $amount = $amount / 10000000;
                $amount = "$amount Crore";
                break;
        }

        return $amount;
    }


    public static function stringSeperatedByCommaToArray($string)
    {
        $array = explode(",", $string);

        return $array;
    }
}
