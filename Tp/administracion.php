<?php

    require_once "empleado.php";
    require_once "fabrica.php";
    var_dump($_POST);
    if(array_key_exists("alta",$_POST) && $_POST['alta'] == "add")
    {
        //$empleado = new empleado();
    }
?>