	<script src="files/plugins/sweetalert2/sweetalert2.all.js"></script>
	<?php 
	session_start();
	include "../conexion.php";	

 	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<script src="js/jquery-3.5.1.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="../datatables/DataTable/css/dataTables.bootstrap.min.css">
  	<link rel="stylesheet" href="../datatables/DataTable/css/dataTables.bootstrap4.css">
  	<!-- llamada al estilo css de datatables -->
  	<link rel="stylesheet" href="../datatables/DataTable/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
    <title>Inicio</title>
      
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	</head>
	<body>
	<?php include "includes_admin/header_admin.php"; ?>
	 <?php include "includes_admin/scripts_admin.php"; ?>
	<section id="container">
		<h1>Usuarios Suspendidos</h1>
		  <br>
		  <br>

		
		
		<!--<form action="" method="" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<input type="submit" value="Buscar" class="btn_search">
		</form>-->
 	<div class="tabla" style="margin:0 auto;text-align:center;">
		<div class="box-body">
			<table id="table" class="table  table-bordered .table-striped thead-dark" >
		<thead>

		<tr>
		<th>Id</th>
		<th>Cédula de identidad</th>
		<th>Nombre</th>	
		<th>Apellido</th>
		<th>Rol</th>
		<th>Estado</th>
		<th></th>
		<th>Acciones</th>
		</tr>

		</thead>
		<tbody>
		<?php 
			//Paginador
			
		$consulta= mysqli_query($conection,"SELECT * FROM usuarios WHERE usuario_id='$_SESSION[denunciante]'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($consulta);
		$usuario_cod = $fetch['usuario_cod'];
		$query = mysqli_query($conection, "SELECT r.usuario_id, r.usuario_cod, r.nombre_usu , r.apellido, r.status, r.estado, re.rol, re.id_rol
		FROM usuarios r
		INNER JOIN roles re ON  r.id_rol = re.id_rol
		WHERE r.id_rol='2' and r.estado='2' ") or die(mysqli_error());
		while($fetch = mysqli_fetch_array($query)){
		?>
				
		<tr>
		<td><?php echo $fetch["usuario_id"]; ?></td>
		<td><?php echo $fetch["usuario_cod"]; ?></td>
		<td><?php echo $fetch["nombre_usu"]; ?></td>
		<td><?php echo $fetch["apellido"]; ?></td>
		<td><?php echo $fetch["rol"]; ?></td>
		<td><?php echo $fetch["status"]; ?></td>
		<td>
		<?php
		if($fetch['rol']=="usuario"){
		if($fetch['estado']==1){
		echo'<p>
		<a href="estado_usuario_suspendido.php?usuario_id='.$fetch['usuario_id'].'&estado=2"  style="background: green; color:white ; text-decoration:none;" >Activado</a></p>';
		}else
		{
		echo'<p><a href="estado_usuario_suspendido.php?usuario_id='.$fetch['usuario_id'].'&estado=1" style="background: red; color:white;text-decoration:none;">Desactivado</a></p>';
		
		}
	}
	else{
		echo'<p>
		<a href="estado_usuario_suspendido.php?usuario_id='.$fetch['usuario_id'].'&estado=2"  style="background: green; color:white ; text-decoration:none;" >Activado</a></p>';
	}
		
		?>
		</td>
		<td>
		
		

		<button  class="btn btn-danger delete" data="<?php echo $fetch["usuario_id"]; ?>" rol="<?php echo $fetch["id_rol"]; ?>" estado="<?php echo $fetch["estado"]; ?>" estado="<?php echo $fetch["usuario_cod"]; ?>"  cedula="<?php echo $fetch["usuario_cod"]; ?>"  title="Eliminar"><i class="fas fa-trash-alt"></i></button>


		</td>
		
		</tr>
		
			
		<?php 
		}
		?>

		</tbody>
		</table>
	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	
	</div>
					
	<div class="modal-body">
	¿Esta seguro que desea eliminar este registro?
	</div>
					
	<div class="modal-footer">
	<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
	<a class="btn btn-danger btn-ok">Eliminar</a>
	</div>
	</div>
	</div>
	</div>

	
	<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>
	</section>
	</section>
		
	</div>

<style type="text/css">
  	 .tabla{
          max-width: 100%;
          overflow-x: scroll;
          
        }
         .modal-header{
      background: #17a2b8;
    }
  </style>
	
		<!--incluimos el footer-->
	<div class="alert alert-success" style="display:none;"></div>
		</body>
		<script src="files/bower_components/jquery/dist/jquery.min.js"></script>
		<script src="files/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="../datatables/DataTable/js/jquery.dataTables.min.js"></script>
		<script src="../datatables/DataTable/js/dataTables.bootstrap4.min.js"></script>
		<!--LLama a datatables y le pasa el nombre de la tabla-->
		<script type="text/javascript" >
		$(document).ready(function() {
    	$('#table').DataTable( {
    	language:{
         url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        }
    	});

		});


		</script>

<script type="text/javascript">
$(document).on("click",".delete",function(e) {
  swal({
    title: 'Estás seguro?',
    text:'¡ Una vez eliminado, no podrá recuperar este usuario!',
    type: 'warning',
    cancelButtonText:'Cancelar',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'SI, Eliminar!'
  }).then((result) =>{
  if (result.value)
  {
 
  var idrol=$(this).attr('rol');
  	if (idrol==1 ) {
    swal({
    text:'Usted es admin no se puede eliminar',
    type: 'warning',
    cancelButtonText:'Cancelar',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'De Acuerdo!'

  })
  }

   
  else{
  	 	var estados=$(this).attr('estado');
   		if (estados==1) {
   		swal({
   		 text:'El usuario esta activado, no puede eliminarlo',
        type: 'warning',
       cancelButtonText:'Cancelar',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'De Acuerdo!'
     	})
  		}
  		else{
  var idsuario= $(this).attr('data');
  var dataString = 'idusuario='+idsuario;

  $.ajax({
    url:"eliminar_usuario.php",
    type:"POST",
    data: dataString,
    beforeSend: function()
    {
    swal({
    text:'¡Usuario eliminado exitosamente!',
    type: 'success',
    cancelButtonText:'Cancelar',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'De Acuerdo!'
  }).then(function(response){
    if (response.value) {
      location.reload();
    }


  });
    }
     
    });

}
}
}
});
});

      
 
</script>
<?php include "includes_admin/footer_admin.php"; ?>

			<!-- Modal -->
		
