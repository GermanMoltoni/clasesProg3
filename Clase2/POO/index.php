<?php
    include("funciones.php");// include "funciones.php"; CCTRL+D seleccion multiple de misma palabra
    //require "noexiste.php";
    //include_once "funciones.php";
    require_once "funciones.php"; //Requiere la inclusion una sola vez
    require_once "calculadora.php";
    $resultado  = sumar(1,2);
    $resultado1 = Calculadora::sumar(4,2);
    $resultado2 = Calculadora::multiplicar(4,2);
    echo $resultado."<BR>";
    echo $resultado1."<BR>".$resultado2;


?>