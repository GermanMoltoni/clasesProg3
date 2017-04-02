<?php
include_once "vuelo.php";
include_once "pasajero.php";
$pasajero1 = new pasajero("Perez","Daniel",33442211,false);
$pasajero2 = new pasajero("Alvarez","Carlos",43231432,true);
$pasajero3 = new pasajero("Perez","Julian",334434211,false);
$pasajero4 = new pasajero("Alvarez","Juan",43212432,true);
//echo pasajero::MostrarPasajero($pasajero1);
$vuelo1 = new vuelo("Latam",1500,25012017);
$vuelo2 = new vuelo("Air France",2300,01032017);
$vuelo1->AgregarPasajero($pasajero2);
$vuelo1->AgregarPasajero($pasajero1);
echo "<BR>";
$vuelo2->AgregarPasajero($pasajero3);
$vuelo2->AgregarPasajero($pasajero4);
echo "Recaudacion total:".vuelo::Add($vuelo1,$vuelo2);
echo "<BR>";
$vuelo1->MostrarVuelo();
echo "<BR>";
$vuelo2->MostrarVuelo();
echo "<BR>";
echo "Remove<BR>";
vuelo::Remove($vuelo1,$pasajero1);
$vuelo1->MostrarVuelo();
echo "<BR>";
vuelo::Remove($vuelo1,$pasajero1);
?>