<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Psr7Middlewares\Middleware;
use Psr7Middlewares\Middleware\ClientIp;
use Psr7Middlewares\Middleware\DetectDevice;
use Psr7Middlewares\Middleware\Geolocate;

require './vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
$app = new \Slim\App(["settings" => $config]);
$app->get('/', function (Request $request, Response $response) {
 $data = Geolocate::getLocation($request)->first();

    return $response->withRedirect('https://maps.google.com/?q='.$data->getLatitude().','.$data->getLongitude());
    return $response->withJson(array('ip'=>ClientIp::getIp($request),'device'=>DetectDevice::getDevice($request)->isMobile(),'lugar'=>[]));

    
})->add(Middleware::DetectDevice())->add(Middleware::Geolocate())->add(Middleware::ClientIp());
$app->run();



