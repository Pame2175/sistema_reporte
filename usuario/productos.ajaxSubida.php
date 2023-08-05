<?php
	include '../conexion.php';
	#RECIBIR ARCHIVOS MULTIMEDIA
#-----------------------------------------------------------
	if(isset($_POST["multimedia"])){

		$sql =  $conection->query("INSERT INTO imagen(id_denuncia,enlace) VALUES('".$_POST["id_denuncia"]."','".$_POST["multimedia"]."') ");

		if ($sql) {
			echo "ok";
		}else{	
			echo "error";
		}


	}


