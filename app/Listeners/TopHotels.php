<?php

namespace App\Listeners;

use App\Clients\BestHotelsClient;
use App\Clients\TopHotelsClient;
use App\Events\HotelsCrawling;
use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TopHotels extends BaseHotel
{
    /**
     * Create the event listener.
     *
     * @return void
     */


    public function __construct(TopHotelsClient $client)
    {
        $this->client = $client;
        $this->name = 'TopHotels';
    }


}
