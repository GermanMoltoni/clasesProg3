<?php
require_once "empleado.php";
require_once "fabrica.php";
$empleado1 = new empleado("Dario","Fernandez",39029433,"Masculino",234432,23000);
$empleado2 = new empleado("Marcos","Garcia",39022343,"Masculino",2341,23033);
echo $empleado1->ToString()."<BR>";
echo $empleado1->Hablar("Aleman");
$fabrica = new fabrica("HFC");
$fabrica->AgregarEmpleado($empleado1);
$fabrica->AgregarEmpleado($empleado2);
echo "<BR>".$fabrica->ToString();
echo $fabrica->CalcularSueldos();
$fabrica->EliminarEmpleado($empleado1);
echo "<BR>".$fabrica->ToString();
$fabrica->AgregarEmpleado($empleado1);
$fabrica->AgregarEmpleado($empleado1);
echo "<BR>".$fabrica->ToString();
$fabrica->GuardarFabrica();
?>