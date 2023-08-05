<script src="usuario/files/plugins/sweetalert2/sweetalert2.all.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Sistema de Denuncia</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="estilo/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body class="body" background="../salir.jpg">

    <form class="form" action="" method="POST">
    <b>
    <center><h1 style = "font-family:courier,arial,helvética;">Ingresar al sistema</h1>
    </center>
    <input type="text" name="usuario_cod" placeholder="Cedúla de identidad" required><br>
    <input type="password" name="clave" placeholder="Contraseña" required>
    <?php include 'sistema/login_usuario.php'?>
    <br>

    <button type="submit"
     class=" btn btn-success" value="Ingresar" name="login" >Ingresar</button>

   
    <!-- Button trigger modal -->
  
    
    </form>

    <button type="button" class="btn btn-primary boton_registrarse" data-toggle="modal" data-target="#exampleModal">
  Registrarse
</button>
<br>
<!-- Modal recuperar contraseña -->
<div class="modal fade" id="exampleModa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperar contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <?php include "usuario/recuperar_clave.php";?>
      </div>

      <div class="modal-footer">
      
        
      </div>
    </div>
  </div>
</div>
<br>
 <a type="" class=" boton_recuperar_contraseña" data-toggle="modal" data-target="#exampleModa">
 Olvidaste tu contraseña?
</a>
    

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrarse</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <?php echo isset($alert) ? $alert: ''; ?>
         <?php include "usuario/registro_usuario.php";?>
      </div>

      <div class="modal-footer">
       
       
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#exampleModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
    
  </body>
  </html>

 

<!-- Modal -->
    <style type="text/css"> 
      .boton_registrarse{
   float: right;
   }
    .btn_registrar{
    float: right;
    height: 10%;
    }
    .registrar_admin{
      float: center;
      height: 50%;
      width: 80%;

    }
    .modal-header{
      background: #17a2b8;
    }
    input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
    input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
    input[type=number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }

    .container{
      width: 90%;
      height: 50%;
      display: flex;
    }
    label{
     font-weight: bold;
     font-family:courier,arial,helvética;
    }
    input{
    font-weight: bold;
    }
    h2{
      text-align: center;
      font-weight: bold;
    }
     input .form_inpunt{
    width: 100%;
    font-family: inherit;
    font-size: 1rem;
    color:#706c6c;
    padding: .6em .3em;
    border:none;
    outline-bottom:none;
    border-bottom:1px solid var(--color);

    }
    @media (max-width: 900px){
   .registrar_admin {
    width: 80%;


    margin-top: 0;
    }
    label{
   
    margin-top: 0;

    }
   
    .container{
      width: 90%;
      height: 100%;
    }
    .btn_registrar{
      float: right;
    height: 10%;
    }
    }
    </style>
   

    <script src="js.js"></script>