<?php 
  session_start();
 include "../conexion.php";  

?>

<?php
        include '../conexion.php'; 
        $consulta= mysqli_query($conection, "SELECT * FROM usuarios WHERE usuario_id='$_SESSION[denunciante]'");
        $row = $consulta->num_rows;
        if($row > 0){
            $fetch = mysqli_fetch_array($consulta);
            $_SESSION['nombre']= $fetch['nombre'];
            $_SESSION['apellido']= $fetch['apellido'];
            $_SESSION['denunciante']= $fetch['usuario_id'];
            $_SESSION['usuario_cod']= $fetch['usuario_cod'];
            $_SESSION['correo']= $fetch['correo'];
        }
            ?>
        <form action="update_datos_usuario.php" method="POST">
        <h1>Editar datos personales</h1>
        <input type="hidden" name="usuario_id" class="user" 
          value="<?php echo $_SESSION['denunciante']?>">
        <label>Nombre</label>
        <input type="text" name="nombre" class="user" 
          value="<?php echo $_SESSION['nombre_usu']?>">
        <label>Apellido</label>
        <input type="text" name="apellido" class="user" 
          value="<?php echo $_SESSION['apellido']?>">
        <label>Cedúla</label>
        <input type="text" name="usuario_cod" class="user" 
          value="<?php echo $_SESSION['usuario_cod']?>">
        <label>Correo</label>
        <input type="text" name="correo" class="user" 
          value="<?php echo $_SESSION['correo']?>">
        <br>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary btn_cambiar_datos">Cambiar datos</button>
       
        
        </form>


<style type="text/css">
.btn_cambiar_datos{
	float: right;
}
</style>