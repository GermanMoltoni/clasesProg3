<?php
/**
 * 
 */
Abstract class Persona
{
    private $_apellido;
    private $_nombre;
    private $_sexo;
    private $_dni;
    function __construct($nombre,$apellido,$dni,$sexo)
    {
        $this->_sexo = $sexo;
        $this->_nombre = $nombre;
        $this->_dni = $dni;
        $this->_apellido = $apellido;
    }
    function getApellido()
    {
        return $this->_apellido;
    }
    function getDni()
    {
        return $this->_dni;
    }
    function getNombre()
    {
        return $this->_nombre;
    }
    function getSexo()
    {
        return $this->_sexo;
    }
    function ToString()
    {
        return $this->getNombre()."-".$this->getApellido()."-".$this->getSexo()."-".$this->getDni();
    }
    Abstract function Hablar($idioma);
}

?>