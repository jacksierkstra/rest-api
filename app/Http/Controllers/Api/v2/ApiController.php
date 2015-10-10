<?php

namespace App\Http\Controllers\Api\v2;

use Laravel\Lumen\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    function index() {
        $arr = [
          'version' => 'v2',
          'status' => 'ok'
        ];
        return $arr;
    }
}
