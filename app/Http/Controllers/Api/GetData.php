<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetDataRequest;
use App\Services\InnerServices\getDataService;

class GetData extends Controller
{
    private $service;

    public function __construct(getDataService $service)
    {
        $this->service = $service;
    }

    public function get(GetDataRequest $request){
        return $this->service->get($request->all());
    }
}
