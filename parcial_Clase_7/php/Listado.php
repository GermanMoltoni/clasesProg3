<?php
    require_once "entidades/usuario.php";
    $path = "../datos/usuario.txt";
    $users = array();
    $tabla ='';
    if(file_exists($path))
    {
        $archivo = fopen($path,"r");
        $tabla .= "<table class='table bg-info table-striped table-condensed'>";
        $tabla.="<thead  class='bg-primary'><tr><th class='col-md-3 '>Nombre</th><th class='col-md-4'>Correo</th><th class='col-md-2'>Edad</th><th class='col-md-2' >Clave</th><th class='col-md-2'>Baja</th></tr></thead>";
        while(!feof($archivo))
        {
            $datos = explode("\n",fgets($archivo));
            $datos = explode("-",$datos[0],4);
            if(count($datos) != 1)
            {
                $user = new Usuario($datos[0],$datos[1],$datos[2],$datos[3]);
                array_push($users,$user);
                $correo = json_encode($user->getCorreo());
                $tabla.="<tr><td>".$user->getNombre()."</td><td>".$user->getCorreo()."</td><td>".$user->getEdad()."</td><td>".$user->getClave()."</td><td><button name='baja' onClick='baja(".$correo.")'class='btn btn-danger navbar-btn'>Baja</button></td></tr>";
            }
        }
        $tabla.="</table>";
        echo $tabla;
        fclose($archivo);
        
    }
?>