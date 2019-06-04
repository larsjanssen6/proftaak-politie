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

    /**
     * @param $id
     * @return mixed
     */
    public function setStolen($id)
    {
        $url = env('HOST_URL') . '/overheid/api/vehicle/stolen/' . $id;

        $response = Zttp::post($url);

        return $response->json();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function setUnstolen($id)
    {
        $url = env('HOST_URL') . '/overheid/api/vehicle/unstolen/' . $id;

        $response = Zttp::post($url);

        return $response->json();
    }
}
