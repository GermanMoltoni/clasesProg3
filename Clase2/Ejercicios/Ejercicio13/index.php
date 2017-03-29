<?php
function pruebaPalabra($palabra,$max)
{
    if(count($palabra) <= $max && ($palabra == "Recuperatorio" || $palabra == "Parcial" ||$palabra == "Programacion"))
    {
        return 1;
    } 
    return 0;
}

echo pruebaPalabra("Recuperatorio",16);
?>