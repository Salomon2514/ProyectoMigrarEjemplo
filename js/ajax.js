function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function enviarDatosEmpleado(){
  //donde se mostrará lo resultados
  alert("llego a este puneto");
  divResultado = document.getElementById('resultado');
  divResultado.innerHTML= '<img src="anim.gif">';
  //valores de las cajas de texto
  nom=document.nuevo_empleado.nombres.value;
  dep=document.nuevo_empleado.departamento.value;
  suel=document.nuevo_empleado.sueldo.value;
  //instanciamos el objetoAjax
  ajax=objetoAjax();
  //uso del medoto POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "registro.php",true);
  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
  //mostrar resultados en esta capa
  divResultado.innerHTML = ajax.responseText
  //llamar a funcion para limpiar los inputs
  LimpiarCampos();
  }
  }

  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores
  ajax.send("nombres="+nom+"&departamento="+dep+"&sueldo="+suel)
}

function LimpiarCampos(){
  document.nuevo_empleado.nombres.value="";
  document.nuevo_empleado.departamento.value="";
  document.nuevo_empleado.sueldo.value="";
  document.nuevo_empleado.nombres.focus();
  }