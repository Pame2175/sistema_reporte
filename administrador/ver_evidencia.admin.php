


<script src="files/plugins/sweetalert2/sweetalert2.all.js"></script>

  
  

<?php 
session_start();
  include "../conexion.php";  

 include "includes_admin/scripts_admin.php";
  $id_denuncia3=$_POST['id_denuncia3'];
 $consulta_imagenes= mysqli_query($conection,"SELECT * FROM imagen where id_denuncia= '$id_denuncia3' ") or die(mysqli_error());
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZwv-model-vue1T" crossorigin="anonymous">

  <meta name="viewport" content="width=device-width, initial-scale=1"> 

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>

  <?php
   include "includes_admin/header_admin.php";
   ?>
  <div class="container"> 
      <a href="lista_denuncias_admin.php"  class="btn btn-primary">Lista de denuncias</a>
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
          window.location="lista_denuncias_admin.php";
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