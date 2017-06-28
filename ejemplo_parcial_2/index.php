<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require './Clases/BicicletaApi.php';
require './Clases/VentasApi.php';
require './Clases/UsuarioApi.php';
require './Clases/Verificadora.php';
require './vendor/autoload.php';
$config['displayErrorDetails'] = true;
$app = new \Slim\App(["settings" => $config]);


/*
Terminados
Buscar Bici por ID
Listar Todas las Bicis
Borra bici por Id
listar por color
Modificar bici  Verifica que exista la bici, ue venga una foto, la copia y modifica datos

FALTA alta bici para foto
*/
$app->group('/bicicleta', function () {
    $this->post('/alta',\BicicletaApi::class . ':AltaBicicletaApi')->add(\ArchivoApi::class . ':SubirImagenBici')->add(\Verificadora::class . ':VerificarArchivo');
    $this->get('/lista',\BicicletaApi::class . ':ListarBicicletasApi');
    $this->get('/{idBicicleta}',\BicicletaApi::class . ':TraerBicicletaPorIdApi');
    $this->get('/listaporcolor/{color}',\BicicletaApi::class . ':TraerBicicletaPorColorApi');
    $this->delete('/{idBicicleta}',\BicicletaApi::class . ':BorrarBicicletaPorIdApi');
    $this->map(['PUT','POST'],'/modificar[/{idBicicleta}/{marca}/{color}/{rodado}]',\BicicletaApi::class . ':ModificarBicicletaApi')->add(\ArchivoApi::class . ':ModificarImagenBici')->add(\Verificadora::class . ':VerificarArchivo')->add(\Verificadora::class . ':VerificarBici');
});

/*
    Se puede dar de alta un usuario
    Verifica usuario en DB

*/
$app->group('/usuario', function () {
    $this->post('/login',\UsuarioApi::class . ':VerificarUsuarioApi');
    $this->post('/alta',\UsuarioApi::class . ':AltaUsuarioApi');
});

/*
Verifica que exista la bici a vender
Copia la imagen de la bici vendida, con nombre  id-nombreCliente y lo pasa para dar el alta a la venta
*/
$app->group('/ventas', function () {
    $this->post('/nueva',\VentaApi::class . ':AltaVentaApi')->add(\ArchivoApi::class . ':CopiarImagenVenta')->add(\Verificadora::class . ':VerificarBici');}
    
    );
$app->run();