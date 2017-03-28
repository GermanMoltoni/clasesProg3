<?php
/**
 * 
 */
 require_once "punto.php";
class Rectangulo
{
    private $_vertice1;
    private $_vertice2;
    private $_vertice3;
    private $_vertice4;
    public $area;
    public $ladoDos;
    public $ladoUno;
    public $perimetro;
    function __construct($v1,$v3)
    {
        $this->_vertice1 = $v1;
        $this->_vertice3 = $v3;
        $this->_vertice2 = new Punto($v1->GetX(),$v3->GetY());
        $this->_vertice4 = new Punto($v3->GetX(),$v1->GetY());
        $this->ladoUno = $v3->GetX() - $v1->GetX();
        $this->ladoDos = $v3->GetY() - $v1->GetY();
        $this->perimetro = $this->ladoUno*2 + $this->ladoDos*2;
        $this->area = $this->ladoUno * $this->ladoDos;
    }
    public function Dibujar()
    {
        for($i=0;$i<$this->ladoDos;$i++)
        {
            for($j=0;$j<$this->ladoUno;$j++)
            {
               echo "*"; 
            }
            echo "<BR>";
        }
    }

}

?>