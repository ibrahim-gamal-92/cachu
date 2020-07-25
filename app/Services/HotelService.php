<?php

namespace App\Services;

use App\Events\HotelsCrawling;
use App\Post;
use App\Repositories\PostRepository;
use Dotenv\Validator;
use Illuminate\Http\Request;

class HotelService
{
    public $params;

    public function __construct(Request $request)
    {
        $this->params = $request->validate([
            'country' => ['required', 'string'],
//            'fromDate' => ['required', 'date'],
//            'toDate' => ['required', 'date'],
//            'city' => ['required', 'string'],
//            'numberOfAdults' => ['required', 'integer']
        ]);
    }

    public function getData()
    {
        return $this->sort(HotelsCrawling::dispatch($this->params));
    }

    protected function sort($data){
        $data = call_user_func_array('array_merge', $data);
        usort($data, function ($a,$b){
           return $a['publishedAt'] <= $b['publishedAt'];
        });
        return $data;
    }
}