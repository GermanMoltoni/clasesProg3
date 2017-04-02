<?php
/**
 * 
 */
 include_once "operario.php";
class Fabrica
{
    private $_cantMaxOperarios;
    private $_operarios;
    private $_razonSocial;
    function __construct($rs)
    {
        $this->_operarios= array();
        $this->_cantMaxOperarios = 5;
        $this->_razonSocial = $rs;
    }
    function Add($op)
    {
        if(!fabrica::Equals($this,$op) && count($this->_operarios) < $this->_cantMaxOperarios)
            array_push($this->_operarios,$op);
        else
            echo "El empleado se encuentra registrado";
    }
    static function Equals($fb,$op)
    {
        $retorno=false;
        foreach($fb->_operarios as $operario)
        {
            if($operario->Equals($op))
            {
                $retorno=true;
                break;
            }
        }
        return $retorno;
    }
    function Mostrar()
    {
        echo "Razon Social: ".$this->_razonSocial."<BR>";
        echo $this->MostrarOperarios();
    }
    static function MostrarCosto($fb)
    {
        echo "Salarios a pagar: ".$fb->RetornarCostos();
    }
    private function MostrarOperarios()
    {
        foreach($this->_operarios as $operario)
            echo $operario->MostrarOperario($operario)."<BR>";
    }
    function Remove($op)
    {
        $flag=fabrica::Equals($this,$op);
        if($flag)
            unset($this->_operarios[array_search($op,$this->_operarios)]);
        else
            echo "Operario no encontrado";
        return $flag;
    }
    private function RetornarCostos()
    {
        $salarios=0;
        foreach($this->_operarios as $op)
            $salarios+=$op->GetSalario();
        return $salarios;
    }
}




?>