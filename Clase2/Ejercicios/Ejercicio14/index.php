<?php
    function esPar($nro)
    {
        if($nro%2)
            return false;
        return true;
    }

    function esImpar($nro)
    {
        return !esPar($nro);
    }

    if(esImpar(5))
        echo "5 Es impar<BR>";
    if(esPar(4))
        echo "4 Es Par";
?>