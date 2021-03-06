<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once '/vendor/autoload.php';
require_once './clases/AccesoDatos.php';
require_once './clases/cd.php';
require_once './clases/AutentificadorJWT.php';


$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*

¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

$app = new \Slim\App(["settings" => $config]);

//require_once "saludo.php";


$app->get('/crearToken', function (Request $request, Response $response) {    
    $datos=array('nombre'=>'julian',
                 'apellido'=>'perez',
                 'edad'=>12
                 );
    $token=AutentificadorJWT::CrearToken($datos);
    return $response->withJson($token);

});

$app->get('/verificarToken', function (Request $request, Response $response) {  
     $datos=array('nombre'=>'julian',
                 'apellido'=>'perez',
                 'edad'=>12
                 );
    $token=AutentificadorJWT::CrearToken($datos);
    $return = AutentificadorJWT::VerificarToken($token);
    return $response->withJson($return);

});
$app->get('/verificarTokenViejo', function (Request $request, Response $response) {  
    $return = AutentificadorJWT::VerificarToken("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE0OTczMTQ5MjUsImV4cCI6MTQ5NzMxNDk4NSwiZGF0YSI6eyJub21icmUiOiJqdWxpYW4iLCJhcGVsbGlkbyI6InBlcmV6IiwiZWRhZCI6MTJ9LCJhcHAiOiJBcGkgUmVzdCBKV1QifQ.9bXaqMibbabeYll5GX7xez5uA5j7d15g4RY_Z-TDXDM");
    return $response->withJson($return);

});
$app->put('[/]', function (Request $request, Response $response) {  
    $response->getBody()->write("PUT => Bienvenido!!! ,a SlimFramework");
    return $response;

});

$app->delete('[/]', function (Request $request, Response $response) {  
    $response->getBody()->write(" DELETE => Bienvenido!!! ,a SlimFramework");
    return $response;

});



$app->get('/datos/', function (Request $request, Response $response) {     
    $datos = array('nombre' => 'rogelio','apellido' => 'agua', 'edad' => 40);
    $newResponse = $response->withJson($datos, 200);  
    return $newResponse;
});

$app->post('/datos/', function (Request $request, Response $response) {    
    $ArrayDeParametros = $request->getParsedBody();
   // var_dump($ArrayDeParametros);
    $objeto= new stdclass();
    $objeto->nombre=$ArrayDeParametros['nombre'];
    $objeto->apellido=$ArrayDeParametros['apellido'];
    $objeto->edad=$ArrayDeParametros['edad'];
    $newResponse = $response->withJson($objeto, 200);  
    return $newResponse;

});

/* atender todos los verbos de HTTP*/
$app->any('/cualquiera/[{id}]', function ($request, $response, $args) {
    
    var_dump($request->getMethod());
    $id=$args['id'];
    $response->getBody()->write("cualquier verbo de ajax parametro: $id ");
    return $response;
});



/* atender algunos los verbos de HTTP*/
$app->map(['GET', 'POST'], '/mapeado', function ($request, $response, $args) {

      var_dump($request->getMethod());
     $response->getBody()->write("Solo POST y GET");
});


/* agrupacion de ruta*/
$app->group('/saludo', function () {

    $this->get('/{nombre}', function ($request, $response, $args) {
        $nombre=$args['nombre'];
        $response->getBody()->write("HOLA, Bienvenido <h1>$nombre</h1> a la apirest de 'CDs'");
    });

     $this->get('/', function ($request, $response, $args) {
        $response->getBody()->write("HOLA, Bienvenido a la apirest de 'CDs'... ingresá tu nombre");
    });
 
     $this->post('/', function ($request, $response, $args) {      
        $response->getBody()->write("HOLA, Bienvenido a la apirest por post");
    });
     
});


/* agrupacion de ruta y mapeado*/
$app->group('/usuario/{id:[0-9]+}', function () {

    $this->map(['POST', 'DELETE'], '', function ($request, $response, $args) {
        $response->getBody()->write("Borro el usuario por id");
    });

    $this->get('/nombre', function ($request, $response, $args) {
        $response->getBody()->write("Retorno el nombre del usuario del id ");
    });
});



/*LLAMADA A METODOS DE INSTANCIA DE UNA CLASE*/
$app->group('/cd', function () {   

$this->get('/', \cd::class . ':traerTodos');
$this->get('/{id}', \cd::class . ':traerUno');
     
});



/*SUBIDA DE ARCHIVO*/
$app->post('/cd[/]', function (Request $request, Response $response) {
  
  	
  	$ArrayDeParametros = $request->getParsedBody();
  	//var_dump($ArrayDeParametros);
  	$titulo= $ArrayDeParametros['titulo'];
  	$cantante= $ArrayDeParametros['cantante'];
  	$año= $ArrayDeParametros['anio'];
  	
  	$micd = new cd();
  	$micd->titulo=$titulo;
  	$micd->cantante=$cantante;
  	$micd->año=$año;
  	$micd->InsertarElCdParametros();

  	$archivos = $request->getUploadedFiles();
    $destino="./fotos/";
  	//var_dump($archivos);
  	//var_dump($archivos['foto']);

  	$nombreAnterior=$archivos['foto']->getClientFilename();
  	$extension= explode(".", $nombreAnterior)  ;
  	//var_dump($nombreAnterior);
  	$extension=array_reverse($extension);

  	$archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
    $response->getBody()->write("cd");

    return $response;

});









$app->run();