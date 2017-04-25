<?php
	require_once('clases/producto.php');
?>
<html>
<head>
	<title>Ejemplo de ALTA-LISTADO - con archivos -</title>

	<meta charset="UTF-8">
		
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">
<script>
var req = new XMLHttpRequest();
function Ajax(url,method,func,dates)
{
    req.open(method,url,true);
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");//POST
    req.onreadystatechange = func;
    req.send(dates);
}
function baja(id)
{
    Ajax("http://localhost:8080/a/Clase6/PDO/Ejercicio/abm/administracion.php","POST",testState,"baja="+id);
    function testState(){
        if(req.readyState == 4 && req.status == 200)
            alert(req.responseText);//document.getElementById('miDiv').innerHTML = req.responseText;
        else
             document.getElementById('miDiv').innerHTML = "Cargando";
    }
</script>
}

</head>
<body>
	<a class="btn btn-info" href="index.html">Menu principal</a>

	<div class="container">
		<div class="page-header">
			<h1>Ejemplos de Grilla</h1>      
		</div>
		<div class="CajaInicio animated bounceInRight">
			<h1>Listado de PRODUCTOS</h1>

<?php 

$ArrayDeProductos = Producto::TraerTodosLosProductosDB();
echo "<table class='table'>
		<thead>
			<tr>
				<th>  COD. BARRA </th>
				<th>  NOMBRE     </th>
				<th>  FOTO       </th>
				<th> BORRAR 	</th>
			</tr> 
		</thead>";   	

	foreach ($ArrayDeProductos as $prod){

		echo " 	<tr>
					<td>".$prod->GetCodBarra()."</td>
					<td>".$prod->GetNombre()."</td>
					<td><img src='archivos/".$prod->GetPathFoto()."' width='100px' height='100px'/></td>
					<td><button name='baja' onClick='baja(".$prod->getCodBarra()."')class='btn btn-danger navbar-btn'>Baja</button></td>
				</tr>";
	}	
echo "</table>";		
?>
		</div>
	</div>
</body>
</html>