<?php
require_once ("clases/producto.php");

$alta = isset($_POST["guardar"]) ? TRUE : FALSE;
$baja = isset($_POST["baja"]) ? TRUE : FALSE;
if($alta) {

	//INDICO CUAL SERA EL DESTINO DEL ARCHIVO SUBIDO
	$destino = "archivos/" . $_FILES["archivo"]["name"];

	$uploadOk = TRUE;

	$tipoArchivo = pathinfo($destino, PATHINFO_EXTENSION);

	//VERIFICO QUE EL ARCHIVO NO EXISTA
	if (file_exists($destino)) {
		$uploadOk = FALSE;
		$mensaje = "El archivo ya existe. Verifique!!!";
		include("mensaje.php");
	}
	//VERIFICO EL TAMA�O MAXIMO QUE PERMITO SUBIR
	if ($_FILES["archivo"]["size"] > 500000) {
		$uploadOk = FALSE;
		$mensaje = "El archivo es demasiado grande. Verifique!!!";
		include("mensaje.php");
	}

	//OBTIENE EL TAMA�O DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
	//IMAGEN, RETORNA FALSE
	$esImagen = getimagesize($_FILES["archivo"]["tmp_name"]);

	if($esImagen === FALSE) {//NO ES UNA IMAGEN
		$uploadOk = FALSE;
		$mensaje = "S&oacute;lo son permitidas IMAGENES.";
		include("mensaje.php");
	}
	else {// ES UNA IMAGEN

		//SOLO PERMITO CIERTAS EXTENSIONES
		if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif"
			&& $tipoArchivo != "png") {
			$uploadOk = FALSE;
			$mensaje = "S&oacute;lo son permitidas imagenes con extensi&oacute;n JPG, JPEG, PNG o GIF.";
			include("mensaje.php");
		}
	}

	//VERIFICO SI HUBO ALGUN ERROR, CHEQUEANDO $uploadOk
	if ($uploadOk === FALSE) {

		echo "<br/><br/>NO SE PUDO SUBIR EL ARCHIVO.";

	} else {
		//MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
		if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino)) {

			$p = new Producto($_POST["codBarra"],$_POST["nombre"],basename($_FILES["archivo"]["name"]));
			
			if(!Producto::GuardarDB($p)){
				$mensaje = "Lamentablemente ocurrio un error y no se pudo escribir en el archivo.";
				include("mensaje.php");
			}
			else{
				$mensaje = "El archivo fue escrito correctamente. PRODUCTO agregado CORRECTAMENTE!!!";
				include("mensaje.php");
			}
		} 
		else {
			$mensaje = "Lamentablemente ocurri&oacute; un error y no se pudo subir el archivo.";
			include("mensaje.php");
		}
	}
}
if($baja)
{
	Producto::BorrarDB($_POST['baja']);
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
					<td><button name='baja' onClick='baja(".$prod->getCodBarra().")'class='btn btn-danger navbar-btn'>Baja</button></td>
				</tr>";
	}	
echo "</table>";
}
?>