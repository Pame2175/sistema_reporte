
	<?php 
	if(empty($_SESSION['denunciante']))
	{
		header('location: ../');
	}
	
 ?>
 
	<header>
	
   
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<div class="header">
			<a href="" class="btnMenu"><i class="fas fa-bars"></i></a>
			<h1></h1>
			
			<div class="optionsBar">
				<?php
				include '../conexion.php'; 
				$consulta= mysqli_query($conection, "SELECT * FROM usuarios WHERE usuario_id='$_SESSION[denunciante]'");
				$row = $consulta->num_rows;
				if($row > 0){
		        $fetch = mysqli_fetch_array($consulta);
		        $_SESSION['nombre']= $fetch['nombre_usu'];
		       
		    }
		        ?>

				<span class="user">Usuario:
					<?php echo $_SESSION['nombre']?></span>
					
				<a href="cerrar_session.php?logout_id=<?php echo $fetch['unique_id']; ?>" class="close" ><img class="close" src="images/close.svg" alt="Salir del sistema" title="Salir" style="color: red;"></a>
			</div>
		</div>
		
		
	</header>
	 
<?php include "nav.php"; ?>
<style type="text/css">
.user{

}
</style>