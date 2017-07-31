<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Psr7Middlewares\Middleware;
use Psr7Middlewares\Middleware\ClientIp;
use Psr7Middlewares\Middleware\ImageTransformer;

use Psr7Middlewares\Middleware\DetectDevice;
use Psr7Middlewares\Middleware\Geolocate;
use Imagecow\Image;
require './vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
$app = new \Slim\App(["settings" => $config]);
 

$app->get('/', function (Request $request, Response $response) {
 $data = Geolocate::getLocation($request)->first();

    return $response->withRedirect('https://maps.google.com/?q='.$data->getLatitude().','.$data->getLongitude());
    return $response->withJson(array('ip'=>ClientIp::getIp($request),'device'=>DetectDevice::getDevice($request)->isMobile(),'lugar'=>[]));

    
})->add(Middleware::DetectDevice())->add(Middleware::Geolocate())->add(Middleware::ClientIp());
$app->get('/foto', function (Request $request, Response $response) {
    $path = 'IMG_3785.jpg';

$image = Image::fromFile($path)
    
        ->resize('50%','50%')->quality(80)
    ->save($path);


   return $response->withJson(array('foto'=>filesize('s'.$path)/ pow(1024, 2)));
});


$app->get('/images/picture.jpg',function(Request $request, Response $response){});






 $app->post('/f',function(Request $request, Response $response){
    
    var_dump(Middleware::ImageTransformer([   // The available sizes of the images.
            './images/small.' => 'resizeCrop,50,50', //Creates a 50x50 thumb of any image prefixed with "small." (example: /images/small.avatar.jpg)
            //'./imagesmedium.' => 'resize,500|format,jpg', //Resize the image to 500px and convert to jpg
            //'./images/large.' => 'resize,1000|format,jpg', //Transform only images inside "pictures" directory (example: /images/pcitures/large.avatar.jpg)
        ]));



 });

        
       
 
$app->run();



