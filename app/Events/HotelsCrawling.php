<?php

namespace App\Events;

use App\Repositories\BestHotelsRepository;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class HotelsCrawling
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

}
