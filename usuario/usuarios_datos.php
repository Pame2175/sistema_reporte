<?php 
  session_start();
 include "../conexion.php";  
 include "includes_usuario/scripts.php";

 ?>
<!-- Modal -->
<!DOCTYPE html>
<html>
<head>
    <title></title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Validación de Formulario con Javascript</title>
<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">

<link rel="stylesheet" href="../registro_usuario.css">
    <link rel="stylesheet" href="usuario/css/registro_usuario.css">
     <script src="js/jquery-3.5.1.js"></script>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
   <?php  include "includes_usuario/header.php";?>
<br>
<br>
 
 
<div class="modal fade" id="datos_personales_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos personales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
 
 include "../conexion.php";  

?>

<?php
      
        $consulta= mysqli_query($conection, "SELECT * FROM usuarios WHERE usuario_id='$_SESSION[denunciante]'");
        $row = $consulta->num_rows;
        if($row > 0){
            $fetch = mysqli_fetch_array($consulta);
            $_SESSION['nombre']= $fetch['nombre_usu'];
            $_SESSION['apellido']= $fetch['apellido'];
            $_SESSION['denunciante']= $fetch['usuario_id'];
            $_SESSION['usuario_cod']= $fetch['usuario_cod'];
            $_SESSION['correo']= $fetch['correo'];
        }
            ?>
      


    
    <link rel="stylesheet" href="css/registro_usuario.css">
</head>
 
       <form action="update_datos_usuario.php" method="POST" class="formulario" id="formulario">
        <input type="hidden" name="usuario_id" class="user" 
          value="<?php echo $_SESSION['denunciante']?>">
            <!-- Grupo: Usuario -->
            <div class="formulario__grupo" id="grupo__usuario_cod">
                <label for="usuario_cod" class="formulario__label">Cedula </label>
                <div class="formulario__grupo-input">
                    <input type="text" value="<?php echo $_SESSION['usuario_cod']?>" class="formulario__input" name="usuario_cod"  placeholder="Ej:5288613">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El usuario tiene que ser de 8 a 10 dígitos y solo puede contener numeros, letras y guion bajo.</p>
            </div>

            <!-- Grupo: Nombre -->
            <div class="formulario__grupo" id="grupo__nombre">
                <label for="nombre" class="formulario__label">Nombre</label>
                <div class="formulario__grupo-input">
                    <input type="text" value="<?php echo $_SESSION['nombre']?>" class="formulario__input" name="nombre" placeholder="Ej:Carlos" >
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
            </div>
            <!-- Grupo: Apellido -->
            <div class="formulario__grupo" id="grupo__apellido">
                <label for="nombre" class="formulario__label">Apellido</label>
                <div class="formulario__grupo-input">
                    <input type="text" value="<?php echo $_SESSION['apellido']?>" class="formulario__input" name="apellido" placeholder="Ej:López">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
            </div>
            <!-- Grupo: Correo Electronico -->
            <div class="formulario__grupo" id="grupo__correo">
                <label for="correo" class="formulario__label">Correo Electrónico</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="correo"  placeholder="Ej:correo@correo.com" value="<?php echo $_SESSION['correo']?>">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
            </div>
            
        
            <div class="formulario__mensaje" id="formulario__mensaje">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
            </div>

            <div class="formulario__grupo formulario__grupo-btn-enviar">
                
            <button type="submit" class="btn btn-primary formulario__btn" data-target="#exampleModal">
                     Guardar
            </button>
            
        
      </div>
            </div>
      <div class="modal-footer">
       
       </form>

    </div>
  </div>
</div>
</div>
<br>
<br>
    <script type="text/javascript" src="js/editar_datos_usuario.js"></script>

       <?php
// Conexión a la base de datos



// Verificar la conexión
if ($conection->connect_error) {
    die("Conexión fallida: " . $conection->connect_error);
}

// Consulta SQL para obtener los datos del perfil de usuario
$sql = "SELECT * FROM usuarios WHERE usuario_id='$_SESSION[denunciante]'"; // Cambia "1" por el ID del usuario que deseas mostrar

$result = $conection->query($sql);

// Cerrar la conexión
$conection->close();
?>


    <style>
        .container {
            max-width: 100px;
            margin: 0 auto;
            padding: 100px;
            background-color: ;
            border-radius: 1px;
            float: left;
             
            
        }
        
        h2 {
            text-align: center;
        }
        .datos-personales  {
          border-radius: 5px;
               }
        
        
        .datos-personales strong {
            font-weight: bold;
        }
        
        .datos-personales span {
            font-weight: normal;
            color: #555;
        }
        
        .perfil-imagen {
            text-align: center;
        }
        
        .perfil-imagen img {
            width: 150px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
    </style>
</head>


    <div class="container">
  
        <h2>Datos personales</h2>
           <i class="fas fa-user fa-10x"></i> 
        
            <?php
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
            } else {
                echo "No se encontraron datos del perfil de usuario";
            }
            ?>
    
      
        <div class="datos-personales" style="float: left;">
            <?php
            if ($result->num_rows > 0) {
              
              echo "<p><strong>Cedula de Identidad:</strong> <span>" . $row["usuario_cod"] . "</span></p>";
                echo "<p><strong>Nombre:</strong> <span>" . $row["nombre_usu"] . "</span></p>";
                echo "<p><strong>Apellido:</strong> <span>" . $row["apellido"] . "</span></p>";
                echo "<p><strong>Correo:</strong> <span>" . $row["correo"] . "</span></p>";
            } else {
                echo "No se encontraron datos del perfil de usuario";
            }
            ?>

        </div>
         <button type="button" class="btn btn-success efecto " data-toggle="modal" data-target="#datos_personales_usuario" title="Datos personales" style="float: left;">Editar</button>  
   
    </div>

</body>
</html>

