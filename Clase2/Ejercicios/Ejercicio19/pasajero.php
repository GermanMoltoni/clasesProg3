<?php

/**
 * 
 */
class Pasajero
{
    private $_apellido;
    private $_nombre;
    private $_dni;
    private $_esPlus;
    function __construct($apellido,$nombre,$dni,$esPlus)
    {
       $this->_nombre=$nombre;
       $this->_apellido=$apellido;       
       $this->_dni=dni;
       $this->_esPlus=$esPlus;
    }
    function Equals($pasajero)
    {
        if($this->_dni == $pasajero->_dni)
            return true;
        return false;
    }
    function GetInfoPasajero()
    {
        return "Nombre y Apellido: ".$this->_nombre." ".$this->_apellido." Dni: ".$this->_dni." Es Plus".$this->_esPlus;
    }
    static function MostrarPasajero($pasajero)
    {
        echo $pasajero->GetInfoPasajero();
    }
}



?>
