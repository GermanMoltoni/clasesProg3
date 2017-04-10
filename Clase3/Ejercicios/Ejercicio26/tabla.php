<?php
$form = "<form action='tabla.php' method='POST'>";
$tablaCol =  "<select name='columnas'>";
$tablaFil =  "<select name='filas'>";
for($i=1;$i<=50;$i++) 
{
    $tablaCol.="<option value='".$i."'>".$i."</option>";
    $tablaFil.="<option value='".$i."'>".$i."</option>";
}        
$tablaCol.=  "</select>";
$tablaFil.=  "</select>";
$form.=$tablaCol.$tablaFil."<button type='submit'>Crear Tabla</button></form>";
if(count($_POST) != 0)
{
    $tabla = "<table border=1 >";
    for($i=1;$i<=$_POST['columnas'];$i++)
    {
        $tabla.="<tr>";
        for($j=1;$j<=$_POST['filas'];$j++)
            $tabla.="<td>".$i."&nbsp".$j."</td>";
        $tabla.="</tr>";
    }
    $tabla.="</table>";
}
echo $form.$tabla;      
    
?>
