<?php

require_once __DIR__.'/../vendor/autoload.php';
		  
use Symfony\Component\Config\FileLocator;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;

$locator = new FileLocator(array(__DIR__.'/../config'));
$yamlLoader = new YamlFileLoader($locator);
$routes = $yamlLoader->load('routing.yml');

$request = Request::createFromGlobals();
$requestContext = new RequestContext();
$requestContext->fromRequest($request);

$matcher = new UrlMatcher($routes, $requestContext);
$dispatcher = new EventDispatcher();
$dispatcher->addSubscriber(new RouterListener($matcher));

$resolver = new ControllerResolver();
$kernel = new HttpKernel($dispatcher, $resolver);
$response = $kernel->handle($request);

$response->send();
$kernel->terminate($request, $response);