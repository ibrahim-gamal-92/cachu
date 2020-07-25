<?php

namespace App\Http\Controllers;

use App\Clients\BestHotelsClient;
use App\Clients\TopHotelsClient;
use App\Events\HotelsCrawling;
use App\Services\HotelService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(HotelService $service)
    {
        return $service->getData();
    }
}
