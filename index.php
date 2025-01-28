<html>
<head>
<title>Registro con AJAX</title>
<script language="JavaScript" type="text/javascript" src="js/ajax.js"></script>
</head>
<body>

<form name="nuevo_empleado" action="" onSubmit="enviarDatosEmpleado(); return false">
<h2>Nuevo empleado</h2>

<p>Nombres 
<label>
<input name="nombres" type="text" />
</label>
</p>
<p>Departamento 
<label>
<select name="departamento">
<option value="Informatica">Informatica</option>
<option value="Contabilidad">Contabilidad</option>
<option value="Administracion">Administracion</option>
<option value="Logistica">Logistica</option>
</select>
</label>

</p>
<p>Sueldo <strong>S/.</strong>
<label>
<input name="sueldo" type="text" />
</label>
</p>

<p>
<label>
<input type="submit" name="Submit" value="Grabar" />
</label>
</p>

</form>

<div id="resultado"><?php include('consulta.php');?></div>
</body>
</html>