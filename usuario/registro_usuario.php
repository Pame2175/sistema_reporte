
    <?php 
        
    include "conexion.php";  
    if (!empty($_POST)) 
    {
    $alert = "";
    if (empty($_POST['usuario_cod']) || empty($_POST['nombre']) || empty($_POST['apellido'])|| empty($_POST['correo']) || empty($_POST['clave']) || empty($_POST['clavev'])) 
    {
    $alert = '<div class="alert alert-danger" role="alert">
    Todo los campos son obligatorios
    </div>';
    }
    else 
    {
    $rango_numerico = rand(time(), 100000000);
    $usuario_cod = $_POST['usuario_cod'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo= $_POST['correo'];
    $clave = md5($_POST['clave']);
    $clavev = md5($_POST['clavev']);

    $query = mysqli_query($conection, "SELECT * FROM usuarios where usuario_cod= '$usuario_cod ' or correo= '$correo'");

    $result = mysqli_fetch_row($query);
 
   
    
    if($result > 0) 
    {
     echo'<script>
        swal({
        type:"error",
        title:"Cedúla de identidad  o correo electrónico ya registado",
        showConfirmButton:true,
        confirmButtonText:"Ok"
        }).then(function(){
          window.location="index.php";
          });
        </script>';
    }
  
    else
    {

    $query_insert = mysqli_query($conection, "INSERT INTO usuarios(usuario_cod,unique_id,nombre_usu,apellido,correo,clave,clavev,id_rol,estado) values ('$usuario_cod', '$rango_numerico', '$nombre', '$apellido', '$correo', '$clave', '$clavev', '2', '1')");
    if ($query_insert) 
    {

     echo'<script>
        swal({
        type:"success",
        title:"Registrado",
        showConfirmButton:true,
        confirmButtonText:"Ok"
        }).then(function(){
          window.location="index.php";
          });
        </script>';
    
    } 
    else 
    {
   echo "<script>alert('Error al registrarse');</script>";
    }
    }
    }
    }
    ?>

<head>
    
    <link rel="stylesheet" href="usuario/css/registro_usuario.css">
</head>

   
        <form action="" method="POST" class="formulario" id="formulario">
            <!-- Grupo: Usuario -->
            <div class="formulario__grupo" id="grupo__usuario_cod">
                <label for="usuario_cod" class="formulario__label">Cedula de identidad</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="usuario_cod" id="usuario_cod" placeholder="Ej:5288613">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El usuario tiene que ser de 8 a 10 dígitos y solo puede contener numeros, letras y guion bajo.</p>
            </div>

            <!-- Grupo: Nombre -->
            <div class="formulario__grupo" id="grupo__nombre">
                <label for="nombre" class="formulario__label">Nombre</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Ej:Carlos">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
            </div>
            <!-- Grupo: Apellido -->
            <div class="formulario__grupo" id="grupo__apellido">
                <label for="nombre" class="formulario__label">Apellido</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="apellido" id="apellido" placeholder="Ej:López">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
            </div>
            <!-- Grupo: Correo Electronico -->
            <div class="formulario__grupo" id="grupo__correo">
                <label for="correo" class="formulario__label">Correo Electrónico</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="correo" id="correo" placeholder="Ej:correo@correo.com">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
            </div>
            <!-- Grupo: Contraseña -->
            <div class="formulario__grupo" id="grupo__clave">
                <label for="clave" class="formulario__label">Contraseña</label>
                <div class="formulario__grupo-input">
                    <input type="password" class="formulario__input" name="clave" id="clave" placeholder="Ej:pasdewce451256">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">La contraseña tiene que ser de 8 a 12 dígitos.</p>
            </div>

            <!-- Grupo: Contraseña 2 -->
            <div class="formulario__grupo" id="grupo__clavev">
                <label for="clavev" class="formulario__label">Repetir Contraseña</label>
                <div class="formulario__grupo-input">
                    <input type="password" class="formulario__input" name="clavev" id="clavev" placeholder="Ej:pasdewce451256">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
            </div>

            

            

            

            <div class="formulario__mensaje" id="formulario__mensaje">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
            </div>

            <div class="formulario__grupo formulario__grupo-btn-enviar">
                
                  <button type="submit" class="btn btn-primary formulario__btn" data-target="#exampleModal">
                     Registrarse
            </button>
            </div>
     </form>
  

    <script type="text/javascript" src="usuario/js/registro_usuario.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
