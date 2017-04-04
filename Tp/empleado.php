<?php
require_once "persona.php";
/**
 * 
 */
class Empleado extends Persona
{
    protected $_legajo;
    protected $_sueldo;
    function __construct($nombre,$apellido,$dni,$sexo,$legajo,$sueldo)
    {
        parent::__construct($nombre,$apellido,$dni,$sexo);
        $this->_legajo = $legajo;
        $this->_sueldo = $sueldo;
    }
    function getLegajo()
    {
        return $this->_legajo;
    }
    function getSueldo()
    {
        return $this->_sueldo;
    }
    function Hablar($idioma)
    {
        return "El empleado Habla en ".$idioma;
    }
    function ToString()
    {
        return parent::ToString()."-".$this->getSueldo()."-".$this->getLegajo();
    }
    function guardarEmpleado()
    {
        $path="empleados.txt";
        $archivo = fopen($path,"a"); 
        fwrite($archivo,$this->ToString()."\r\n");
        fclose($archivo);
    }

}

?>