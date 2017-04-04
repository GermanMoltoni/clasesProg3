<?php
require_once "persona.php";
/**
 * 
 */
class Empleado extends Persona
{
    protected $_legajo;
    protected $_sueldo;
    protected $_pathFoto;
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
    function getPathFoto()
    {
        return $this->_pathFoto;
    }
    function setPathFoto($path)
    {
        $this->_pathFoto = $path;
    }
    function Hablar($idioma)
    {
        return "El empleado Habla en ".$idioma;
    }
    function ToString()
    {
        return parent::ToString()."-".$this->getSueldo()."-".$this->getLegajo()."-".$this->getPathFoto();
    }

}

?>