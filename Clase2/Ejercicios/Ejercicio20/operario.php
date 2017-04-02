<?php
/**
 * 
 */
class Operario
{
    private $_apellido;
    private $_legajo;
    private $_nombre;
    private $_salario;
    function __construct($legajo,$apellido,$nombre)
    {
         $this->_apellido=$apellido;
        $this->_legajo=$legajo;
        $this->_nombre=$nombre;
        $this->_salario=0;
    }
    function Equals($op1)
    {
        if($this->_legajo == $op1->_legajo && $this->GetNombreApellido() == $op1->GetNombreApellido())
            return true;
        return false;
    }
    function GetNombreApellido()
    {
        return $this->_nombre.",".$this->_apellido;
    }
    function GetSalario()
    {
        return $this->_salario;
    }
    function Mostrar()
    {
        return $this->GetNombreApellido()." Salario: ".$this->GetSalario()." Legajo:".$this->_legajo;
    }
    static function MostrarOperario($op)
    {
        echo $op->Mostrar();
    }
    function SetAumentarSalario($aumento)
    {
        $this->_salario+=$aumento;
    }
}


?>