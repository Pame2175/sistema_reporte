<?php
session_start();
include "../conexion.php";

$id_tipo_maltrato = $_REQUEST['id_tipo_maltrato'];
$nombre_maltrato = $_REQUEST['nombre_maltrato'];

// Validar si el nombre del tipo de maltrato ya existe
$consulta = mysqli_query($conection, "SELECT * FROM tipo_maltrato WHERE nombres = '$nombre_maltrato' AND id_tipo_maltrato != '$id_tipo_maltrato' ");
if (mysqli_num_rows($consulta) > 0) {
  // El nombre del tipo de maltrato ya existe, mostrar mensaje de error
  echo '
    <script src="files/plugins/sweetalert2/sweetalert2.all.js"></script>
    <script>
      swal({
        type: "error",
        title: "No puede agregar, no puede repetir los tipos de maltratos",
        showConfirmButton: true,
        confirmButtonText: "Cerrar"
      }).then(function() {
        window.location = "lista_tipos_maltratos.php";
      });
    </script>
  ';
} else {
  $query_update = "UPDATE tipo_maltrato SET nombres = '$nombre_maltrato' WHERE id_tipo_maltrato = '$id_tipo_maltrato'";
  $query_resultado = mysqli_query($conection, $query_update);

  if ($query_resultado) {
    header("location: lista_tipos_maltratos.php");
  }
}
?>








