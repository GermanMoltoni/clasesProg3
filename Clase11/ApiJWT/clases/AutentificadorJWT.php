<?php
require_once './vendor/autoload.php';
use Firebase\JWT\JWT;
/**
 * 
 */

class AutentificadorJWT 
{
    
    private static $claveSecreta = "1-2/3*4@5";
    static function CrearToken($datos){
        $hora=time();
        $payload = array(
            'iat'=> $hora,
            'exp'=> $hora+60,
            'data'=> $datos,
            'app'=>"Api Rest JWT"
            //'aud'=> nombre de la pagina desde donde accedi
        );
        return JWT::encode($payload,self::$claveSecreta);
    }
    static function VerificarToken($token){
        $decodificado = JWT::decode($token,self::$claveSecreta);
        return $decodificado;
    }
}



?>