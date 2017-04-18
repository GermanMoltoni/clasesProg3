<?php
    require_once "entidades/empleado.php";
    require_once "entidades/fabrica.php";
    require_once "archivos.php";
    $path="../datos/empleados.txt";
    if(array_key_exists("alta",$_POST) && $_POST['alta'] == "add")
        alta($_POST,$_FILES,$path);
    if(array_key_exists("baja",$_POST) && $_POST['baja'] == "baja")
        baja($_POST,$path);//modificacion($_POST);
    else
        echo "<a href='../index.html'>Inicio</a>";



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
    function baja($POST,$path)
    {
        $empleados = GetArray($path);
        foreach($empleados as $empleado)
        {
            if($POST['dni'] == $empleado->getDni())
                break;
        }
       unset($empleados[array_search($empleado,$empleados)]);        
       ArrayToFile($empleados,$path,"w");  
    }


    function modificar($POST,$path)
    {
        baja($POST,$path);
        alta($POST,$path);
    }

    function mostrarElemento($POST,$path)
    {
        $flag=false;
        if(file_exists($path))
        {
            $archivo = fopen($path,"r");
            while(!feof($archivo))
            {
                $datos = explode("-",fgets($archivo),7);
                if(count($datos) != 1)
                {
                    $empleado = new empleado($datos[0],$datos[1],$datos[3],$datos[2],$datos[5],$datos[4]);
                    $empleado->setPathFoto($datos[6]);
                    if($empleado->getDni() == $_POST['dni'])
                    {
                        $flag = true;
                        break;
                    }
                }
            }
            fclose($archivo);
        }
        if($flag)
            return $empleado;
        return null;
    }


    function verificarFoto($FILES,$empleado)
    {
        $imageTypes = array(IMAGETYPE_GIF,IMAGETYPE_JPEG,IMAGETYPE_PNG,IMAGETYPE_BMP);
        $pathFotos = "../uploads/";
        $nuevoPath=$nombreDni ='';
        if(count($FILES) != 0)
        {
           // $archivos = scandir($pathFotos);// retorna una lista de archivos en array
            $imageType = exif_imagetype($FILES['foto']['tmp_name']);//Retorna la extension de la imagen
            if(in_array($imageType,$imageTypes) && $FILES['foto']['size']> 0 && $FILES['foto']['size']<= 1024000)
            {
                $nombreDni = $empleado->getDni()."-".$empleado->getApellido();
                $nuevoPath=$nombreDni.image_type_to_extension($imageType);
                if(file_exists($pathFotos.$nuevoPath))//!in_array($nuevoPath,$archivos)
                    return false;//copy($pathFotos.$nuevoPath,"../backup/".$nombreDni.date("_Y_m_d_h_i_s").image_type_to_extension($imageType));
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