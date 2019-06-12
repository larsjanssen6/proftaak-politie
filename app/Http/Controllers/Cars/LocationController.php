<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use Zttp\Zttp;

class LocationController extends Controller
{
    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $url = env('HOST_URL_VERPLAATSING') . '/verplaatsing/api/location/current/' . $id;

        $response = Zttp::get($url);

        return $response->json();
    }
}
