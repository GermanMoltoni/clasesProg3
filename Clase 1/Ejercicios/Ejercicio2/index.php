<?php
echo date("d-m-y")."<BR>".date("D-F-Y");
$dia =  date("z");
if($dia < 79)
    $mensaje = "Verano";
elseif($dia <172)
    $mensaje = "Otoño";
elseif($dia <265)
    $mensaje = "Invierno";
elseif($dia<352)
    $mensaje = "Primavera";
echo "<BR>"."Estacion del año: ".$mensaje;
?>