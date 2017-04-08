<?php
/**
 * 
 */
class Enigma
{
    
    function __construct()
    {
    }
    static function Encriptar($mensaje)
    {
        $cifrado = '';
        if(strlen($mensaje) != 0)
        {
            foreach(str_split($mensaje) as $caracter)
            {
                $cifrado.=ord($caracter) + 200;
            }
            // $archivo = fopen($path,"w");
            // fwrite($archivo,$cifrado);
            // fclose($archivo);
        }
    }
    static function DesEncriptar($path)
}


?>