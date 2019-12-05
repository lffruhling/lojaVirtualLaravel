<?php

namespace App\Model;

class Produtos extends AbstractModel
{
    protected $table = 'produtos';

    public function categorias(){
        return $this->hasOne(Categorias::class, 'id', 'categoria');
    }

}
