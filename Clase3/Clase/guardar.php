<?php
    //var_dump($_REQUEST);//
    //var_dump($_POST);// trae lo que trae por un post
    if(array_key_exists("guardar",$_POST) && $_POST['guardar'] == "Guardar")
    { 
        $nombre = $_POST['escribir'];//accedo al input que trae el nombre
        if(file_exists($_POST['archivo'].".txt"))
            copy($_POST['archivo'].".txt","backup/".$_POST['archivo'].date("dmy").".txt");
        $archivo = fopen($_POST['archivo'].".txt","w");
        if($archivo != false)
        {
            fwrite($archivo,$nombre);
            fclose($archivo);
        }
    }
    elseif(array_key_exists("leer",$_POST) && $_POST['leer'] == "Leer")
    {
        if(file_exists($_POST['archivo'].".txt"))
        {
            $archivo = fopen($_POST['archivo'].".txt","r");
            echo fgets($archivo);
            fclose($archivo);
        }
        else
            echo "El archivo no fue encontrado";
    }  
?>