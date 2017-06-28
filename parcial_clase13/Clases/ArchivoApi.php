<?php

require_once 'MedicamentoApi.php';
require_once 'Archivo.php';
class ArchivoApi extends Archivo{

    function SubirImagenVenta($request, $response, $next){
        $datos = $request->getParsedBody();
        $idMed= filter_var($datos['idMedicamento'], FILTER_SANITIZE_STRING);
        $nombreCliente= filter_var($datos['nombreCliente'], FILTER_SANITIZE_STRING);
        $medicamento = MedicamentoApi::TraerMedicamentoPorId($idMed)[0];
        $archivo = new ArchivoApi($medicamento->id+'-'+$medicamento->laboratorio,'./Fotos','./Fotos/BackUp');
        return $next($request->withAttribute('pathFoto',$archivo->CargarArchivo($request)),$response);
    }



}
?>