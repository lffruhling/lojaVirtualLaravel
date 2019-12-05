<?php


namespace App\Http\Helpers;


use Illuminate\Support\Facades\Auth;

class UserHelpers
{

    public static function getUser()
    {
        return Auth::user();
    }

    public static function getId()
    {
        return self::getUser()->id;
    }

    public static function getName()
    {
        return self::getUser()->name;
    }

}
