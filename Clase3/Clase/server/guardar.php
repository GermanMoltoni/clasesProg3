<?php
    var_dump($_REQUEST);//
    var_dump($_POST);// trae lo que trae por un post
    $nombre = $_POST['nombre'];//accedo al input que trae el nombre
    $archivo = fopen("datos.txt","w");
    fwrite($archivo,$nombre);
    fclose($archivo);
?>