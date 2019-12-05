<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    public $model = "Categorias";

    public function __construct()
    {
        $this->_title = "Categorias";

        parent::__construct();
    }

    public function save(CategoriaRequest $request)
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
