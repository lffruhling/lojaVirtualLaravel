<?php

namespace App\Model;

class Categorias extends AbstractModel
{
    protected $table = 'categorias';

    public function getData(){
        $data = $this->orderBy('nome', 'asc')->pluck('nome', 'id');

        return !empty($data) ? $data->toArray() : [];
    }

}
