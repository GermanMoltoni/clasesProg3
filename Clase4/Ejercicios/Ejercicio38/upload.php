<?php
    $path="images/";
    $tipoImagen = array(IMAGETYPE_JPEG);
    if($_POST['up'] == 'add' && $_FILES)
    {
       for($i=0;$i<count($_FILES['foto']['name']);$i++)
        {
            echo $i;
            $tipo = exif_imagetype($_FILES['foto']['tmp_name'][$i]);
            if(in_array($tipo,$tipoImagen) && $_FILES['foto']['size'][$i] < 900000)
                move_uploaded_file($_FILES['foto']['tmp_name'][$i],$path.date("Y_m_d_h_").$i.image_type_to_extension($tipo,true));
            else
                echo "No pudo subirse la foto";
        }
   }
   else
        echo "No pudieron subirse las imagenes";
?>