<?php
session_start();
include "../conexion.php";

$id_estado = $_REQUEST['id_estado'];
$nombre = $_REQUEST['nombre'];


// Validar si el nombre del tipo de maltrato ya existe
$consulta = mysqli_query($conection, "SELECT * FROM estados WHERE nombre = '$nombre' AND id_estado != '$id_estado' ");
if (mysqli_num_rows($consulta) > 0) {
  // El nombre del tipo de maltrato ya existe, mostrar mensaje de error
 
} else {
  $query_update = "UPDATE estados SET nombre = '$nombre' WHERE id_estado = '$id_estado'";
  $query_resultado = mysqli_query($conection, $query_update);

  if ($query_resultado) {
    header("location: lista_tipos_estado_reporte.php");
  }
}
?>