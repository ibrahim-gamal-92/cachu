<?php

namespace Tests\Feature;

use App\Clients\BestHotelsClient;
use App\Clients\TopHotelsClient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->get('/search?country=eg')->assertStatus(200);
    }

    public function testMissingParams()
    {
        $this->get('/search?countrcy=eg')->assertStatus(302);
    }

    public function testWithMock()
    {
        $this->mock(BestHotelsClient::class)->shouldReceive('gett->getBody')
            ->andReturn(json_encode([
                "status" => "ok",
                "articles" => [
                    "source" => ["name"=>"test"],
                    "url" => "kjhkjhk",
                    "publishedAt" => "2020-07-24T20:41:00Z",
                ]
            ]));
        $this->mock(TopHotelsClient::class)->shouldReceive('gett->getBody')
            ->andReturn(json_encode([
                "status" => "ok",
                "articles" => [
                    "source" => ["name"=>"test"],
                    "url" => "kjhkjhk",
                    "publishedAt" => "2020-07-24T20:41:00Z",
                ]
            ]));
        $this->get('/search?countrcy=eg')->assertStatus(302);
    }

    /**
     * we can add multiple test here
     *
     * @return void
     */
}
