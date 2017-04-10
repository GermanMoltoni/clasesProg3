<?php
/*
Subo una foto desde una pagina HTML, si la foto ya existe la renombro y la cambio de directorio
La foto subida la guardo
*/
$pathFotos='fotos/';
if(isset($_FILES))
{
    if(file_exists($pathFotos.$_FILES['foto']['name']))
    {
        $imageType = exif_imagetype($pathFotos.$_FILES['foto']['name']);
        copy($pathFotos.$_FILES['foto']['name'],"./backup/".date("Y_m_d_h_i_s").image_type_to_extension($imageType));
    }
    move_uploaded_file($_FILES['foto']['tmp_name'],$pathFotos.$_FILES['foto']['name']);
    echo "<img src='".$_FILES['foto']['name']."'>";
}
?>