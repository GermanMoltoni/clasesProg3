<?php
require_once './Clases/Bicicleta.php';
require './vendor/autoload.php';


class BicicletaApi extends Bicicleta{
    public static function AltaBicicletaApi($request, $response, $args){
        $datos = $request->getParsedBody();
        $bici=array();
        $bici['marca']= filter_var($datos['marca'], FILTER_SANITIZE_STRING);
        $bici['color'] = filter_var($datos['color'], FILTER_SANITIZE_STRING);
        $bici['rodado'] = filter_var($datos['rodado'], FILTER_SANITIZE_STRING);
        $bici['pathFoto']= filter_var($request->getAttributes()['pathFoto'], FILTER_SANITIZE_STRING);
        $bicicleta = new BicicletaApi($bici['color'],$bici['marca'],$bici['rodado']);
        $bicicleta->SetPathFoto($bici['pathFoto']);
        if($bicicleta->AltaBicicleta())
            return $response->withJson(true,200);  
        return $response->withJson(false,201);   
    }
    public static function ModificarBicicletaApi($request, $response, $args){
        if($request->isPost())
            $datos=$request->getParsedBody();
        if($request->isPut())
           $datos = $request->getAttributes();
        $bici=array();
        $bici['id']= filter_var($datos['idBicicleta'], FILTER_SANITIZE_STRING);
        $bici['marca']= filter_var($datos['marca'], FILTER_SANITIZE_STRING);
        $bici['color'] = filter_var($datos['color'], FILTER_SANITIZE_STRING);
        $bici['rodado'] = filter_var($datos['rodado'], FILTER_SANITIZE_STRING);
        $bicicleta = new BicicletaApi($bici['color'],$bici['marca'],$bici['rodado'],$bici['id']);
        $bicicleta->SetIdBicicleta($bici['id']);
        if($bicicleta->ModificarBicicleta())
            return $response->withJson(true,200);
        return $response->withJson(false,401);   
    }
    public static function ListarBicicletasApi($request, $response, $args){
        return $response->withJson(parent::ListarBicicletas(),200);   
    }
    public static function TraerBicicletaPorIdApi($request, $response, $args){
        $idBici = filter_var($request->getAttribute('idBicicleta'), FILTER_SANITIZE_STRING);
        return $response->withJson(parent::TraerBicicletaPorId($idBici));
    }
    public static function TraerBicicletaPorColorApi($request, $response, $args){
        $color = filter_var($request->getAttribute('color'), FILTER_SANITIZE_STRING);
        return $response->withJson(parent::TraerBicicletaPorColor($color));
    }
    public static function BorrarBicicletaPorIdApi($request, $response, $args){
        
        $idBici = filter_var($request->getAttribute('idBicicleta'), FILTER_SANITIZE_STRING);
        return $response->withJson(parent::BorrarBicicletaPorId($idBici));
    }



}

?>