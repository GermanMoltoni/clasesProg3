<?php
/*
*   Guarda un array en un archivo.
*
*/
    function ArrayToFile($elements,$path,$mode="a")
    {
        $archivo = fopen($path,$mode);
        foreach($elements as $element)
            fwrite($archivo,$element->ToString());//Modificar segun uso
        fclose($archivo);
    }
/*
*   Carga un archivo a un array  y lo retorna
*
*/
    function GetArray($path)
    {
        $array = array();
        if(file_exists($path))
        {
            $archivo = fopen($path,"r");
            while(!feof($archivo))
            {
                $datos = explode("-",fgets($archivo),7);//Modificar segun datos a cargar
                if(count($datos) != 1)
                {
                    $empleado = new empleado($datos[0],$datos[1],$datos[3],$datos[2],$datos[5],$datos[4]);//Modificar segun datos a cargar
                    $empleado->setPathFoto($datos[6]);//Modificar segun datos a cargar
                    array_push($array,$empleado);
                }
            }
            fclose($archivo);
            return $array;
        }
        return null;
    }
    ?>