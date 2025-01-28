<?php

//Ejemplo::: se está incluyendo una clase
include_once("clases/cEmpleado.php");

//variables POST
$nom=$_POST['nombres'];
$dep=$_POST['departamento'];
$suel=$_POST['sueldo'];
sleep(2);

//creamos el objeto $objempleados
//y usamos su m�todo crear
$objempleados=new cEmpleado;
echo "LLego hasta aqu�";
if ($objempleados->crear($nom,$dep,$suel)==true){
	echo "Registro grabado correctamente";
}else{
	echo "Error de grabacion";
}

include('consulta.php');
?>
