<?php
require_once 'Venta.php';
require_once 'ArchivoApi.php';
class VentaApi extends Venta{
    public static function AltaVentaApi($request, $response, $args){
        $datos = $request->getParsedBody();
        $bici=array();
        $bici['idBicicleta']= filter_var($datos['idBicicleta'], FILTER_SANITIZE_STRING);
        $bici['nombreCliente'] = filter_var($datos['nombreCliente'], FILTER_SANITIZE_STRING);
        $bici['fecha'] = filter_var($datos['fecha'], FILTER_SANITIZE_STRING);
        $bici['precio'] = filter_var($datos['precio'], FILTER_SANITIZE_STRING);
        $bici['pathFoto'] = filter_var($request->getAttribute('pathFoto'), FILTER_SANITIZE_STRING);
        $venta = new Venta($bici['idBicicleta'],$bici['nombreCliente'],$bici['fecha'],$bici['precio'],$bici['pathFoto']);
        return $response->withJson($venta->AltaVenta(),200);

    }


}

?>