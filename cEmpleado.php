<?php 
include_once("DBManager.php");
//implementamos la clase empleado
class cEmpleado{
 //constructor	
 function cEmpleado(){
 }	
 
 // consulta los empledos de la BD
 function consultar(){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "select * from  empleados  order by nombres";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 //inserta un nuevo empleado en la base de datos
 function crear($nom,$dep,$suel){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO empleados (nombres, departamento, sueldo) 
	 VALUES ('$nom','$dep',$suel)";
     $result = mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
}
?>
