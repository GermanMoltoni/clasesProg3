<?php
if(array_key_exists('archivo',$_POST) && file_exists($_POST['archivo']))
{
    $archivo = fopen($_POST['archivo'],"r");
    $archivoNuevo = fopen("./misArchivos/".date("Y_m_d_h_i_s").".txt","w");
    while(!feof($archivo))
    {
        $string = fgets($archivo);
        fwrite($archivoNuevo,strrev($string));
    }
    
    fclose($archivo);
    fclose($archivoNuevo);
}
    
?>