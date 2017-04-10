<?php
    $archivo = fopen("index.html","r");
    $codigo='';
    while(!feof($archivo))
        $codigo.=fgets($archivo);
    echo str_replace("<body>","<body style='background-color:".$_POST['colores']."'>",$codigo);
    fclose($archivo);

?>