<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RestClientController extends Controller
{
    public function index() {
        $serviceUrl = "http://localhost:8888/activity/public/";
        $api = "usersrest";
        $param = "";
        $uri = $api . "/" . $param;

        try {
            $client = new Client(['base_uri' => $serviceUrl]);
            $response = $client->request('GET', $uri);

            if ($response->getStatusCode() == 200) {
                return $response->getBody();
            } else {
                return "There was an error: " . $response->getStatusCode();
            }
        } catch (ClientException $e) {
            return "There was an exception" . $e->getMessage();
        }
    }
}
