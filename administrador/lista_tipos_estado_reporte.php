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
	 <?php include "includes_admin/scripts_admin.php"; ?>
	<section id="container">
		<h1>Tipos de estados de reporte</h1>
		  <br>
		  <br>
<!DOCTYPE html>
<html>
<head>
 <style>
  /* Estilos para el modal */

  .modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
  }

  .modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    border-radius: 5px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
  }

  .modal-header {
    background-color: #3498db;
    /* Cambia el color de fondo a celeste */
    color: #fff;
    /* Cambia el color del texto a blanco */
    padding: 10px;
    border-radius: 5px 5px 0 0;
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: #fff;
    text-decoration: none;
    cursor: pointer;
  }

  .modal-buttons {
    text-align: right;
    margin-top: 20px;
  }

  .modal-buttons button {
    padding: 8px 12px;
    margin-left: 5px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .modal-buttons button:hover {
    background-color: #217dbb;
  }

  .modal-buttons button:last-child {
    margin-left: 0;
  }

  /* Estilos para pantallas más pequeñas */
  @media (max-width: 768px) {
    .modal-content {
      width: 90%;
    }

    .modal-buttons {
      text-align: center;

    }

    .modal-buttons button {
      margin: 10px;
    }
    .boton_cancelar{
       width: 100%;
    display: block;
    margin-bottom: 10px;

    }
    .boton_agregar{
       width: 100%;
    display: block;
    margin-bottom: 10px;
    }
  }
</style>

</head>
<body>
  <!-- Botón para abrir el modal -->
  <button id="openModalBtn" type="button" class="btn btn-success efecto" data-toggle="modal" data-target="#myModal" title="Datos personales">Agregar</button>
  

  <!-- Modal 
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <form id="tipoMaltratoForm" action="agregar_tipo_maltrato.php" method="POST">
        <h3>Tipo de Maltrato animal</h3>
        <label for="nombres">Nombre:</label>
        <input type="text" name="nombres" id="nombres">
        <br>
        <button class="btn btn-primary btn_agregar_tipo_maltrato" type="submit">Agregar</button>
      </form>
    </div>
  </div>
-->
   <div id="myModal" class="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar tipo de estado de reporte</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="tipoMaltratoForm" action="agregar_tipo_estado_reporte.php" method="POST">
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" name="nombres" id="nombres" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary boton_agregar">Agregar</button>
              <button type="button" class="btn btn-secondary boton_cancelar" data-dismiss="modal">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Obtener el modal
    var modal = document.getElementById("myModal");

    // Obtener el botón que abre el modal
    var btn = document.getElementById("openModalBtn");

    // Obtener el elemento de cierre del modal
    var span = document.getElementsByClassName("close")[0];

    // Cuando se hace clic en el botón, abrir el modal
    btn.onclick = function() {
      modal.style.display = "block";
    };

    // Cuando se hace clic en el elemento de cierre, cerrar el modal
    span.onclick = function() {
      modal.style.display = "none";
    };

    // Cuando se hace clic fuera del modal, cerrarlo
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    };

    // Validar el formulario antes de enviarlo
    var form = document.getElementById('tipoMaltratoForm');

    form.addEventListener('submit', function(event) {
      event.preventDefault();

      var nombresInput = document.getElementById('nombres');
      var nombres = nombresInput.value;

      // Verificar si el campo está vacío
      if (nombres.trim() === '') {
        alert('Por favor, ingresa un nombre para el tipo de maltrato.');
        return;
      }

      // Realizar una solicitud AJAX para validar el nombre estado
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'validar_tipo_estado.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var response = xhr.responseText;
            if (response === 'existe') {
              alert('El estado ya existe');
            } else if (response === 'ok') {
              // El tipo de estado es válido, puedes enviar el formulario
              form.submit();
            } else {
              alert('Error al validar el tipo de estado');
            }
          } else {
            alert('Error en la solicitud AJAX');
          }
        }
      };
      xhr.send('nombres=' + encodeURIComponent(nombres));
    });
  </script>
</body>
</html>


        
    
	
 	<div class="tabla" style="margin:0 auto;text-align:center;">
		<div class="box-body">
			<table id="table" class="table  table-bordered .table-striped thead-dark" >
		<thead>

		<tr>
		<th>Id</th>
		<th>Nombre</th>
		
		<th>Acciones</th>
		</tr>

		</thead>
		<tbody>
		<?php 
			//Paginador
			
		$consulta= mysqli_query($conection,"SELECT * FROM estados");
		
		
		while($fetch = mysqli_fetch_array($consulta)){
		?>
				
		<tr>
		<td><?php echo $fetch["id_estado"]; ?></td>
		<td><?php echo $fetch["nombre"]; ?></td>
		
		
		
		
		<td>
		<button  class="btn btn-danger delete" data="<?php echo $fetch["id_estado"]; ?>"   title="Eliminar"><i class="fas fa-trash-alt"></i></button>
			<button type="button" class="btn btn-success mostrar_datos" id="mostrar_datos" data-toggle="modal" data-target="" href="editar_tipo_estado.php"
     title="Editar estado"><i class="fas fa fa-pencil"></i>
    </button>



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

   	<!--modal de editar tipo maltrato-->
   <div class="modal fade" id="modal_editar_estado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
 
  
  </div>
  <div class="modal-body">
    <?php require_once "editar_tipo_estado_reporte.php";?>
    
  </div>
  <div class="modal-footer">
 
  </div>
  </div>
  </div>
  </div>
	
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
    text:'¡ Una vez eliminado, no podrá recuperar!',
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
   		 text:'Estas seguro de eliminarlo',
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
    url:"eliminar_tipo_estado_reporte.php",
    type:"POST",
    data: dataString,
    beforeSend: function()
    {
    swal({
    text:'¡Tipo de estado eliminado!',
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
 <script type="text/javascript">

  var datos;
      $(document).on("click",".mostrar_datos",function()
      {
    datos=$(this).closest("tr");
    id_estado=datos.find('td:eq(0)').text();
    nombre_estado=datos.find('td:eq(1)').text();
    
      $("#id_estado").val(id_estado);
      $("#nombre").val(nombre_estado);
      
      $("#modal_editar_estado").modal("show");
     

      }
      );
  </script>
<?php include "includes_admin/footer_admin.php"; ?>

			<!-- Modal -->
		
