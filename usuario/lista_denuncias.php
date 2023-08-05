<?php 
  session_start();
 include "../conexion.php";  

 include "includes_usuario/scripts.php";
 ?>


<head>
  <script src="js/jquery-3.5.1.js"></script>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  
<title>Lista de reportes</title>
<link rel="stylesheet" href="../datatables/DataTable/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="../datatables/DataTable/css/dataTables.bootstrap4.css">

<!-- llamada al estilo css de datatables -->
<link rel="stylesheet" href="../datatables/DataTable/css/dataTables.bootstrap4.min.css">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="files/bower_components/bootstrap/dist/css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="files/bower_components/font-awesome/css/font-awesome.min.css">

<!-- Ionicons -->
<link rel="stylesheet" href="files/bower_components/Ionicons/css/ionicons.min.css">

<!-- Dropzone -->
<link rel="stylesheet" href="files/plugins/dropzone/dropzone.css">
<script src="files/bower_components/jquery/dist/jquery.min.js"></script>
<script src="files/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="files/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="files/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="files/plugins/dropzone/dropzone.js"></script>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
</head>

<body>
  
  <?php  include "includes_usuario/header.php";?>
<section id="container">
  <div class="tabla">
    <div style="padding-left:16px; font-family:  times new roman, Helvetica, sans-serif">
  <h1 style = "font-family:arial,arial,helvética;">Lista de reportes</h1>
  
