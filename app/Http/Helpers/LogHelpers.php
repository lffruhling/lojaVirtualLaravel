<?php


namespace App\Http\Helpers;


use App\Model\SoaPrazoLog;
use Carbon\Carbon;

class LogHelpers
{
    public static function setLog($spc_co_numero, $log, $spl_in_log = "I")
    {
        $data['ID'] = UserHelpers::getId();
        $data['SPC_CO_NUMERO'] = $spc_co_numero;
        $data['SPL_IN_LOG'] = $spl_in_log;
        $data['SPL_TX_LOG'] = is_array($log) ? serialize($log) : $log;
        $data['CREATED_AT'] = date("Y-m-d");
        $data['UPDATED_AT'] = date("Y-m-d");

        (new \App\Model\SoaPrazoLog)->insert($data);
    }

    public static function setLogPrazoFixo($sfc_co_numero, $log, $spl_in_log = "I")
    {
        $data['ID'] = UserHelpers::getId();
        $data['SFC_CO_NUMERO'] = $sfc_co_numero;
        $data['SFL_IN_LOG'] = $spl_in_log;
        $data['SFL_TX_LOG'] = is_array($log) ? serialize($log) : $log;
        $data['CREATED_AT'] = Carbon::now();
        $data['UPDATED_AT'] = $data['CREATED_AT'];

        (new \App\Model\SoaPrazoFixoLog())->insert($data);
    }
}
