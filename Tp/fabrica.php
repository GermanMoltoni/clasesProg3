<?php
require_once "persona.php";
/**
 * 
 */
class Fabrica
{
    private $_empleados;
    private $_razonSocial;
    function __construct($razonSocial)
    {
        $this->_razonSocial = $razonSocial;
        $this->_empleados = array();
    }
    function AgregarEmpleado($persona)
    {
        array_push($this->_empleados,$persona);
    }
    function CalcularSueldos()
    {
        $retorno = 0;
        foreach ($this->_empleados as $empleado)
        {
            $retorno+= $empleado->getSueldo();
        }
        return $retorno;
    }
    function EliminarEmpleado($persona)
    {

    }
    private function EliminarEmpleadosRepetidos()
    {

    }
    function ToString()
    {
        $retorno = "Razon Social: ".$this->_razonSocial."<BR>";
        foreach ($this->_empleados as $empleado)
        {
            $retorno.=$empleado->ToString()."<BR>";
        }
        return $retorno;
    }
}

?>