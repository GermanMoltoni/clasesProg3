<?php
    $path="images/";
    $archivos = scandir($path);
    $archivos = array_diff($archivos,array('..','.'));
    $tabla = "<table class='table-bordered table-striped'>";
    foreach($archivos as $archivo)
        $tabla.="<tr><td><a href='images/".$archivo."'><img src='images/".$archivo."'height='100' width='100'></a></td></tr>";
    $tabla.="</table>";
    echo $tabla;
?>