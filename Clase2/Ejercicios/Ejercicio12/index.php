<?php
function invertArray($string)
{
    $array = array();
    for($i=count($string);$i >=0;$i--)
    {
        echo $string[$i];
        array_push($array,$string[$i]);
    }
    return $array;
}
var_dump(invertArray("HOLA"));
?>