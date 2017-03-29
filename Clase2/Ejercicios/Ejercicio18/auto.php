<?php


/**
 * 
 */
class Auto
{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;
     function __construct($marca,$color)
    {
         $this->_color = $color;
        $this->_marca = $marca;
    }
    function __construct1($marca,$color,$precio)
    {
        $this->_precio = $precio;
        $this->__construct($marca,$color);   
    }
    
    function __construct2($marca,$color,$precio,$fecha)
    {
        $this->_fecha = $fecha;
        $this->__construct1($marca,$color,$precio);
    }
    function AgregarImpuesto($impuesto)
    {
        $this->_precio+=$impuesto;
    }
    static function MostrarAuto($auto)
    {
        return "Marca: ".$auto->_marca." Color:".$auto->_color." Precio:".$auto->_precio." Fecha:".$auto->_fecha."<BR>";
    }
     function Equals($auto)
    {
        if($this->_marca == $auto->_marca)
            return true;
        return false;
    }
    static function Add($auto1,$auto2)
    {
        $retorno = 0;
        if($auto1->Equals($auto2) && $auto1->_color == $auto2->_color)
            $retorno = $auto1->_precio + $auto2->_precio;
        else
            echo "Los Autos son diferentes";
        return $retorno;
    }
}

?>