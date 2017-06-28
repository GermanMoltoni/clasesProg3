<?php

require_once 'BicicletaApi.php';
require_once 'Archivo.php';
class ArchivoApi extends Archivo{

    function CopiarImagenVenta($request, $response, $next){
        $datos = $request->getParsedBody();
        $bici=array();
        $bici['idBicicleta']= filter_var($datos['idBicicleta'], FILTER_SANITIZE_STRING);
        $bici['nombreCliente'] = filter_var($datos['nombreCliente'], FILTER_SANITIZE_STRING);
        $pathBici = './Fotos/'.BicicletaApi::TraerBicicletaPorId($bici['idBicicleta'])[0]->pathFoto;
        $nombreFoto = $bici['idBicicleta'].'-'.$bici['nombreCliente'].'.'.pathinfo($pathBici,PATHINFO_EXTENSION);
        $pathCliente= './FotosVentas/'.$nombreFoto;
        Archivo::CopiarArchivo($pathBici,$pathCliente);
        return $next($request->withAttribute('pathFoto',$nombreFoto),$response);
    }

    function ModificarImagenBici($request, $response, $next){
        if($request->isPost() && $request->getParsedBody()['idBicicleta'])
            $idBici= filter_var($request->getParsedBody()['idBicicleta'], FILTER_SANITIZE_STRING);
        else
            return $next($request,$response);
        $archivo = new ArchivoApi($idBici,'./Fotos','./Fotos/BackUp');
        $archivo->CargarArchivo($request);
        return $next($request,$response);
    }
    function SubirImagenBici($request, $response, $next){
        $idBici = BicicletaApi::UltimoIdIngresado()+1;
        $archivo = new ArchivoApi($idBici,'./Fotos','./Fotos/BackUp');
        //return $response->withJson($idBici);
        return $next($request->withAttribute('pathFoto',$archivo->CargarArchivo($request)),$response);
    }
    

}
?>