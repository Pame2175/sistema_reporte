<?php
session_start();
    require("../conexion.php");
    $id =(int)$_POST['idusuario'];
   
    

 	
    $query_delete = mysqli_query($conection, "DELETE FROM tipo_maltrato WHERE id_tipo_maltrato= $id" );

    
	if($query_delete){
	

	
 


 }
    mysqli_close($conection);
    

?>