<?php
require_once 'Usuario.php';
    class UsuarioApi extends Usuario{
    public static function VerificarUsuarioApi($request, $response, $args){
        $datos = $request->getParsedBody();
        $mail= filter_var($datos['mail'], FILTER_SANITIZE_STRING);
        $clave = filter_var($datos['clave'], FILTER_SANITIZE_STRING);
        $nombre = filter_var($datos['nombre'], FILTER_SANITIZE_STRING);
        $user = parent::VerificarUsuario($nombre,$mail,$clave);
        if(count($user) != 0)
            return $response->withJson($user,200);
        return $response->withJson(array('error'=>'Error al verificar'),201);

    }  
       public static function AltaUsuarioApi($request, $response, $args){
        $datos = $request->getParsedBody();
        $mail= filter_var($datos['mail'], FILTER_SANITIZE_STRING);
        $clave = filter_var($datos['clave'], FILTER_SANITIZE_STRING);
        $nombre = filter_var($datos['nombre'], FILTER_SANITIZE_STRING);
        $usuario = new UsuarioApi($nombre,$mail,$clave);
        $usuario->CrearUsuario($nombre,$mail,$clave);
        return $response->withJson(true,200);

    } 



    }

    ?>