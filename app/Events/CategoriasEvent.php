<?php

namespace App\Events;

use App\Model\Categorias;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class CategoriasEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function saving(Categorias $data)
    {
        $data = $this->clear($data);
    }

    public function saved(Categorias $data)
    {
        Cache::tags($data->getTag())->flush();
    }

    public function created(Categorias $data)
    {

    }

    public function clear(Categorias $data)
    {
        return $data;
    }

}
