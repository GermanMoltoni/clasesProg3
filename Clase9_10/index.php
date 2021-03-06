<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require './cd.php';
require './vendor/autoload.php';
require './AccesoDatos.php';
$app = new \Slim\App;
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', 'http://mysite')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

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
    $array = $request->getParsedBody();
    $files = $request->getUploadedFiles();
     
    $cd = new cd();
    $cd->titulo=$array['titulo'];
    $cd->cantante=$array['cantante'];
    $cd->año=$array['anio'];
    $cd->foto=$array['titulo'].'.'.pathinfo($files['file']->getClientFilename(),PATHINFO_EXTENSION);
    $files['file']->moveTo('./uploads/'.$cd->foto);
    $cd->InsertarElCd();

    return $response;
});
$app->run();
?>