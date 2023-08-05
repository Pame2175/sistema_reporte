


<script src="files/plugins/sweetalert2/sweetalert2.all.js"></script>

<?php
include "../conexion.php";  


    
$lista_denuncia_id = $_POST['lista_denuncia_id'];
$descripcion= $_POST['descripcion'];
$celular= $_POST['celular'];
$id_tipo_maltrato= $_POST['id'];

  
   
$query_update = ("UPDATE lista_denuncia SET descripcion =  '$descripcion', celular =  ' $celular', id_tipo_maltrato =  ' $id_tipo_maltrato' WHERE lista_denuncia_id = '$lista_denuncia_id' ");
    
    $query_resultado = mysqli_query($conection, $query_update);

if ($query_update) {
	header("location: lista_denuncias.php");
	 /*echo'<script>
      swal({
        type:"warning",
        title:"Aún no agregado evidencia",
        showConfirmButton:true,
        confirmButtonText:"Cerrar"


        }).then(function(){
          window.location="lista_denuncias_admin.php";
          });

    </script>';*/
}





?>