
  <?php 
	session_start();
	include "../conexion.php";	
			

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script src="js/jquery-3.5.1.js"></script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

	<?php include "includes_admin/scripts_admin.php"; ?>
	
	<link rel="stylesheet" href="../datatables/DataTable/css/dataTables.bootstrap.min.css">
  	<link rel="stylesheet" href="../datatables/DataTable/css/dataTables.bootstrap4.css">
  	<!-- llamada al estilo css de datatables -->
  	<link rel="stylesheet" href="../datatables/DataTable/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
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

</head>
<body>
	
	<?php include "includes_admin/header_admin.php"; ?>
 <div class="tabla">
      
	<section id="container">
		
		<h1 style = "font-family:arial,arial,helvética;">Listas de Reportes</h1>
		
		<!--<form action="" method="" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<input type="submit" value="Buscar" class="btn_search">
		</form>-->
		<div class="box-body">
		<table id="table" class="table  table-bordered .table-striped thead-dark" style="height: 80%; width:100%; ">
			<thead>
			<tr>
			<th>Código de denuncia</th>
      <th>Cedúla de identidad</th>
      <th>Nombre denunciante</th>
      <th>Apellido denunciante</th>
      <th>Celular</th>
      <th>Tipo maltrato</th>	
			
      <th>Ubicación</th>
			<th>Estado</th>
      <th>Fecha</th>
      <th>Observacion</th>
			<th>Acciones</th>
			<th style="display:none">idmal:</th>
				
			</tr>
		</thead>
		<tbody>
		<?php 
			
			$consulta= mysqli_query($conection,"SELECT * FROM usuarios WHERE usuario_id='$_SESSION[denunciante]'") or die(mysqli_error());
			$fetch = mysqli_fetch_array($consulta);
			$denunciante_cod = $fetch['usuario_cod'];





		$query = mysqli_query($conection, "SELECT r.lista_denuncia_id , r.descripcion, r.celular, r.fecha, r.observacion,r.latitud, r.longitud, r.latitud, r.longitud,  usu.usuario_cod,
     usu.nombre_usu, usu.apellido, re.nombre, re.id_estado, tm.id_tipo_maltrato,tm.nombres
        FROM lista_denuncia r
        INNER JOIN usuarios usu ON  r.usuario_id = usu.usuario_id
        INNER JOIN estados re ON  r.id_estado = re.id_estado
        INNER JOIN tipo_maltrato tm ON  r.id_tipo_maltrato = tm.id_tipo_maltrato
        ORDER BY lista_denuncia_id") or die(mysqli_error());
			while($fetch = mysqli_fetch_array($query)){
			

						

						
			?>
				
				<tr>
			<td><?php echo $fetch["lista_denuncia_id"];?></td>
      <td><?php echo $fetch["usuario_cod"];?></td>
      <td><?php echo $fetch["nombre_usu"];?></td>
      <td><?php echo $fetch["apellido"];?></td>
      <td><?php echo $fetch["celular"];?></td>
			<td><?php echo $fetch["nombres"];?></td>
			
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
			<td style="display:none"><?php echo $fetch["id_estado"];?></td>
      <td><?php echo date("d-m-Y H:i:s", strtotime($fetch["fecha"]));?></td>
		<?php
   
    if(!empty($fetch['observacion'])){?>
    <td class="columna" style="background: green"><?php echo $fetch["observacion"];?></td>
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
					
   
		<button type="button" class="btn btn-success mostrar_datos" id="mostrar_datos" data-toggle="modal" data-target="" href="editar.php"
     title="Editar estado"><i class="fas fa fa-pencil"></i>
    </button>
    <button type="button" class="btn btn-info mostrar_evidencia" id="<?php echo $fetch["lista_denuncia_id"];?>" data-toggle="modal" data-target="#exampleModal2" title="Ver evidencia">
    <i class="fa fa-eye"></i>
   </button>
   <button type="button" class="btn btn-danger vista_denuncia" id_denu="<?php echo $fetch["lista_denuncia_id"];?>" cl="<?php echo $fetch["lista_denuncia_id"];?>" data-toggle="modal" data-target="" 
    title="Pdf"><i class="fas fa fa-print"></i>
    </button>


				
		</td>

   
  
  
  </form>
	</tr>
			
	<?php 
				
  }
			
	?>

</tbody>
		</table>
    
		
 
		<!-- Button trigger modal -->
</section>
		</div>


	</section>
<style>
	.imagen{
		width: 500px;
		height: 200px;
	}
</style>





<!--modal de editar reporte-->
   <div class="modal fade" id="modal_editar_reporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
 
  
  </div>
  <div class="modal-body">
    <?php require_once "editar.php";?>
  </div>
  <div class="modal-footer">
 
  </div>
  </div>
  </div>
  </div>
    <?php include "includes_admin/footer_admin.php"; ?>




 <!--editar estado-->
</body> 
</script>
<script src="files/bower_components/jquery/dist/jquery.min.js"></script>
<script src="files/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">

</script>
<script src="carga_evidencia.js"></script>
<script src="../datatables/DataTable/js/jquery.dataTables.min.js"></script>
<script src="../datatables/DataTable/js/dataTables.bootstrap4.min.js"></script>
<!--aca llama a datatables y le pasamos el nombre de la tabla-->
<script type="text/javascript" >
$(document).ready(function() {
    $('#table').DataTable( {
    language:{
          url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        }
    });

});
</script>
<div class="modal fade" id="mostrar_evidencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3">Evidencia</h>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  
      <div class="modal-body">
       <form action="ver_evidencia.admin.php" method="POST">
    <label>Código de reporte</label>
     <input type="number" id="id_denuncia3" name="id_denuncia3" class="form-control input-lg id_denuncia" >
     <br>
     
      
<button type="submit" class=" btn btn-primary">Ver</button>

       </form>
      </div>
  <div class="input-group multimediaVirtual" style="display:none">
  <span class="input-group-addon"><i class="fa fa-youtube-play"></i></span> 
  <input type="text" class="form-control input-lg multimedia" placeholder="Ingresar código video youtube">
  </div>
  <script type="text/javascript">
 var evidencia;
$(document).on("click", ".mostrar_evidencia", function(){
evidencia= $(this).closest("tr");
imagen=evidencia.find('td:eq(0)').text();

$("#id_denuncia3").val(imagen);
$("#mostrar_evidencia").modal("show");

});
  </script>
    <script type="text/javascript">
 var evidencia;
$(document).on("click", ".mostrar_geo", function(){
evidencia= $(this).closest("tr");
imagen=evidencia.find('td:eq(0)').text();

$("#id_denuncia").val(imagen);
$("#mostrar_geo").modal("show");

});
  </script>
  <style type="text/css">
     .tabla{
          max-width: 100%;
          overflow-x: scroll;
        }
  </style>
  
  <script type="text/javascript">

      var datos;
      $(document).on("click",".mostrar_datos",function()
      {
    datos=$(this).closest("tr");
    lista_denuncia_id=datos.find('td:eq(0)').text();
    nombre_estado=datos.find('td:eq(4)').text();
    id_estado=datos.find('td:eq(8)').text();
    observacion=datos.find('td:eq(10)').text();
      
      $("#lista_denuncia_id").val(lista_denuncia_id);
      $("#nombre_estado").val(nombre_estado);
      $("#id_estado").val(id_estado);
      $("#observacion").val(observacion);
      $("#modal_editar_reporte").modal("show");
     

      }
      );

      var foto;
$(document).on("click", ".mostrar_evidencia", function(){
foto = $(this).closest("tr");
imagen=foto.find('td:eq(0)').text();

$("#id_denuncia2").val(imagen);
$("#exampleModal2").modal("show");

});
</script>
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


</html>
	<!-- se llama a la libreria de datatable -->


