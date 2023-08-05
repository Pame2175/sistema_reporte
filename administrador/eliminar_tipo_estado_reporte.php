<?php
session_start();
    require("../conexion.php");
    $id =(int)$_POST['idusuario'];
   
    

 	
    $query_delete = mysqli_query($conection, "DELETE FROM estados WHERE id_estado= $id" );

    
	if($query_delete){
	

	
 


 }
    mysqli_close($conection);
    

?>