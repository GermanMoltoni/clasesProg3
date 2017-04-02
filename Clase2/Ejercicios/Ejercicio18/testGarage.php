<?php
require_once "auto.php";
require_once "garage.php";
$garage = garage::GaragePrecio("Apart Car",40);
$auto1 =  auto::AutoPrecio("Fiat","Rojo",310000);
$auto4 = auto::AutoPrecio("Fiat","Rojo",270000);
$auto5 = auto::AutoFecha("Fiat","Rojo",270000,"25012017");
$garage->Add($auto1);
echo $garage->MostrarGarage();
$garage->Add($auto1);
$garage->Remove($auto1);
echo "<BR>".$garage->MostrarGarage();


?>