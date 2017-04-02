<?php
/**
 * 
 */
 require_once "pasajero.php";
class Vuelo
{
    private $_fecha;
    private $_empresa;
    private $_precio;
    private $_listaDePasajeros;
    private $_cantidadMaxima;

    function __construct($empresa,$precio)
    {
        $this->_precio = $precio;
        $this->_empresa = $empresa;
        $this->_listaDePasajeros = array();    
    }
    static function VueloCompleto($empresa,$precio,$cantidadMaxima)
    {
        $vuelo = new self($empresa,$precio);
        $vuelo->_cantidadMaxima = $cantidadMaxima;
        return $vuelo;
    }
    function GetVuelo()
    {
        $retorno = "Empresa: ".$this->_empresa." Fecha: ".$this->_fecha." Precio: ".$this->_precio." Cantidad Maxima de Pasajeros: ".$this->_cantidadMaxima."<BR>";
        foreach($this->_listaDePasajeros as $pasajero)
        {
            $retorno.=$pasajero->GetInfoPasajero()."<BR>";
        }
        return $retorno;
    }
    function AgregarPasajero($pasajero)
    {
        $flag=true;
        foreach($this->_listaDePasajeros as $p)
        {
            if($p->Equals($pasajero))
            {
                $flag=false;
                break;
            }
        }
        if($this->_capacidadMaxima > count($this->_listaDePasajeros))
        {
            if($flag)
                array_push($this->_listaDePasajeros,$pasajero);
            else
                echo "El pasajero ya esta cargado";
        }
        else
            echo "Capacidad Maxima Alcanzada";
        return $flag;
    }
    function MostrarVuelo()
    {
        echo $this->GetVuelo();
    }
    static function Add($vuelo1,$vuelo2)
    {

    }
    static function Remove($vuelo,$pasajero)
    {
        return $vueloFin;
    }
}

?>