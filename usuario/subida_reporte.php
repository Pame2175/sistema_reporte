<?php
	include '../conexion.php';
	#Obtener datos y enviar en la base de datos
#-----------------------------------------------------------
	if(isset($_POST["descripcion"])){

		$sql =  $conection->query("INSERT INTO lista_denuncia(descripcion,celular
			,latitud,longitud,usuario_id,id_estado,id_tipo_maltrato) VALUES('".$_POST["descripcion"]."','".$_POST["celular"]."','".$_POST["latitud"]."','".$_POST["longitud"]."','".$_POST["usuario_id"]."','".$_POST["estados"]."','".$_POST["id_tipo_maltrato"]."') ");
		if ($sql) {
			echo "ok";
		}else{	
			echo "error";
		}


	}