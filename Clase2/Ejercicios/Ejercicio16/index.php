<?php
require_once "rectangulo.php";
require_once "punto.php";
$rectangulo = new rectangulo(new punto(2,5),new punto(7,9));
$rectangulo->Dibujar();
?>