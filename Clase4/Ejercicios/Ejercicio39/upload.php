<?php
    $path="uploads/";
    $tipoImagen = array(IMAGETYPE_JPEG,IMAGETYPE_GIF);
    $tipoDoc = array("doc","docx");
    if($_POST['up'] == 'add' && $_FILES)
    {
        $name = explode(".",$_FILES['foto']['name']);
        if(in_array(exif_imagetype($_FILES['foto']['tmp_name']),$tipoImagen))
        {
            if($_FILES['foto']['size'] < 300096)
                move_uploaded_file($_FILES['foto']['tmp_name'],$path.date("Y_m_d_h").image_type_to_extension(exif_imagetype($_FILES['foto']['tmp_name']),true));
            else
                echo "No pudo subirse la imagen";
        } 
        elseif (in_array($name[count($name)-1],$tipoDoc))
        {
            if($_FILES['foto']['size'] < 60000)
                move_uploaded_file($_FILES['foto']['tmp_name'],$path.date("Y_m_d_h").".".$name[count($name)-1]);
            else
                echo "No pudo subirse el documento";
        } 
        elseif($_FILES['foto']['size'] < 500000)
            move_uploaded_file($_FILES['foto']['tmp_name'],$path.date("Y_m_d_h").".".$name[count($name)-1]);
        else
            echo "Supero el temaño permitido";
    }
   else
        echo "No pudieron subirse los documentos";
?>