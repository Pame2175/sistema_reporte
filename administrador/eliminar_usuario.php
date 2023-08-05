<?php
session_start();
    require("../conexion.php");
    $id =(int)$_POST['idusuario'];
   
    

 	
    $query_delete = mysqli_query($conection, "DELETE FROM usuarios WHERE usuario_id= $id AND id_rol='2'" );

     $consult = mysqli_query($conection,"SELECT * FROM usuarios WHERE usuario_id= $id AND id_rol='2'");
     $respuet= mysqli_fetch_array($consult);
	$usuario_cod=$respuet['usuario_cod'];


    $consulta = mysqli_query($conection,"SELECT * FROM usuarios WHERE unique_id= '$_SESSION[unique_id]' ");
	$respueta= mysqli_fetch_array($consulta);
	$admin=$respueta['usuario_id'];
	if($query_delete){
	

	$resultado=mysqli_query($conection, "INSERT INTO auditoria_eliminar_usu(id_usuario,id_administrador) VALUES ('$id','$admin')");

 


 }
    mysqli_close($conection);
    

?>