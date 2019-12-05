<?php

namespace App\Events;

use App\Model\Categorias;
use App\Model\Status;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class StatusEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function saving(Status $data)
    {
        $data = $this->clear($data);
    }

    public function saved(Status $data)
    {
        Cache::tags($data->getTag())->flush();
    }

    public function created(Status $data)
    {

    }

    public function clear(Status $data)
    {
        return $data;
    }

}
