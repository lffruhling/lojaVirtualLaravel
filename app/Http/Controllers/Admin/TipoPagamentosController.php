<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Http\Requests\TipoPagamentoRequest;
use Illuminate\Support\Facades\DB;

class TipoPagamentosController extends Controller
{
    public $model = "Tipopagamentos";

    public function __construct()
    {
        $this->_title = "Tipo de Pagamentos";

        parent::__construct();
    }

    public function save(TipoPagamentoRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $data = $this->_model->_save($request->all());
            });

            $response['status'] = true;
        } catch (\Exception $e) {
            $response['message'] = $e->getMessage();
        }

        return response()->json($response);
    }
}
