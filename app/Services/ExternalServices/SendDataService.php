<?php


namespace App\Services\ExternalServices;

use GuzzleHttp\Client;

class SendDataService
{
    public function send($data){

        $client = new Client();
        $url = env('APP_URL')."/api/getData";
        try {
            $response = $client->post($url,
                [
                    'form_params' => $data,
                    'headers' => [
                        'Accept' => 'application/json',
                    ]
                ]
            );
        }catch (\Exception $e){
            return response()->json(['SubmitDataResult' => 'reject'], $e->getCode());
        }
        $result = json_decode($response->getBody()->getContents(), true);
        return response()->json(['SubmitDataResult' => $result],$response->getStatusCode());
    }

}
