<?php
session_start();
	include "../../conexion.php";
	require_once '../dompdf/autoload.inc.php';
	use Dompdf\Dompdf;
	use Dompdf\options;
	ob_start();
	if(empty($_REQUEST['id_denu']))
	{
		echo "No es posible generar la factura.";
	}else{
		$id_denuncia = $_REQUEST['id_denu'];

	 	$consulta_imagenes= mysqli_query($conection,"SELECT * FROM imagen where id_denuncia=".$_REQUEST['id_denu']."") or die(mysqli_error());
 		//mysqli_num_rows trae una fila de datos
 		$datos=mysqli_fetch_array( $consulta_imagenes);

 	
        
		

		$sql=mysqli_query($conection,"SELECT l.lista_denuncia_id,l.descripcion, l.celular,l.fecha,l.observacion,l.latitud,l.longitud,usu.usuario_cod,
     usu.nombre_usu, usu.apellido,e.id_estado, e.nombre,tm.nombres FROM lista_denuncia l 
			INNER JOIN usuarios usu ON  l.usuario_id = usu.usuario_id
			INNER JOIN estados e ON l.id_estado = e.id_estado 
			INNER JOIN tipo_maltrato tm ON  l.id_tipo_maltrato = tm.id_tipo_maltrato
			WHERE lista_denuncia_id=".$_REQUEST['id_denu']."");

		
		$resultado = mysqli_num_rows($sql);
		if($resultado > 0){

			$denuncia = mysqli_fetch_assoc($sql);
			
			$fecha = date_create($denuncia["fecha"])->format("d-m-Y");
			
		    include(dirname('__FILE__').'/denuncia.php');
		    $dompdf = new Dompdf();
		    $html = ob_get_clean();
		    $options=$dompdf->getOptions();
		    $options->set(array('isRemoteEnabled'=> true));
		    $dompdf->setOptions($options);
			// instantiate and use the dompdf class
			$dompdf->loadHtml($html);
			// (Optional) Setup the paper size and orientation
			$dompdf->set_paper('A4', 'portrait');
			// Render the HTML as PDF
			$dompdf->render();
			// Output the generated PDF to Browser
			$dompdf->stream('denuncia_'.$id_denuncia.'.pdf',array('Attachment'=>0));
			exit;
		}
	
}
?>
