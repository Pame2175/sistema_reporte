<?php
session_start();
include "../conexion.php"; 
$usuario_id = $_GET['lista_denuncia_id'];
$estado = $_GET['estado'];
$consulta="update usuarios set estado=$estado where usuario_id=$usuario_id";
mysqli_query($conection,$consulta);

if($consulta){
header("location:listas_usuarios.php");
}
?>