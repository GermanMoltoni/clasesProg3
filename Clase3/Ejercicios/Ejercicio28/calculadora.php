<?php
if(count($_POST) != 0)
   { 
        $codigo = Html("index.html");
        if($_POST['radio'] == "superficie")
        {
            $resultado = $_POST['lado1']*$_POST['lado2'];
            $codigo = str_replace('<input type="radio" name="radio" value="superficie">',"<input type='radio' name='radio' value='superficie' checked>",$codigo);
        }
        else
        {
            $resultado = $_POST['lado1']*2+$_POST['lado2']*2;
            $codigo = str_replace('<input type="radio" name="radio" value="perimetro">',"<input type='radio' name='radio' value='perimetro' checked>",$codigo);
        }
       
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