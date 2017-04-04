<?php
    var_dump($_REQUEST);//
    var_dump($_POST);// trae lo que trae por un post
    if(in_array($_POST,"escribir") && $_POST['escribir'] == "escribir")
    {
        $nombre = $_POST['nombre'];//accedo al input que trae el nombre
        $archivo = fopen($_POST['archivo'],"w");
        fwrite($archivo,$nombre);
        fclose($archivo);
    }
    elseif(in_array($_POST,"leer") && $_POST['leer'] == "leer")
    {
        $archivo = fopen("datos.txt","r");
        echo fgets($archivo);
        fclose($archivo);
    }  
?>