<?php 
$lapiceras = array();
$lapiceraUno= array("marca"=>"Bic","color"=>"negro","trazo"=>"fino","precio"=>"$19");
$lapiceraDos= array("marca"=>"Bic","color"=>"azul","trazo"=>"grueso","precio"=>"$16");
array_push($lapiceras,$lapiceraUno,$lapiceraDos);
foreach ($lapiceras as $lapicera)
    echo "Marca: ".$lapicera["marca"]." Precio:".$lapicera["precio"]." Trazo: ".$lapicera["trazo"]."<BR>";
?>