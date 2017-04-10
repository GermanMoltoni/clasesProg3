<?php
    $archivo = fopen("index.html","r");
    $codigo='';
    while(!feof($archivo))
    {
        $codigo.=fgets($archivo);
    }
    $background=$_POST['colores'];
    echo str_replace("<body>","<body style='background-color:".$background."'>",$codigo);
    fclose($archivo);
?>