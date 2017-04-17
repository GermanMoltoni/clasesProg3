<?php
    $path="uploads/";
    $tipoImagen = array(IMAGETYPE_JPEG,IMAGETYPE_GIF);
    $tipoDoc = array("doc","docx");
    if($_POST['up'] == 'add' && $_FILES)
    {
       for($i=0;$i<count($_FILES['foto']['name']);$i++)
        {
            $name = explode(".",$_FILES['foto']['name'][$i]);
            if(in_array(exif_imagetype($_FILES['foto']['tmp_name'][$i]),$tipoImagen))
            {
                if($_FILES['foto']['size'][$i] < 300096)
                    move_uploaded_file($_FILES['foto']['tmp_name'][$i],$path.date("Y_m_d_h_").$i.image_type_to_extension(exif_imagetype($_FILES['foto']['tmp_name'][$i]),true));
                else
                    echo "No pudo subirse la imagen";
            } 
            elseif (in_array($name[count($name)-1],$tipoDoc))
            {
                if($_FILES['foto']['size'][$i] < 60000)
                    move_uploaded_file($_FILES['foto']['tmp_name'][$i],$path.date("Y_m_d_h_").$i.".".$name[count($name)-1]);
                else
                    echo "No pudo subirse el documento";
            } 
            elseif($_FILES['foto']['size'][$i] < 500000)
                move_uploaded_file($_FILES['foto']['tmp_name'][$i],$path.date("Y_m_d_h_").$i.".".$name[count($name)-1]);
            else
                echo "Supero el temaño permitido";
        }
   }
   else
        echo "No pudieron subirse los documentos";
?>