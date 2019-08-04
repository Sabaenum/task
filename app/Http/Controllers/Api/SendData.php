<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ExternalServices\SendDataService;

class SendData extends Controller
{
    private $service;
    private $config;
    public function __construct(SendDataService $service)
    {
        $this->service = $service;
        $this->config = config('data.data');
    }

    public function send(){
        return$this->service->send($this->config);
    }
}
