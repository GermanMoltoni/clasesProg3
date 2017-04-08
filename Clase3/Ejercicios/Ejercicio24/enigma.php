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
        if(strlen($mensaje) != 0)
        {
            foreach(str_split($mensaje) as $caracter)
            {
                echo ord($caracter) + 200;
            }
        }
    }
}


?>