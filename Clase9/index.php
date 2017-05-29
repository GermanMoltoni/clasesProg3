<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require './cd.php';
require './vendor/autoload.php';
require './AccesoDatos.php';
$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->get('/cd', function (Request $request, Response $response) {

    $response->getBody()->write(json_encode(cd::TraerTodoLosCds()));

    return $response;
});
$app->post('/crearCd', function (Request $request, Response $response) {
    $array = $request->getQueryParams();
    $cd = new cd();
    $cd->titulo=$array['titulo'];
    $cd->cantante=$array['cantante'];
    $cd->año=$array['año'];
    $cd->InsertarElCd();
    //$response->getBody()->write($request->get);

    return $response;
});
$app->run();
?>