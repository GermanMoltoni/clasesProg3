<?php
require_once './Clases/Archivo.php';
require_once './Clases/Bicicleta.php';
class Verificadora{
static function VerificarArchivo($request, $response, $next){
    if($request->isPost()){
        $retorno = Archivo::VerificarArchivo($request);
        if(is_array($retorno))
            return $response->withJson($retorno,401);  
    }
    return $next($request,$response);  
    }
static function VerificarBici($request, $response, $next){
    if($request->isPost())
        $id= filter_var($request->getParsedBody()['idBicicleta'], FILTER_SANITIZE_STRING);
    if($request->isPut())
    {
        $route = $request->getAttribute('route');
        $id= filter_var($route->getArgument('idBicicleta'), FILTER_SANITIZE_STRING);
    }
    $bici=Bicicleta::TraerBicicletaPorId($id);

    if(count($bici) != 0)
        return $next($request,$response);
    return $response->withJson(array('error'=>'No se encuentra la bicicleta deseada'),400);

}

//



}




?>