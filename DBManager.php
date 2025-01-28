<?php 
class DBManager{
  var $conect;
     function DBManager(){
	 }
	 
	 function conectar() {
	     if(!($con=@mysql_connect("localhost","root","")))
		 {
		     echo"Error al conectar a la base de datos";	
			 exit();
	      }
		  if (!@mysql_select_db("empleados",$con)) {
		   echo "error al seleccionar la base de datos";  
		   exit();
		  }
	       $this->conect=$con;
		   return true;	
	 }
}

?>
