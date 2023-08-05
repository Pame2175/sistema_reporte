<script src="files/plugins/sweetalert2/sweetalert2.all.js"></script>

	
	

<?php 
session_start();
  include "../conexion.php";  

 include "includes_usuario/scripts.php";
$id_denuncia2=$_POST['id_denuncia2'];
 $consulta_imagenes= mysqli_query($conection,"SELECT * FROM imagen where id_denuncia= '$id_denuncia2' ") or die(mysqli_error());
 //mysqli_num_rows trae una fila de datos
 $resultado=mysqli_num_rows( $consulta_imagenes);

?>
      
         
      
  <!DOCTYPE html>
  <html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/jquery-3.5.1.js"></script>
   <link rel="stylesheet" href="files/bower_components/bootstrap/dist/css/bootstrap.min.css"> 
  <title>Sistema de Denuncia</title>
  <script src="files/plugins/sweetalert2/sweetalert2.all.js"></script>
  </head>
  <body>
  <?php
   include "includes_usuario/header.php";
   ?>
   <br>
  <div class="container"> 
    <a href="lista_denuncias.php"  class="btn btn-primary">Lista de denuncias</a>
      <br>
      <br>
  <div id="myCarousel"  class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators" style="top: 50%;" >
  </ol>
  <div class="carousel-inner">
    <br>

  <?php 
  if ($resultado > 0) {
    $contador=0;
 foreach($consulta_imagenes as $fetch_img)
  {
  $multimedia=json_decode($fetch_img["enlace"],true);

  foreach ($multimedia as $valor)
  {

    if ($contador==0) {
       echo '<div class="item active">'
       .'<img src="'.$valor["foto"].'" style="width:100%;  height:70%; ">'
       .'</div>';
    }
    else{
      echo ' <div class="item">'
      .'<img src="'.$valor["foto"].'" style="width:100%;  height:70%; ">'
      .'</div>';
    }
    $contador++;
  
}
    }
  }
  else{
    echo'<script>
      swal({
        type:"warning",
        title:"Aún no agregado evidencia",
        showConfirmButton:true,
        confirmButtonText:"Cerrar"


        }).then(function(){
          window.location="lista_denuncias.php";
          });





    </script>';
  }
  
?>
  </div>

  <!--  -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<script src="files/bower_components/jquery/dist/jquery.min.js"></script>
<script src="files/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</html>