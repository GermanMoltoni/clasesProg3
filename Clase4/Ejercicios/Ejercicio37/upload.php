<?php
    $path="images/";
    $tipoImagen = array(IMAGETYPE_JPEG,IMAGETYPE_PNG,IMAGETYPE_BMP);
    var_dump($_POST);
    var_dump($_FILES);
   if($_POST['up'] == 'add' && $_FILES['foto']['error'] != 4)
   {
        $tipo = exif_imagetype($_FILES['foto']['tmp_name']);
        if(in_array($tipo,$tipoImagen) && $_FILES['foto']['size'] < 3096000)
            move_uploaded_file($_FILES['foto']['tmp_name'],$path.date("Y_m_d_h_i_s").image_type_to_extension($tipo,true));
   }
?>