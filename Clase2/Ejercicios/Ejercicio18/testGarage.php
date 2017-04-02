<?php
require_once "auto.php";
require_once "garage.php";
$garage = new garage("Apart Car",40);
$auto1 =  new auto("Fiat","Rojo",310000);
$auto4 = new auto("Fiat","Rojo",270000);
$auto5 = new auto("Peugeot","Rojo",270000,"25012017");
$garage->Add($auto1);
echo $garage->MostrarGarage();
$garage->Add($auto1);
$garage->Add($auto5);
$garage->Remove($auto1);
echo "<BR>".$garage->MostrarGarage();


?>