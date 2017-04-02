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

    function __construct($empresa,$precio,$fecha=" ")
    {
        $this->_precio = $precio;
        $this->_empresa = $empresa;
        $this->_listaDePasajeros = array(); 
        $this->_cantidadMaxima = 160; 
        $this->_fecha=$fecha;
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
        if($this->_cantidadMaxima > count($this->_listaDePasajeros))
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
        $ganancia=0;
        foreach($vuelo1->_listaDePasajeros as $pasajero)
        {
            if($pasajero->PasajeroPlus())
                $ganancia+=$vuelo1->_precio*0.8;
            else
                $ganancia+=$vuelo1->_precio;
        }
        foreach($vuelo2->_listaDePasajeros as $pasajero)
        {
            if($pasajero->PasajeroPlus())
                $ganancia+=$vuelo2->_precio*0.8;
            else
                $ganancia+=$vuelo2->_precio;
        }
        return $ganancia;
    }
    static function Remove($vuelo,$pasajero)
    {
        $flag=false;
        foreach($vuelo->_listaDePasajeros as $p)
        {
            if($p->Equals($pasajero))
            {
                $flag=true;
                break;
            }
        }
        if($flag)
            unset($vuelo->_listaDePasajeros[array_search($pasajero,$vuelo->_listaDePasajeros)]);
        else
            echo "Pasajero no encontrado";
        return $vuelo;
    }
}

?>