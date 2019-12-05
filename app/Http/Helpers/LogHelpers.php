<?php


namespace App\Http\Helpers;


use App\Model\Logger;
use App\Model\SoaPrazoLog;

class LogHelpers
{
    public static function setLog($log, $interface, $codigo = null)
    {
        $data['codigo'] = $codigo;
        $data['user'] = UserHelpers::getId();
        $data['interface'] = $interface;
        $data['data'] = is_array($log) ? serialize($log) : $log;
        $data['created_at'] = now();
        $data['updated_at'] = now();

        (new Logger)->insert($data);
    }

}
