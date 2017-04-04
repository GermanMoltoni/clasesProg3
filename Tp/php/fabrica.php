<?php
require_once "persona.php";
/**
 * 
 */
class Fabrica
{
    private $_empleados;
    private $_razonSocial;
    function __construct($razonSocial)
    {
        $this->_razonSocial = $razonSocial;
        $this->_empleados = $this->LeerFabrica();
    }
    function AgregarEmpleado($persona)
    {
        array_push($this->_empleados,$persona);
        $this->EliminarEmpleadosRepetidos();
    }
    function CalcularSueldos()
    {
        $retorno = 0;
        foreach ($this->_empleados as $empleado)
        {
            $retorno+= $empleado->getSueldo();
        }
        return $retorno;
    }
    function EliminarEmpleado($persona)
    {
        unset($this->_empleados[array_search($persona,$this->_empleados)]);
    }
    private function EliminarEmpleadosRepetidos()
    {
        $aux = array_unique($this->_empleados,SORT_REGULAR);
        $this->_empleados = $aux;
    }
    function ToString()
    {
        $retorno = "Razon Social: ".$this->_razonSocial."<BR>";
        foreach ($this->_empleados as $empleado)
        {
            $retorno.=$empleado->ToString()."<BR>";
        }
        return $retorno;
    }
    /*
        Guardar array en Archivo :
                                    1-Transformar obj a string con separador
                                    2-Guardar un obj por renglon
        Leer Array en Archivo:
                                1-Leer renglon por renglon
                                2-Utilizar explode
                                3-Crear Obj
                                4-Agregar el objeto al array
    */
    function GuardarFabrica()
    {
        $path="empleados.txt";
        $archivo = fopen($path,"w"); 
        foreach($this->_empleados as $empleado)
            fwrite($archivo,$empleado->ToString()."\r\n");
        fclose($archivo);
    }
    function LeerFabrica()
    {
        $path="empleados.txt";
        $empleados = array();
        if(file_exists($path))
        {
            $archivo = fopen($path,"r");
            while(!feof($archivo))
            {
                $empleado = explode("-",fgets($archivo));
                if(count($empleado) != 1)
                    array_push($empleados,new empleado($empleado[0],$empleado[1],$empleado[3],$empleado[2],$empleado[5],$empleado[4]));
            }
            fclose($archivo);
        }
        
        return $empleados;
    }
}

?>