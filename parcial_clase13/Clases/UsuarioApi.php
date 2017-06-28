<?php
require_once './Clases/Usuario.php';
    class UsuarioApi extends Usuario{
    public static function VerificarUsuarioApi($request, $response, $args){
        $datos = $request->getParsedBody();
        $mail= filter_var($datos['mail'], FILTER_SANITIZE_STRING);
        $clave = filter_var($datos['clave'], FILTER_SANITIZE_STRING);
        $user = parent::VerificarUsuario($mail,$clave);
        if(count($user) != 0)
            return $response->withJson($user,200);
        return $response->withJson(array('error'=>'Error al verificar'),201);

    }  
       public static function CrearUsuarioApi($request, $response, $args){
        $datos = $request->getParsedBody();
        $mail= filter_var($datos['mail'], FILTER_SANITIZE_STRING);
        $clave = filter_var($datos['clave'], FILTER_SANITIZE_STRING);
        $nombre = filter_var($datos['nombre'], FILTER_SANITIZE_STRING);
        $usuario = new UsuarioApi($mail,$clave,$nombre);
        $usuario->CrearUsuario();
        return $response->withJson(true,200);

    } 



    }

    ?>