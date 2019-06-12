<?php

namespace App\Http\Controllers\Cars;

use Zttp\Zttp;
use App\Http\Controllers\Controller;

class CarHistoryController extends Controller
{
    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $url = env('HOST_URL') . '/overheid/api/history/vehicle/' . $id;

        $response = Zttp::get($url);

        return $response->json();
    }
}
