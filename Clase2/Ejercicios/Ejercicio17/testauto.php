<?php
require_once "auto.php";
$auto1 = new auto("Peugeot","Negro");
$auto2 = new auto("Peugeot","Rojo");
$auto3 = new auto("Fiat","Rojo",310000);
$auto4 = new auto("Fiat","Rojo",270000);
$auto5 = new auto("Fiat","Rojo",270000,"25012017");
$auto3->AgregarImpuesto(1500);
$auto4->AgregarImpuesto(1500);
$auto5->AgregarImpuesto(1500);
$valor = auto::Add($auto3,$auto4);
echo "<BR>Valor de Auto 1 y 2 es:".$valor."<BR>";
if($auto1->Equals($auto2))
    echo "Auto 1 y 2 son iguales"."<BR>";
if($auto1->Equals($auto5) == false)
    echo "Auto 1 y 5 no son iguales"."<BR>";
auto::MostrarAuto($auto1);
auto::MostrarAuto($auto3);
auto::MostrarAuto($auto5);
// VER CONSTRUCTORES
?>