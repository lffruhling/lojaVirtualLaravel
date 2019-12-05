<?php

namespace App\Events;

use App\Model\Tipopagamentos;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class TipoPagamentosEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function saved(Tipopagamentos $data)
    {
        Cache::tags($data->getTag())->flush();
    }

}
