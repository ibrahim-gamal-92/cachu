<?php

namespace App\Clients;

use GuzzleHttp\Client;

class BestHotelsClient extends Client {

    public function getData(array $params){
        $response = $this->get('?country=us');
        return json_decode((string)$response->getBody(), true);
    }

}