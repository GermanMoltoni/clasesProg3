<?php
    require_once "entidades/empleado.php";
    require_once "entidades/fabrica.php";
    require_once "archivos.php";
    $path="../datos/empleados.txt";
    if(array_key_exists("alta",$_POST) && $_POST['alta'] == "add")
        alta($_POST,$_FILES,$path);
    if(array_key_exists("baja",$_POST))
        baja(json_decode($_POST['baja'])->legajo,$path);
        


/*
*   Da el alta de un empleado
*
*/
    function alta($POST,$FILES,$path)
    {
        if(count($POST['nombre']) > 0 && count($POST['apellido']) > 0 && count($POST['dni']) > 0 && array_key_exists("sexo",$POST) && count($POST['sueldo']) > 0 && count($POST['legajo']) > 0)
        {
            $empleado = new empleado($POST['nombre'],$POST['apellido'],$_POST['dni'],$POST['sexo'],$POST['legajo'],$POST['sueldo']);
           
            if(verificarFoto($FILES,$empleado))
            {
                ArrayToFile([$empleado,],$path);
                echo "<a href='mostrar.php'>Mostrar Empleados</a>";
            }
            else
                echo "El empleado ya se encuentra cargado<br><a href='../index.html'>Inicio</a>";
        }
    }



/*
*   Realiza la baja de un Empleado y la guarda.
*
*/
    function baja($legajo,$path)
    {
        $empleados = GetArray($path);
        foreach($empleados as $empleado)
        {
            if($legajo == $empleado->getLegajo())
                break;
        }
       unset($empleados[array_search($empleado,$empleados)]);        
       ArrayToFile($empleados,$path,"w");  
    }

    function verificarFoto($FILES,$empleado)
    {
        $imageTypes = array(IMAGETYPE_GIF,IMAGETYPE_JPEG,IMAGETYPE_PNG,IMAGETYPE_BMP);
        $pathFotos = "../uploads/";
        $nuevoPath=$nombreDni ='';
        if(count($FILES) != 0)
        {
           
            $imageType = exif_imagetype($FILES['foto']['tmp_name']);
            if(in_array($imageType,$imageTypes) && $FILES['foto']['size']> 0 && $FILES['foto']['size']<= 1024000)
            {
                $nombreDni = $empleado->getDni()."-".$empleado->getApellido();
                $nuevoPath=$nombreDni.image_type_to_extension($imageType);
                if(file_exists($pathFotos.$nuevoPath))
                    return false;
                if(move_uploaded_file($FILES['foto']['tmp_name'],$pathFotos.$nuevoPath))
                {
                    $empleado->setPathFoto($pathFotos.$nuevoPath);
                    return true;
                }
            }
        }
        return false; 

    }

?>