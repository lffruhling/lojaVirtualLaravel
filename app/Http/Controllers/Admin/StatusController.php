<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatusRequest;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public $model = "Status";

    public function __construct()
    {
        $this->_title = "Estado do Pedido";

        parent::__construct();
    }

    public function save(StatusRequest $request)
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
