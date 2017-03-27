<?php
    /**
     * 
     */
    class Calculadora
    {
       /* function __construct(argument)
        {
            # code...
        }*/
        static function sumar($numero1,$numero2)//Metodo estatico
        {
            return $numero1 + $numero2;
        }
        /*public static function restar($numero1,$numero2)
        {
            return $numero1 - $numero2;
        }*/
        public static function multiplicar($numero1,$numero2)
        {
            return $numero1*$numero2;
        }

    }
    
?>