<?php
    //Ejercicio 1
    $acumulador=0;
    $cantNumeros=1;
    while($acumulador <= 1000)
    {
        $acumulador+=$cantNumeros;
        $cantNumeros+=1;
    }
    $cantNumeros-=1;
    $acumulador-=$cantNumeros;
    echo "<BR>"."Cantidad de Numeros: ".$cantNumeros."<BR>"."Suma: ".$acumulador;

?>
