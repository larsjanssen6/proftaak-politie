<?php

namespace App\Http\Controllers\Cars;

use Zttp\Zttp;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    /**
     * @param $search
     * @return mixed
     */
    public function search($search)
    {
        $url = env('HOST_URL') . '/overheid/api/vehicle/search';

        $response = Zttp::asJson()->post($url, [
            'licensePlate' => $search,
            'stolen' => '0'
        ]);

        return $response->json();
    }
}
