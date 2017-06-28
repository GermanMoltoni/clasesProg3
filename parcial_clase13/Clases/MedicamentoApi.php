<?php
require_once './Clases/Medicamento.php';
require './vendor/autoload.php';


class MedicamentoApi extends Medicamento{
    public static function AltaMedicamentoApi($request, $response, $args){
        $datos = $request->getParsedBody();
        $med=array();
        $med['laboratorio']= filter_var($datos['laboratorio'], FILTER_SANITIZE_STRING);
        $med['nombre'] = filter_var($datos['nombre'], FILTER_SANITIZE_STRING);
       $med['id'] = filter_var($datos['id'], FILTER_SANITIZE_STRING);
        $med['precio']= filter_var($datos['precio'], FILTER_SANITIZE_STRING);
        $medicamento = new MedicamentoApi($med['laboratorio'],$med['nombre'],$med['precio'],$med['id']);
       if($medicamento->AltaMedicamento())
            return $response->withJson(true,200);  
        return $response->withJson(false,201);   
    }



  


    public static function ListarMedicamentosApi($request, $response, $args){
    return $response->withJson(parent::ListarMedicamentos());   
    }



    public static function TraerMedicamentoPorIdApi($request, $response, $args){
        $idMedicamento = filter_var($request->getAttribute('idMedicamento'), FILTER_SANITIZE_STRING);
        $medicamento = parent::TraerMedicamentoPorId($idMedicamento);
        if(count($medicamento) != 0)
            return $response->withJson($medicamento);
        return $response->withJson(array('error'=>'No se encuentra  Medicamento deseado'));
    }



    public static function MedicamentoOrdLaboIdApi($request, $response, $args){
        return $response->withJson(parent::MedicamentosPorLaboratorio());
    }//ver



    public static function BorrarMedicamentoPorIdApi($request, $response, $args){
        
        $idMed = filter_var($request->getAttribute('idMedicamento'), FILTER_SANITIZE_STRING);
         $medicamento = parent::TraerMedicamentoPorId($idMed);
        if(count($medicamento) != 0)
            return $response->withJson(parent::BorrarMedicamentoPorId($idMed));
        return $response->withJson(array('error'=>'No se encuentra  Medicamento deseado'));
    }



}

?>