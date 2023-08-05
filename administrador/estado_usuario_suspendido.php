<?php
session_start();
include "../conexion.php"; 
$usuario_id = $_GET['usuario_id'];
$estado = $_GET['estado'];
$consulta="update usuarios set estado=$estado where usuario_id=$usuario_id";
mysqli_query($conection,$consulta);

if($consulta){
header("location:lista_usuarios_suspendido.php");
}
?>