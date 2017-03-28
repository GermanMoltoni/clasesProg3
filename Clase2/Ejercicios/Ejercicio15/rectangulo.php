<?php
require_once "figuras.php";
/**
 * 
 */
class Rectangulo extends FiguraGeometrica
{
    private $_ladoUno;
    private $_ladoDos;
    function __construct($l1,$l2)
    {
        parent::__construct();
        $this->_ladoDos=$l2;
        $this->_ladoUno=$l1;
        $this->CalcularDatos();
    }
    protected function CalcularDatos()
    {
        $this->_superficie = $this->_ladoUno*$this->_ladoDos;
        $this->_perimetro = $this->_ladoUno*2 + $this->_ladoDos*2;
    }
    public function Dibujar()
    {
        for($i=0;$i<$this->_ladoDos;$i++)
        {
            for($j=0;$j<$this->_ladoUno;$j++)
            {
               echo "*"; 
            }
            echo "<BR>";
        }
    }
    public function ToString()
    {
        return parent::ToString()." Lado Uno:".$this->_ladoUno." Lado Dos:".$this->_ladoDos;
    }


}

?>