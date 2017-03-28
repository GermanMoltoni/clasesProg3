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
        $this->EliminarEmpleadosRepetidos();
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
        unset($this->_empleados[array_search($persona,$this->_empleados)]);
    }
    private function EliminarEmpleadosRepetidos()
    {
        $aux = array_unique($this->_empleados,SORT_REGULAR);
        $this->_empleados = $aux;
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