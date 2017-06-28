<?php
require_once './Clases/Venta.php';
require_once './Clases/Medicamento.php';
require_once './Clases/ArchivoApi.php';
class VentaApi extends Venta{
    public static function AltaVentaApi($request, $response, $args){
        $datos = $request->getParsedBody();
        $idMed= filter_var($datos['idMedicamento'], FILTER_SANITIZE_STRING);
        $nombreCliente= filter_var($datos['nombreCliente'], FILTER_SANITIZE_STRING);
        $datosMed = Medicamento::TraerMedicamentoPorId($idMed)[0];
    $pathFoto= filter_var($request->getAttribute('pathFoto'), FILTER_SANITIZE_STRING); 
        $venta = new Venta($nombreCliente,$datosMed->laboratorio,$datosMed->nombre,$datosMed->precio,$datosMed->id,$pathFoto);
        return $response->withJson($venta->AltaVenta(),200);

    }


}

?>