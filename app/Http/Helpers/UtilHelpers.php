<?php


namespace App\Http\Helpers;


use Carbon\Carbon;

class UtilHelpers
{
    public static function _encode($data)
    {
        return utf8_encode($data);
    }

    public static function datePeriodo($start, $end)
    {
        $dt_start = Carbon::createFromFormat("Y-m-d H:i:s", $start);
        $dt_end = Carbon::createFromFormat("Y-m-d H:i:s", $end);

        return $dt_start->format("d/m/Y") . " ~ " . $dt_end->format("d/m/Y");
    }
}
