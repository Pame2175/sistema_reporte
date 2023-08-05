	<script src="files/plugins/sweetalert2/sweetalert2.all.js"></script>
		<?php
		session_start();
		require 'conexion.php';
	
		if(ISSET($_POST['login'])){
		$usuario_cod= $_POST['usuario_cod'];
		$clave= md5($_POST['clave']);
		
		$query = mysqli_query($conection, "SELECT * FROM usuarios WHERE usuario_cod = '$usuario_cod' && clave = '$clave'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = $query->num_rows;
		if($row > 0)
		{
		

		if($fetch['id_rol']==1  )
		{
		
		$_SESSION['rol'] = $fetch['id_rol'];
		$_SESSION['denunciante'] = $fetch['usuario_id'];
		$_SESSION['unique_id'] = $fetch['unique_id'];
		$status = "En línea";
         $sql2 = mysqli_query($conection, "UPDATE usuarios SET status = '$status' WHERE unique_id = '$_SESSION[unique_id] '");
		header("location:administrador/index_admin.php");
		}




		if($fetch['id_rol']==2){
		
		$_SESSION['denunciante'] = $fetch['usuario_id'];
		$_SESSION['unique_id'] = $fetch['unique_id'];
		$_SESSION['usuario_cod'] = $fetch['usuario_cod'];
		$_SESSION['correo'] = $fetch['correo'];
		$status = "En línea";
        $sql2 = mysqli_query($conection, "UPDATE usuarios SET status = '$status' WHERE unique_id = '$_SESSION[unique_id] '");
        if($fetch['estado']==1){
		header("location:usuario/formulario_denuncia.php");
		}
		else{
		
		 echo'<script>
      	swal({
        type:"error",
        title:"Temporalmente esta desactivado su cuenta",
        showConfirmButton:true,
        confirmButtonText:"Cerrar"
        }).then(function(){
          window.location="index.php";
          });
		</script>';
			}


		}


		}else{
		
		$alerta = '<div class="alert alert-danger" role="alert">
        Usuario o contraseña incorrecto
        </div>';
        echo $alerta;
		}
	}
	


		
		?>
