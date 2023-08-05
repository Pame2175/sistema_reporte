<?php
session_start();
include "../conexion.php";  


    
$lista_denuncia_id = $_REQUEST['lista_denuncia_id'];

$estados = $_REQUEST['id_estado'];
$observacion= $_REQUEST['observacion'];
$consulta = mysqli_query($conection,"SELECT * FROM usuarios WHERE unique_id= '$_SESSION[unique_id]' ");
$respueta= mysqli_fetch_array($consulta);
$id=$respueta['usuario_id'];

$query_update = ("UPDATE lista_denuncia SET id_estado =  '" .$estados."', observacion =  '" .$observacion."' WHERE lista_denuncia_id = '" .$lista_denuncia_id."' ");
$query_resultado = mysqli_query($conection, $query_update);
//$result_update = mysqli_query($conection,"CALL modificar($lista_denuncia_id,$id,$estados)");
  

if ($query_resultado) {
	$resultado=mysqli_query($conection, "INSERT INTO auditoria_estado(id_denuncia,id_usuario,id_estado) VALUES ('$lista_denuncia_id','$id','$estados')");
  header("location: lista_denuncia_pendiente.php");

}
// Mostrar Datos

// Validar producto


?>








s