<?php

namespace App\Events;

use App\Model\Produtos;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class ProdutosEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function saving(Produtos $data)
    {
        $data = $this->clear($data);
    }

    public function saved(Produtos $data)
    {
        Cache::tags($data->getTag())->flush();
    }

    public function clear(Produtos $data){
        $data->preco = str_replace('.','', $data->preco);
        $data->preco = str_replace(',','.', $data->preco);

        return $data;
    }

}
