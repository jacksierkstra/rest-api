<?php

namespace App\Http\Controllers\Api\v1;

use Laravel\Lumen\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    function index() {
        $arr = [
          'version' => 'v1',
          'status' => 'ok'
        ];
        return $arr;
    }
}
