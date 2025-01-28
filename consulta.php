<?php
include_once("clases/cEmpleado.php");

// Creamos el objeto $objempleados de la clase cEmpleado
$objempleados = new cEmpleado();

// La variable $lista consulta todos los empleados
$lista = $objempleados->consultar();

?>
<table style="border:1px solid #FF0000; color:#000099;width:400px;">
  <tr style="background:#99CCCC;">
    <td>Nombres</td>
    <td>Departamento</td>
    <td>Sueldo</td>
  </tr>
  <?php
  // Verificamos si hay resultados antes de iterar
  if ($lista) {
    while ($ad = $lista->fetch(PDO::FETCH_OBJ)) {
      echo "<tr>";
      echo "<td>" . htmlspecialchars($ad->nombre) . "</td>";
      echo "<td>" . htmlspecialchars($ad->departamento) . "</td>";
      echo "<td>" . htmlspecialchars($ad->sueldo) . "</td>";
      echo "</tr>";
    } // fin del mientras
  } else {
    echo "<tr><td colspan='3'>No hay empleados registrados.</td></tr>";
  }
  ?>
</table>