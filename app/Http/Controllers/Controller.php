<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $_title;
    public $layout;
    public $model;
    protected $_model;

    /**
     * @var array
     */
    protected $_request;

    public function __construct()
    {
        if (isset($this->model)) {
            $this->layout = Str::snake($this->model, '-');

            $namespaceModel = '\\App\\Model\\' . Str::title($this->model);
            $this->_model = new $namespaceModel();
        }
    }

    public function index()
    {
        $view = View(request()->route()->action['as'])->with('title', $this->_title);

        return $view;
    }

    public function registro()
    {
        $view = View(request()->route()->action['as'])->with('title', $this->_title);

        $view->model = null;

        return $view;
    }

    /**
     * @param null $id
     * @return $this
     */
    public function edicao($id = null)
    {
        try {
            if (is_null($id))
                throw new \Exception(trans('Registro não encontrado!'));

            $view = $this->getLayoutViewEdicao();
            $view->model = $this->_model->_get($id);

            if (empty($view->model)) {
                throw new \Exception("Registro não encontrado!");
            }

            return $view;
        } catch (\Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }
    }

    public function listagem(Request $request)
    {
        $this->_request = $request;

        $view = View(request()->route()->action['as']);

        $select = $this->_model->select("*");
        $select = $this->setParams($select);

        $select->orderBy($this->_model->getPrimaryKey(), 'desc');

        $view->grid = $select->paginate(PAGINATION_PAGES);

        $view->params = $this->_paramsListagem();

        return $view;
    }

    public function _paramsListagem()
    {
        $params = $this->_request->all();
        if (isset($params['_token'])) {
            unset($params['_token']);
        }

        foreach ($params AS $k => $v) {
            $params[$k] = urldecode($v);
        }

        return $params;
    }


    public function setParams($sql)
    {
        $params = $this->_request;
        if (isset($params['_token'])) {
            unset($params['_token']);
        }

        if (!empty($params)) {
            $table = $this->_model->getTable();

            $columns = $this->_model->getColumns();

            $q = !empty($params['q']) ? $params['q'] : null;
            if (!empty($q)) {
                if (count($columns)) {
                    foreach ($columns AS $column) {

                        if (in_array($column, array('created_at', 'updated_at', 'ativo', 'deleted_at')))
                            continue;

                        $sql->oRwhere($table . "." . $column, 'LIKE', "%{$q}%");
                    }
                }
            }
        }

        return $sql;
    }

    public function getLayoutViewEdicao()
    {
        try {
            $view = View(request()->route()->action['as'])->with('title', $this->_title);
        } catch (\Exception $e) {
            $layout = str_replace(".edicao", ".registro", request()->route()->action['as']);
            $view = View($layout)->with('title', $this->_title);
        }

        return $view;
    }
}
