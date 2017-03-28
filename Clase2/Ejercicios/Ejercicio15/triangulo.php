<?php
include_once "figuras.php";
/**
 * 
 */
class Triangulo extends FiguraGeometrica
{
    
    private $_altura;
    private $_base;
    function __construct($b,$h)
    {
       parent::__construct();
       $this->_altura=$h;
       $this->_base=$b;
       $this->CalcularDatos();
    }
    protected function CalcularDatos()
    {
        $this->_superficie = $this->_altura*$this->_base/2;
        $this->_perimetro =sqrt(pow(($this->_base/2),2) + pow($this->_altura,2))*2 + $this->_base;
    }
    public function Dibujar()
    {

    }
    public function ToString()
    {
        return parent::ToString()." Base:".$this->_base." Altura:".$this->_altura;
    }

}

?>