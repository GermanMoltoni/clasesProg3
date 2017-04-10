<?php
    require_once "empleado.php";
    $path = "../datos/empleados.txt";
    $empleados = array();
    if(file_exists($path))
    {
        $archivo = fopen($path,"r");
        while(!feof($archivo))
        {
            $datos = explode("-",fgets($archivo));
            if(count($datos) != 1)
            {
                $empleado = new empleado($datos[0],$datos[1],$datos[3],$datos[2],$datos[5],$datos[4]);
                $empleado->setPathFoto($datos[6]."-".$datos[7]);
                array_push($empleados,$empleado);  
                echo $empleado->ToString()."<img src='".$empleado->getPathFoto()."' alt='200' width='299'><br>";
            }
       
        }
        fclose($archivo);
        
    }
?>