<?php
require_once './Clases/Archivo.php';
require_once './Clases/Medicamento.php';
class Verificadora{
static function VerificarArchivo($request, $response, $next){
    if($request->isPost()){
        $retorno = Archivo::VerificarArchivo($request);
        if(is_array($retorno))
            return $response->withJson($retorno,401);  
    }
    return $next($request,$response);  
    }
static function VerificarMedicamento($request, $response, $next){
    if($request->isPost())
        $id= filter_var($request->getParsedBody()['idMedicamento'], FILTER_SANITIZE_STRING);
    else
        $id= filter_var($route->getArgument('id'), FILTER_SANITIZE_STRING);
    $med=Medicamento::TraerMedicamentoPorId($id);
    if(count($med) != 0)
        return $next($request,$response);
    return $response->withJson(array('error'=>'No se encuentra  Medicamento deseado'),201);

}

static function VerificarMedicamentoDup($request, $response, $next){
        $id= filter_var($request->getParsedBody()['id'], FILTER_SANITIZE_STRING);
    $med=Medicamento::TraerMedicamentoPorId($id);
    if(count($med) == 0)
        return $next($request,$response);    
    $med=Medicamento::TraerMedicamentoPorId($id)[0];
    if($med->id == $id) 
        return $response->withJson(array('error'=>' Medicamento Existente'),201);
    
}

//



}




?>