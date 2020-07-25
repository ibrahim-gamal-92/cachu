<?php

namespace App\Listeners;

use App\Clients\BestHotelsClient;
use App\Events\HotelsCrawling;
use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BaseHotel
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    protected $client;
    protected $name;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function handle(HotelsCrawling $event)
    {
        $response = $this->client->get('', [
            'query' => $event->params
        ]);
        return $this->filterResponse($response);
    }

    protected function filterResponse($response){
        $data = (json_decode((string)$response->getBody(), true));
        return array_map(function($item){
            return [
                'provider' => $this->name,
                'hotelName' => $item['source']['name'] ?? '',
                'url' => $item['url'] ?? '',
                'publishedAt' => date('Y-m-d H:i:s' ,strtotime($item['publishedAt'])),
            ];
        }, $data['articles']);

        return collect($data['articles'])->map(function($item){
            /*return [
                'provider' => $this->name,
                'hotelName' => $item['hotelName'] ?? '',
                'fare' => $item['fare'] ?? '',
                'amenities' => $item['amenities'] ?? '',
            ];*/
            return [
                'provider' => $this->name,
                'hotelName' => $item['source']['name'] ?? '',
                'url' => $item['url'] ?? '',
                'publishedAt' => date('Y-m-d H:is' ,strtotime($item['publishedAt'])),
            ];
        });
    }
}
