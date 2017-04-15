<?php
    require_once "empleado.php";
    require_once "administracion.php";
    $path = "../datos/empleados.txt";
    $empleados = array();
    $tabla ='';
    if(file_exists($path))
    {
        $archivo = fopen($path,"r");
        $tabla .= "<table class='table-bordered table-striped'>";
        $tabla.="<tr><th>Nombre</th><th>Apellido</th><th>Sexo</th><th>Dni</th><th>Legajo</th><th>Foto</th></tr>";
        while(!feof($archivo))
        {
            $datos = explode("-",fgets($archivo),7);
            if(count($datos) != 1)
            {
                $empleado = new empleado($datos[0],$datos[1],$datos[3],$datos[2],$datos[5],$datos[4]);
                $empleado->setPathFoto($datos[6]);
                array_push($empleados,$empleado);
                $tabla.="<tr><td>".$empleado->getNombre()."</td><td>".$empleado->getApellido()."</td><td>".$empleado->getSexo()."</td><td>".$empleado->getDni()."</td><td>".$empleado->getLegajo()."</td><td>"."<img src='".$empleado->getPathFoto()."' alt='' width='50'></td></tr>";
            }
        }
        $tabla.="</table>";
        echo $tabla;
        fclose($archivo);
        
    }
?>