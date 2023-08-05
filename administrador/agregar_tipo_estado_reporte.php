<?php
include "../conexion.php";

$nombres = $_POST['nombres'];

// Insertar el nuevo tipo de maltrato en la base de datos
$query_insert = mysqli_query($conection, "INSERT INTO estados(nombre) VALUES ('$nombres')");
if ($query_insert) {
  header("location: lista_tipos_estado_reporte.php");
} else {
  echo "<script>alert('Error al agregar el tipo de maltrato');</script>";
}
?>