</div>
  <div class="containerTable" id="containerTable"></div>
 <table id="table" class="table">
      <thead>
      <tr>
        <th>Código:</th>
        <th>Descripcion:</th>
        <th>Tipo de maltrato:</th>
        <th>Celular:</th>
        <th>Dirección:</th>
        <th>Estado:</th>
        <th>Fecha:</th>
        <th>Observación:</th>

        
        <th style="display:none">idmal:</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      
      $consulta= mysqli_query($conection,"SELECT * FROM usuarios WHERE usuario_id='$_SESSION[denunciante]'") or die(mysqli_error());
      $fetch = mysqli_fetch_array($consulta);
      $usuario_id = $fetch['usuario_id'];





      $query = mysqli_query($conection, "SELECT r.lista_denuncia_id , r.descripcion, r.celular, r.fecha, r.observacion, r.latitud, r.longitud,
      r.usuario_id, re.nombre, tm.id_tipo_maltrato,tm.nombres

    FROM lista_denuncia r
    INNER JOIN estados re ON  r.id_estado = re.id_estado
    INNER JOIN tipo_maltrato tm ON  r.id_tipo_maltrato = tm.id_tipo_maltrato
    WHERE usuario_id = '$usuario_id' ORDER BY lista_denuncia_id ") or die(mysqli_error());
    while($fetch = mysqli_fetch_array($query)){
    ?>
        
    <tr>

    <td class="columna"><?php echo $fetch["lista_denuncia_id"];?></td>     
    <td class="columna"><?php echo $fetch["descripcion"];?></td>
    <td class="columna"><?php echo $fetch["nombres"];?></td>
    <td class="columna"><?php echo $fetch["celular"];?></td>
   <td style="width: 200px; height: 100px;">
        <iframe  src='https://www.google.com/maps?q=<?php echo $fetch["latitud"];?>,<?php echo $fetch["longitud"];?>&hl=es;z=14&output=embed' style=" width=100% ; height= 100%;"></iframe></td>
    <?php
   
    if($fetch['nombre'] == "Pendiente"){?>
    <td style="background:red
    ;" class=""><?php echo $fetch["nombre"];?></td>
    <?php  
    }
     ?>
     <?php
   
    if($fetch['nombre'] == "En proceso"){?>
    <td style="background:yellow;" class=""><?php echo $fetch["nombre"];?></td>
    <?php  
    }
     ?>
     <?php
   
    if($fetch['nombre'] == "Finalizado"){?>
    <td style="background: green" class=""><?php echo $fetch["nombre"];?></td>
    <?php  
    }
     ?>
    <td style="display:none"><?php echo $fetch["id_tipo_maltrato"];?></td>
    <td class="columna"><?php echo date("d-m-Y H:i:s", strtotime($fetch["fecha"]));?></td>
    <?php
   
    if(!empty($fetch['observacion'])){?>
    <td class="columna" style="background: green;"><?php echo $fetch["observacion"];?></td>
    <?php  
    }
     ?>
    
    
      <?php
   if(empty($fetch['observacion'])){?>
    <td class="columna" style="background: white"><?php echo $fetch["observacion"];?></td>
    <?php  
    }
     ?>
      <?php
      

 
     ?>
     <td>
    <button type="button" class="btn btn-warning mostrar" id="" data-toggle="modal" data-target="#exampleModal"title="Agrear evidencia">
    <i class="fa fa-folder-plus"></i>
    </button>
    <button type="button" class="btn btn-info mostrar2" id="<?php echo $fetch["lista_denuncia_id"];?>" data-toggle="modal" data-target="#exampleModal2" title="Ver evidencia">
    <i class="fa fa-eye"></i></button>
     <button type="button" class="btn btn-success mostrar_datos" id="mostrar_datos" data-toggle="modal" data-target="" href="editar_denuncia_usuario.php"
   title="Editar estado"><i class="fas fa fa-pencil"></i>
    </button>
      <button type="button" class="btn btn-danger vista_denuncia" id_denu="<?php echo $fetch["lista_denuncia_id"];?>" cl="<?php echo $fetch["lista_denuncia_id"];?>" data-toggle="modal" data-target="" 
    title="Pdf"><i class="fas fa fa-print"></i>
    </button>
</td>
     
          
    

         
    
          
        </tr>
      
    <?php 
        
}
      
     ?>

</tbody>
    </table>
    </div>
  </div>
 
    <!-- Button trigger modal -->
   
</section>
<!--modal de editar reporte-->
   <div class="modal fade" id="modal_editar_reporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
 
  
  </div>
  <div class="modal-body">
    <?php include "editar_denuncia_usuario.php";?>
  </div>
  <div class="modal-footer">
 
  </div>
  </div>
  </div>
  </div>
  </div>

  
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Agregar evidencia</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<label>Código de denuncia</label>
<input type="" id="id_denuncia" class="form-control input-lg id_denuncia ">
<br>
<div class="input-group multimediaVirtual" style="display:none">
<span class="input-group-addon"><i class="fa fa-youtube-play"></i></span> 
<input type="text" class="form-control input-lg multimedia" placeholder="Ingresar código video youtube">
</div>
<div class="multimediaFisica">
<div class="dz-message needsclick">
Arraste la imagen
</div>
</div>
<div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary cargar_evidencia" data-dismiss="modal" >Enviar</button>
</div>
</div>
</div>
<div>
</div>
</div>
        

<!--modal ver evidencia--> 

<!--incluimos footer--> 
<?php include "includes_usuario/footer.php"; ?>
</body>


<script src="carga_evidencia.js"></script>
<script src="../datatables/DataTable/js/jquery.dataTables.min.js"></script>
<script src="../datatables/DataTable/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<!--aca llama a datatables y le pasamos el nombre de la tabla-->
<script type="text/javascript" >
$(document).ready(function() {
    $('#table').DataTable( {

    language:{
          url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        }
    });
    responsive: true

});
</script>
 <!--modal de ver evidencia-->


 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel2">Evidencia</h>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<form action="ver_evidencia.php" method="POST">
<label>Código de denunncia</label>
<input type="number" id="id_denuncia2" name="id_denuncia2" class="form-control input-lg id_denuncia" >
<br>

<button type="submit" class=" btn btn-primary">Ver</button>
</form>
</div>
<div class="input-group multimediaVirtual" style="display:none">
<span class="input-group-addon"><i class="fa fa-youtube-play"></i></span> 
<input type="text" class="form-control input-lg multimedia" placeholder="Ingresar código video youtube">
</div>

<script type="text/javascript">

      var datos;
      $(document).on("click",".mostrar_datos",function()
      {
      datos=$(this).closest("tr");
      lista_denuncia_id=datos.find('td:eq(0)').text();
      id_tipo_maltrato=datos.find('td:eq(5)').text();
      descripcion=datos.find('td:eq(1)').text();
      celular=datos.find('td:eq(3)').text();
    
      id=datos.find('td:eq(6)').text();
      
      $("#lista_denuncia_id").val(lista_denuncia_id);
       $("#id_tipo_maltrato").val(id_tipo_maltrato);
      $("#descripcion").val(descripcion);
      $("#celular").val(celular);

       $("#id").val(id);
      $("#modal_editar_reporte").modal("show");
    

      }
      
      );

      </script>
      <style type="text/css">
        .tabla{
          max-width: 100%;
          overflow-x: scroll;

        }
        
      </style>
<script type="text/javascript">
  //PDF
$('.vista_denuncia').click(function(e) {
  

  var id_denuncia = $(this).attr('id_denu');
 



  generarPDF(id_denuncia);
});
function generarPDF(id_denuncia) {
  var ancho = 1000;
  var alto = 1000;
  //calcular posicion x, y para centrar la ventana
  var x = parseInt((window.screen.width/2) - (ancho / 2));
  var y = parseInt((window.screen.height/2) - (alto / 2));

  $url = 'vista_denuncia_pdf/detalle_denuncia.php?id_denu='+id_denuncia;
  window.open($url,"Factura","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}


</script>

  </body>
  </html>
 


   
  