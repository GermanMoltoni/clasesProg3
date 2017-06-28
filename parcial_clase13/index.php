<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require './Clases/UsuarioApi.php';
require './Clases/MedicamentoApi.php';
require './Clases/ArchivoApi.php';
require './Clases/VentaApi.php';

require './Clases/Verificadora.php';
require './vendor/autoload.php';
$config['displayErrorDetails'] = true;
$app = new \Slim\App(["settings" => $config]);

$app->group('/usuario', function () {
    $this->post('/verificar',\UsuarioApi::class . ':VerificarUsuarioApi');
    $this->post('/crear',\UsuarioApi::class . ':CrearUsuarioApi');
});
$app->group('/medicamento', function () {
    $this->post('/alta',\MedicamentoApi::class . ':AltaMedicamentoApi')->add(\Verificadora::class . ':VerificarMedicamentoDup');// alta de medicamento
    $this->get('/lista',\MedicamentoApi::class . ':ListarMedicamentosApi');// lista todos los medicamentos
    $this->get('/medicamentoPorId/{idMedicamento}',\MedicamentoApi::class . ':TraerMedicamentoPorIdApi');//busca por id
    $this->get('/listaordenadolaboratorio',\MedicamentoApi::class . ':MedicamentoOrdLaboIdApi');// Lista ord por laboratorio
    $this->delete('/{idMedicamento}',\MedicamentoApi::class . ':BorrarMedicamentoPorIdApi');//Borra med por id
});

$app->group('/ventas', function () {
    $this->post('/nueva',\VentaApi::class . ':AltaVentaApi')->add(\ArchivoApi::class . ':SubirImagenVenta')->add(\Verificadora::class . ':VerificarMedicamento');}
    
    );


$app->run();