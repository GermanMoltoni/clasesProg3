<?php
    require_once "empleado.php";
    require_once "fabrica.php";
   // var_dump($_POST);
    $path="datos/empleados.txt";
    if(array_key_exists("alta",$_POST) && $_POST['alta'] == "add")
    {
        if(count($_POST['nombre']) != 0 && count($_POST['apellido']) != 0 && count($_POST['dni']) != 0 && array_key_exists("sexo",$_POST) && count($_POST['sueldo']) != 0 && count($_POST['legajo']) != 0)
        {
            $empleado = new empleado($_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['sexo'],$_POST['legajo'],$_POST['sueldo']);
            $empleado->setPathFoto("aaaaa");//$_POST['foto']");
            $archivo = fopen($path,"a"); 
            fwrite($archivo,$empleado->ToString()."\r\n");
            fclose($archivo);
            echo "<a href='mostrar.php'>Mostrar Empleados</a>";
        }
        else
            echo "<a href='../index.html'>Inicio</a>";
    }
?>