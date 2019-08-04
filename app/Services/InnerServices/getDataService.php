<?php


namespace App\Services\InnerServices;

class getDataService
{
    private $code;
    private $dicStatusText = [
        200 => 'success',
        422 => 'reject',
        300 => 'bad'
    ];

    public function get($request)
    {
        switch ($request['userInfo']['creditStore']){
            case 'good':
                $this->code = 200;
                break;
            case 'bad':
                $this->code = 300;
                break;
            default : $this->code = 422;
        }
        return $this->prepareResponse();

    }

    private function prepareResponse()
    {
        return  response()->json($this->dicStatusText[$this->code], $this->code)
            ->header('Content-Type',  'application/json');
    }
}
