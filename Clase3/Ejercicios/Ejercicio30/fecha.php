<?php
if(count($_POST) != 0)
{
    $fecha='';
    if(array_key_exists("dia",$_POST) && $_POST['dia'] == 'dia')
        $fecha.= date("d");
    if(array_key_exists("mes",$_POST) && $_POST['mes'] == 'mes')
        $fecha.= date("m");
    if(array_key_exists("anio",$_POST) && $_POST['anio'] == 'anio')
        $fecha.= date("y");
    echo $fecha;

}
?>