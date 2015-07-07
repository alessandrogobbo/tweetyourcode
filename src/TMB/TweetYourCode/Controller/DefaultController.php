<?php

namespace TMB\TweetYourCode\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
	public function defaultAction() {
		return $this->getAppfrontFlowAction();
	}
	
	public function getMyIpAction() {
		$responseText .= $_SERVER["HTTP_X_FORWARDED_FOR"];
		return new JsonResponse($responseText);
	}
	
	public function getAppfrontFlowAction() {
		$client = new \GuzzleHttp\Client();
		try {
			$res = $client->get('https://54.154.166.145/v1/flow/tmb', [
	    			'verify' => false,
	    			'auth' => ['7791dab8a81ccbd09712423c', 'x'],
				'headers' => ['Accept' => 'application/json']
			]);
		}
		catch(\Exception $e) {
			echo $e->getMessage(); die;
		}
	
		$responseData = json_decode($res->getBody());
			
		//$responseText .= $_SERVER["HTTP_X_FORWARDED_FOR"];
		return new JsonResponse($responseData);
	}

}
