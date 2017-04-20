<?php
    require_once "entidades/empleado.php";
    require_once "administracion.php";
    $path = "../datos/empleados.txt";
    $empleados = array();
    $tabla ='';
    if(file_exists($path))
    {
        $archivo = fopen($path,"r");
        $tabla .= "<table class='table bg-info table-striped table-condensed'>";
        $tabla.="<thead  class='bg-primary'><tr><th class='col-md-2 '>Nombre</th><th class='col-md-2'>Apellido</th><th class='col-md-2'>Sexo</th><th class='col-md-2' >Dni</th><th class='col-md-2'>Legajo</th><th class='col-md-1'>Foto</th><th class='col-md-1'>Baja</th></tr></thead>";
        while(!feof($archivo))
        {
            $datos = explode("-",fgets($archivo),7);
            if(count($datos) != 1)
            {
                $empleado = new empleado($datos[0],$datos[1],$datos[3],$datos[2],$datos[5],$datos[4]);
                $empleado->setPathFoto($datos[6]);
                array_push($empleados,$empleado);
                $tabla.="<tr><td>".$empleado->getNombre()."</td><td>".$empleado->getApellido()."</td><td>".$empleado->getSexo()."</td><td>".$empleado->getDni()."</td><td>".$empleado->getLegajo()."</td><td>"."<img src='".$empleado->getPathFoto()."' class=''alt='' width='50'></td><td><button name='baja' onClick='baja(".$empleado->getLegajo().")'class='btn btn-danger navbar-btn'>Baja</button></td></tr>";
            }
        }
        $tabla.="</table>";
        echo $tabla;
        fclose($archivo);
        
    }
?>