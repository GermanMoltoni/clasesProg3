<?php
require_once "auto.php";
class Garage
{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;
    function __construct($razonSocial)
    {
        $this->_autos = array();
        $this->_razonSocial = $razonSocial;
    }
    function __construct($razonSocial,$precioPorHora)
    {
        $this->__construct($razonSocial);
        $this->_precioPorHora = $precioPorHora;
    }
    function MostrarGarage()
    {
        $retorno = "Razon Social: ".$this->_razonSocial." Precio Por Hora: ".$this->_precioPorHora."<BR>";
        foreach($this->_autos as $auto)
            $retorno.= auto::MostrarAuto($auto);
        return $retorno;
    }
    function Equals($auto1)
    {
        foreach($this->_autos as $auto)
        {
            if($auto->Equals($auto1))
            {
                return true;
            }
        }
    }
    function Add($auto)
    {
        if(!$this->Equals($auto))
            array_push($this->_autos,$auto);
        else
            echo "El auto ya esta en el garage";
    }

    function Remove($auto)
    {
        if(!$this->Equals($auto))
        {
            unset($this->_autos[array_search($auto,$this->_autos)]);
        }
    }
}
?>