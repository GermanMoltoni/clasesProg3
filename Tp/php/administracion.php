<?php
    require_once "empleado.php";
    require_once "fabrica.php";
    $path="datos/empleados.txt";
    $imageTypes = array(IMAGETYPE_GIF,IMAGETYPE_JPEG,IMAGETYPE_PNG,IMAGETYPE_BMP);
    $pathFotos = "../fotos/";
    $archivos = scandir($pathFotos);
    if(array_key_exists("alta",$_POST) && $_POST['alta'] == "add")
    {
        if(count($_FILES) !=0 )
        {
            $imageType = exif_imagetype($_FILES['foto']['tmp_name']);
            if(in_array($imageType,$imageTypes)&& count($_POST['nombre']) != 0 && count($_POST['apellido']) != 0 && count($_POST['dni']) != 0 && array_key_exists("sexo",$_POST) && count($_POST['sueldo']) != 0 && count($_POST['legajo']) != 0)
            {
                $empleado = new empleado($_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['sexo'],$_POST['legajo'],$_POST['sueldo']);
                $nuevoPath=$empleado->getDni()."-".$empleado->getApellido().image_type_to_extension($imageType);
                var_dump($archivos);
                if(!in_array($nuevoPath,$archivos) && move_uploaded_file($_FILES['foto']['tmp_name'],$pathFotos.$nuevoPath))
                    {
                        $empleado->setPathFoto($pathFotos.$nuevoPath);
                        $archivo = fopen($path,"a"); 
                        fwrite($archivo,$empleado->ToString()."\r\n");
                        fclose($archivo);
                        echo "<a href='mostrar.php'>Mostrar Empleados</a>";
                    }
                    else
                        echo "asdasd";
        }
            
        }
        else
            echo "<a href='../index.html'>Inicio</a>";
    }
?>