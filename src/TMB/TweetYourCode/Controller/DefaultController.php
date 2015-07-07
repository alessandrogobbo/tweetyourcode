<?php

namespace TMB\TweetYourCode\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//error_reporting(E_ALL);

class DefaultController
{
	public function defaultAction() {
		$client = new \GuzzleHttp\Client();

//echo "quo";

	try{
		$res = $client->get('https://54.154.166.145/v1/flow/tmb', [
    			'verify' => false,
    			'auth' => ['7791dab8a81ccbd09712423c', 'x'],
			'headers' => ['Accept' => 'application/json']
		]);
	}
	catch(\Exception $e) {
		echo $e->getMessage(); die;
	}

//$res = $client->get('https://54.154.166.145/v1/flow/tmb', ['verify' => false]);
//echo "que";
//$res = $client->get('https://54.154.166.145/v1/flow/ee26bfc9edbe');

//echo $res->getStatusCode();
// "200"
//echo $res->getHeader('content-type');
// 'application/json; charset=utf8'
//echo $res->getBody();
// {"type":"User"...'

//echo "qui"; die;

// Send an asynchronous request.
//$request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
//$promise = $client->sendAsync($request)->then(function ($response) {
//    echo 'I completed! ' . $response->getBody();
//	$responseText = "completed".$response->getBody();
//});
//$promise->wait();

		$responseText = $res->getBody();
		echo $responseText; die;		
		//return $responseText;
		//$responseText .= $_SERVER["HTTP_X_FORWARDED_FOR"];
		//return new JsonResponse($responseText);
	}

}
