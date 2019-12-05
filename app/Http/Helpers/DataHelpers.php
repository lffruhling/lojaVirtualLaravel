<?php

namespace App\Http\Helpers;

use App\Model\Clientes;
use Carbon\Carbon;

class DataHelpers
{
    public static function getDestinos()
    {
        $data['C'] = "Cliente";
        $data['R'] = "Rede";
        $data['GE'] = "GE";

        return $data;
    }

    public static function getPrazoDescricao()
    {
        $data['D'] = "Divisao";
        $data['P'] = "Produto";
        $data['L'] = "Laboratório";

        return $data;
    }

    public static function getLogTipos()
    {
        $data['A'] = "Alteração";
        $data['I'] = "Inclusão";
        $data['E'] = "Exclusão";

        return $data;
    }

    public static function getPrazoDescricaoCompleto()
    {
        $data = self::getPrazoDescricao();
        $data['L'] = "Laboratorio";

        return $data;
    }

    public static function getParcelas()
    {
        $data = null;

        foreach (range(7, 365) as $number) {
            $data[$number] = $number;
        }

        return $data;
    }

    public static function getEstados()
    {
        $data = array(
            'AC' => 'Acre',
            'AL' => 'Alagoas',
            'AP' => 'Amapá',
            'AM' => 'Amazonas',
            'BA' => 'Bahia',
            'CE' => 'Ceará',
            'DF' => 'Distrito Federal',
            'ES' => 'Espirito Santo',
            'GO' => 'Goiás',
            'MA' => 'Maranhão',
            'MS' => 'Mato Grosso do Sul',
            'MT' => 'Mato Grosso',
            'MG' => 'Minas Gerais',
            'PA' => 'Pará',
            'PB' => 'Paraíba',
            'PR' => 'Paraná',
            'PE' => 'Pernambuco',
            'PI' => 'Piauí',
            'RJ' => 'Rio de Janeiro',
            'RN' => 'Rio Grande do Norte',
            'RS' => 'Rio Grande do Sul',
            'RO' => 'Rondônia',
            'RR' => 'Roraima',
            'SC' => 'Santa Catarina',
            'SP' => 'São Paulo',
            'SE' => 'Sergipe',
            'TO' => 'Tocantins',
        );

        return $data;
    }

    public static function getAtivos()
    {
        $data[1] = "Ativo";
        $data[0] = "Inativo";

        return $data;
    }
}
