<?php


namespace App\Http\Helpers;


use Carbon\Carbon;

class DateHelpers
{
    public static function DB2User($date = null)
    {
        $data = null;
        if (!empty($date) && strstr($date, '-')) {
            $data = Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
        }

        return $data;
    }

    public static function DBTimeStamp2UserDate($date = null)
    {
        $data = null;
        if (!empty($date) && strstr($date, '-')) {
            $data = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
        }

        return $data;
    }

    public static function DBTimeStamp2UserTimestamp($date = null)
    {
        $data = null;
        if (!empty($date) && strstr($date, '-')) {
            $data = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
        }

        return $data;
    }

    public static function User2DB($date = null)
    {
        $data = null;
        if (!empty($date) && strstr($date, '/')) {
            $data = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        }

        return $data;
    }
}
