<?php
$operador = "*";
$op1=2;
$op2=6;
switch($operador)
{
    case "/":
        $operacion = $op1/$op2;
        break;
    case "+":
        $operacion = $op1 + $op2;
        break;
    case "-":
        $operacion = $op1 - $op2;
        break;
    case "*":
        $operacion = $op1 * $op2;
        break;
}
echo "Cuenta: ".$op1.$operador.$op2." Resultado: ".$operacion;
?>