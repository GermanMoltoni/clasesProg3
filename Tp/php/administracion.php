<?php
    require_once "empleado.php";
    require_once "fabrica.php";
    $path="datos/empleados.txt";
    if(array_key_exists("alta",$_POST) && $_POST['alta'] == "add")
    {
        if(count($_POST['nombre']) != 0 && count($_POST['apellido']) != 0 && count($_POST['dni']) != 0 && array_key_exists("sexo",$_POST) && count($_POST['sueldo']) != 0 && count($_POST['legajo']) != 0)
        {
            $empleado = new empleado($_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['sexo'],$_POST['legajo'],$_POST['sueldo']);
            
            if(verificarFoto($_FILES,$empleado))
            {
                $archivo = fopen($path,"w");
                fwrite($archivo,$empleado->ToString()."\r\n");
                fclose($archivo);
                echo "<a href='mostrar.php'>Mostrar Empleados</a>";
            }
        }
    }
    else
        echo "<a href='../index.html'>Inicio</a>";

    function verificarFoto($postFile,$empleado)
    {
        var_dump($postFile);
        $imageTypes = array(IMAGETYPE_GIF,IMAGETYPE_JPEG,IMAGETYPE_PNG,IMAGETYPE_BMP);
        $pathFotos = "../fotos/";
        $nuevoPath='';
        if(count($postFile) != 0)
        {
            $archivos = scandir($pathFotos);// retorna una lista de archivos en array
            $imageType = exif_imagetype($postFile['foto']['tmp_name']);//Retorna la extension de la imagen
            if(!in_array($nuevoPath,$archivos) && in_array($imageType,$imageTypes) && $postFile['foto']['size']> 0 && $postFile['foto']['size']<= 1024000)
            {
                $nuevoPath=$empleado->getDni()."-".$empleado->getApellido().image_type_to_extension($imageType);
                if(move_uploaded_file($_FILES['foto']['tmp_name'],$pathFotos.$nuevoPath))
                {
                    $empleado->setPathFoto($pathFotos.$nuevoPath);
                    return true;
                }
            }
        }
        return false; 

    }
?>