<?php
require_once "./entidades/conteiner.php";
function altaConteiner($POST,$FILES)
{
    if($POST['numero'] != ""  && $POST['descripcion'] != "" && $POST['pais'] != "")
    {
        $conteiner = new Conteiner($POST['numero'],$POST['descripcion'],$POST['pais']);
        if(verificarFoto($FILES,$conteiner))
            $conteiner->ToDB();
    }
}




function verificarFoto($FILES,$conteiner)
    {
        $imageTypes = array(IMAGETYPE_GIF,IMAGETYPE_JPEG,IMAGETYPE_PNG,IMAGETYPE_BMP);
        $pathFotos = "../uploads/";
        $nuevoPath=$nombreConteiner ='';
        if(count($FILES) != 0)
        {
            $imageType = exif_imagetype($FILES['file']['tmp_name']);
            if(in_array($imageType,$imageTypes) && $FILES['file']['size']> 0 && $FILES['file']['size']<= 1024000)
            {
                $nombreConteiner = $conteiner->getNumero()."-".$conteiner->getPais();
                $nuevoPath=$nombreConteiner.image_type_to_extension($imageType);
                if(file_exists($pathFotos.$nuevoPath))
                    return false;
                if(move_uploaded_file($FILES['file']['tmp_name'],$pathFotos.$nuevoPath))
                {
                    $conteiner->setFoto($pathFotos.$nuevoPath);
                    return true;
                }
            }
        }
        return false; 

    }
?>