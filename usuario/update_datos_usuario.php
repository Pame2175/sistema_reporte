
<?php
include "../conexion.php";  

   

    
  	$usuario_id= $_POST['usuario_id'];
   $usuario_cod= $_POST['usuario_cod'];
   $nombre= $_POST['nombre'];
   $apellido= $_POST['apellido'];
   $correo= $_POST['correo'];
   $query = mysqli_query($conection, "SELECT * FROM usuarios where usuario_cod= '$usuario_cod ' or correo= '$correo'");

    $result = mysqli_fetch_row($query);
 
   
    
    if($result > 0) 
    {
     echo "<script>alert('la cedula ya esta registrado');</script>";
    }
  
    else
    {

  	$query_update = ("UPDATE usuarios SET usuario_cod =  '$usuario_cod', nombre_usu =  ' $nombre', apellido =  ' $apellido', correo =  ' $correo' WHERE usuario_id = '$usuario_id' ");
    
 	$query_resultado = mysqli_query($conection, $query_update);
	if ($query_update) 
    {
    	 header("location: inicio_usuario.php");
    	
   
    
    } 
   
    }
    
    
    
    ?>
