<?php
if(count($_POST) != 0)
   { 
       //echo $_POST['lado1']*$_POST['lado2'];
       $resultado = $_POST['lado1']*$_POST['lado2'];
       $codigo = Html("index.html");
       echo str_replace("<span>","<span>Resultado: ".$resultado,$codigo);
   }
//echo "<br><a href='index.html'>Pagina Anterior</a>";




function Html($path)
{
    $codigo='';
    $archivo = fopen($path,"r");
    while(!feof($archivo))
        $codigo.= fgets($archivo);
    fclose($archivo);
    return $codigo;
}
?>