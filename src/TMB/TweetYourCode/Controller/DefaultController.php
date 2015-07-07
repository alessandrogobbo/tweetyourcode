<?php

namespace TMB\TweetYourCode\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
	public function defaultAction() {
		//echo "qui"; die;
		$remoteAddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
		return new JsonResponse($remoteAddress);
	}

}
