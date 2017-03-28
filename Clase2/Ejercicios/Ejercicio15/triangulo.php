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
        
        $auxB=$this->_base;
        for($i=$this->_altura;$i>0;$i--)
        {
            $aux=$auxB - $i;
            for($j=0;$j <$auxB;$j++)
            {
                if( $j != $aux)
                {
                    echo "1";
                }
                else
                    echo "*";
            }
            $auxB--;
            echo "<BR>";
        }
    }
    /* 
        *
       ***
      *****
    
    
    
    */
    public function ToString()
    {
        return parent::ToString()." Base:".$this->_base." Altura:".$this->_altura;
    }

}

?>