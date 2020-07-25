<?php

namespace App\Providers;

use App\Clients\BestHotelsClient;
use App\Clients\TopHotelsClient;
use App\Repositories\BestHotelsRepository;
use App\Services\HotelService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(BestHotelsClient::class, function (){
           return new BestHotelsClient([
               'base_uri' => 'https://newsapi.org/v2/top-headlines',
               'headers' => [
                   'Authorization' => 'bc9d632ca1da4806b50971820949c86b'
               ]
           ]);;
        });
        $this->app->singleton(TopHotelsClient::class, function (){
           return new TopHotelsClient([
               'base_uri' => 'https://newsapi.org/v2/top-headlines',
               'headers' => [
                   'Authorization' => 'bc9d632ca1da4806b50971820949c86b'
               ]
           ]);;
        });
        $this->app->singleton(BestHotelsRepository::class, function (){
           return new BestHotelsRepository();
        });


        $this->app->singleton(HotelService::class, function (){
           return new HotelService(\request());
        });
    }
}
