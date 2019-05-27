<?php

namespace App\Http\Controllers\Cars;

use Zttp\Zttp;
use App\Http\Controllers\Controller;

class StolenCarController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $url = env('HOST_URL') . '/overheid/api/vehicle/stolen';

        $response = Zttp::get($url);

        return $response->json();
    }
}
