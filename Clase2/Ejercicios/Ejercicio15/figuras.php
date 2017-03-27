<?php
/**
 * 
 */
abstract class FiguraGeometrica 
{
    protected $_color;
    protected $_perimetro;
    protected $_superficie;
    function __construct()
    {
        $this->_perimetro=0;
        $this->_superficie=0;
        $this->_color="Negro";
    }
    protected abstract function CalcularDatos();
    public abstract function Dibujar();
    function GetColor()
    {
        return $this->_color;
    }
    function SetColor($color)
    {
        $this->_color=$color;
    }
    function ToString()
    {
        return "Color: ".$this->_color."Perímetro: ".$this->_perimetro."Superficie: ".$this->_superficie;
    }
    
}

?>