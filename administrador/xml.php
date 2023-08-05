<?php
require("../conexion.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}


// Select all the rows in the markers table
$query = "SELECT r.lista_denuncia_id , r.descripcion, r.celular, r.fecha, r.observacion,r.latitud, r.longitud, r.latitud, r.longitud,  usu.usuario_cod,
     usu.nombre_usu, usu.apellido, re.nombre, re.id_estado, tm.id_tipo_maltrato,tm.nombres
        FROM lista_denuncia r
        INNER JOIN usuarios usu ON  r.usuario_id = usu.usuario_id
        INNER JOIN estados re ON  r.id_estado = re.id_estado
        INNER JOIN tipo_maltrato tm ON  r.id_tipo_maltrato = tm.id_tipo_maltrato
        WHERE r.id_estado='1'
        ORDER BY lista_denuncia_id";
$result = mysqli_query($conection,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'lista_denuncia_id="' . $row['lista_denuncia_id'] . '" ';
  echo 'descripcion="' . parseToXML($row['descripcion']) . '" ';
  echo 'nombres="' . parseToXML($row['nombres']) . '" ';
  echo 'celular="' . parseToXML($row['celular']) . '" ';
  echo 'latitud="' . $row['latitud'] . '" ';
  echo 'longitud="' . $row['longitud'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';

?>
