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
                $cifrado.=ord($caracter) + 200;
            // $archivo = fopen($path,"w");
            // fwrite($archivo,$cifrado);
            // fclose($archivo);
        }
    }
    static function DesEncriptar($path)
    {
        // if(file_exists($path))
        // {
            // $archivo = fopen($path,"r");
            // while(!feof($archivo))
            // {
                // $mensaje = fgets($archivo);
                
                // fclose($archivo);
            // }
            

        // }
    }
}


?>