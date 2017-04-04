<?php
    //var_dump($_REQUEST);//
    //var_dump($_POST);// trae lo que trae por un post
    if(array_key_exists("guardar",$_POST) && $_POST['guardar'] == "Guardar")
    {
        $nombre = $_POST['escribir'];//accedo al input que trae el nombre
        $archivo = fopen($_POST['archivo'],"w");
        if($archivo != false)
        {
            fwrite($archivo,$nombre);
            fclose($archivo);
        }
    }
    elseif(array_key_exists("leer",$_POST) && $_POST['leer'] == "Leer")
    {
        if(file_exists("datos.txt"))
        {
            $archivo = fopen("datos.txt","r");
            echo fgets($archivo);
            fclose($archivo);
        }
    }  
?>