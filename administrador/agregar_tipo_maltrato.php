
<?php
include "../conexion.php";

$nombres = $_POST['nombres'];

// Insertar el nuevo tipo de maltrato en la base de datos
$query_insert = mysqli_query($conection, "INSERT INTO tipo_maltrato(nombres) VALUES ('$nombres')");
if ($query_insert) {
  header("location: lista_tipos_maltratos.php");
} else {
  echo "<script>alert('Error al agregar el tipo de maltrato');</script>";
}
?>
