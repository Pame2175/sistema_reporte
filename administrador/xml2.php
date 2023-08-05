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
$query = "SELECT * FROM lista_denuncia ";
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
  echo 'usuario="' . $row['lista_denuncia_id'] . '" ';
  echo 'descripcion="' . parseToXML($row['descripcion']) . '" ';
  echo 'direccion="' . parseToXML($row['direccion']) . '" ';
  echo 'latitud="' . $row['latitud'] . '" ';
  echo 'longitud="' . $row['longitud'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';

?>
