<?php
    require_once "empleado.php";
    require_once "fabrica.php";
    $path="../datos/empleados.txt";
    if(array_key_exists("alta",$_POST) && $_POST['alta'] == "add")
    {
        baja($_POST,$path);
        //alta($_POST,$_FILES,$path);
    }
/*    if(array_key_exists("mod",$_POST) && $_POST['mod'] == "modif")
    {
        modificacion($_POST);
    }*/
    else
        echo "<a href='../index.html'>Inicio</a>";





    function alta($POST,$FILES,$path)
    {
        if(count($POST['nombre']) > 0 && count($POST['apellido']) > 0 && count($POST['dni']) > 0 && array_key_exists("sexo",$POST) && count($POST['sueldo']) > 0 && count($POST['legajo']) > 0)
        {
            $empleado = new empleado($POST['nombre'],$POST['apellido'],$_POST['dni'],$POST['sexo'],$POST['legajo'],$POST['sueldo']);
            if(verificarFoto($FILES,$empleado))
            {
                $archivo = fopen($path,"a");
                fwrite($archivo,$empleado->ToString()."\r\n");//Modificar segun uso
                fclose($archivo);
                echo "<a href='mostrar.php'>Mostrar Empleados</a>";
            }
            else
                echo "El empleado ya se encuentra cargado<br><a href='../index.html'>Inicio</a>";
        }
    }




    function baja($POST,$path)
    {
        $empleados = GetArray($path);
        $emp ='';
        foreach($empleados as $empleado)
        {
            if($POST['dni'] == $empleado->getDni())
            {
                $emp = $empleado;
                break;
                
                }
        }
       unset($empleados[array_search($emp,$empleados)]);        
       ArrayToFile($empleados,$path);
            
        
    }

    function ArrayToFile($elements,$path)
    {
        $archivo = fopen($path,"w");
        foreach($elements as $element)
            fwrite($archivo,$element->ToString()."\r\n");//Modificar segun uso
        fclose($archivo);
    }

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