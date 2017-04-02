<?php
include_once "operario.php";
include_once "fabrica.php";


$operario1 = new operario(1,"Caceres","Pablo");
$operario2 = new operario(33,"Diaz","Juan");
$operario3 = new operario(43,"Garcia","Daniel");


$operario1->SetAumentarSalario(15000);
$operario2->SetAumentarSalario(10000);
$operario3->SetAumentarSalario(20000);
//operario::MostrarOperario($operario2);

$fabrica = new fabrica("Programador S.A");
$fabrica->Add($operario1);
$fabrica->Add($operario2);
$fabrica->Add($operario3);
//echo "<br>".fabrica::MostrarCosto($fabrica);
$fabrica->Remove($operario1);
$fabrica->Mostrar();

?>