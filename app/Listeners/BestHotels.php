<?php

namespace App\Listeners;

use App\Clients\BestHotelsClient;
use App\Events\HotelsCrawling;
use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BestHotels extends BaseHotel
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct(BestHotelsClient $client)
    {
        parent::__construct($client);
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
}
