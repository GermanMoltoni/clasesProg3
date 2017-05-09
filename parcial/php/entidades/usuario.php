<?php 
class Usuario
{
    protected $_nombre;
    protected $_correo;
    protected $_edad;
    protected $_clave;
    function __construct($nombre,$correo,$edad,$clave)
    {
        $this->_nombre = $nombre;
        $this->_correo = $correo;
        $this->_edad = $edad;
        $this->_clave = $clave;
    }
    function getNombre()
    {
        return $this->_nombre;
    }
    function getClave()
    {
        return $this->_clave;
    }
    function getCorreo()
    {
        return $this->_correo;
    }
    function getEdad()
    {
        return $this->_edad;
    }
    function Equals($email)
    {
        if($this->getCorreo() == $email)
            return true;
        return false;
    }
    function ToString()
    {
        return $this->getNombre()."-".$this->getCorreo()."-".$this->getEdad()."-".$this->getClave();
    }
}
?>