<?php
/**
 * 
 */
class Enigma
{
    
    function __construct()
    {
    }
    static function Encriptar($mensaje,$path)
    {
        $cifrado = '';
        if(strlen($mensaje) != 0)
        {
            foreach(str_split($mensaje) as $caracter)
                $cifrado.=ord($caracter) + 200;
            $archivo = fopen($path,"w");
            if($archivo != false)
            {
                fwrite($archivo,$cifrado);
                fclose($archivo);
                return true;
            }

        }
        return false;
    }
    static function DesEncriptar($path)
    {
        $desencriptado='';
        if(file_exists($path))
        {
            $archivo = fopen($path,"r");
            while(!feof($archivo))
            {
                $mensaje = fgets($archivo);
                $string= str_split($mensaje);
                $j=0;
                for($i=0;$i<count($string);$i+=3)
                    $desencriptado .= chr(substr($mensaje,$i,3)-200);
            }
            fclose($archivo);
            return $desencriptado;
        }
        return "No se pudo DesEncriptar";
    }
}


?>