<?php
include "../conexion.php";

$nombres = $_POST['nombres'];

// Validar si el nombre del tipo de maltrato ya existe en la base de datos
$query_check = mysqli_query($conection, "SELECT * FROM tipo_maltrato WHERE nombres = '$nombres'");
if (mysqli_num_rows($query_check) > 0) {
  // El tipo de maltrato ya existe, devolver respuesta "existe"
  echo "existe";
} else {
  // El tipo de maltrato es válido, devolver respuesta "ok"
  echo "ok";
}
?>
