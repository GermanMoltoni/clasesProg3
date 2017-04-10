<?php
include_once "enigma.php";
if(enigma::Encriptar("Hola<br> como estas?","prueba.txt"))
    echo enigma::DesEncriptar("prueba.txt");
?>