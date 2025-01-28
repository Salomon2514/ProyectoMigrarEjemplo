<?php
include_once("clases/cEmpleado.php");

//variables POST
$nom=$_POST['nombres'];
$dep=$_POST['departamento'];
$suel=$_POST['sueldo'];
sleep(2);

//creamos el objeto $objempleados
//y usamos su método crear
$objempleados=new cEmpleado;
//echo "LLego hasta aquí";
if ($objempleados->crear($nom,$dep,$suel)==true){
	echo "Registro grabado correctamente";
}else{
	echo "Error de grabacion";
}

include('consulta.php');
?>
