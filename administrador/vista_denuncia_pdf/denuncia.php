<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Denuncia</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/jquery-3.5.1.js"></script>
   <link rel="stylesheet" href="files/bower_components/bootstrap/dist/css/bootstrap.min.css"> 

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZwv-model-vue1T" crossorigin="anonymous">


      

    </header>
    <main>
    <table  border="2" style="width: 100%; " class="table table-bordered">
      <tr>
     <td colspan="6">
      <center><h1>Datos del reporte</h1></center>
     
     </td>
      
      </tr>
      <tr >
        <td class="titulo">Fecha:</td>
        <td class="des"><?php echo  $fecha;?></td>
        <td class="titulo" colspan="2">Estado de la denuncia:</td>
        <td class="qty" colspan="2"><?php echo $denuncia['nombre']; ?></td>
      </tr>
      <tr>
        <td class="titulo">Cedula de idenntidad:</td>
        <td class="desc"><?php echo $denuncia['usuario_cod']; ?></td>
        <td class="titulo">Nombre del denunciante:</td>
        <td class="qty"><?php echo $denuncia['nombre_usu']; ?></td>
       
        <td class="titulo">Celular:</td>
        <td class="qty"><?php echo $denuncia['celular']; ?></td>
      
      </tr>
      <tr>
        <td  class="titulo">Tipo de maltrato:</td>
        <td><?php echo $denuncia['nombres']; ?></td>
        <td class="titulo">Latitud:</td>
        <td><?php echo $denuncia['latitud']; ?></td>
        <td class="titulo">Longitud:</td>
        <td><?php echo $denuncia['longitud']; ?></td>
      </tr>
      <tr>
        <td class="titulo" colspan="6">Descripcion:</td>
       
      </tr>
      <tr >
         <td colspan="6"><?php echo $denuncia['descripcion']; ?></td>
      </tr>
      <tr>
        <td class="titulo" colspan="6">Observacion:</td>
        
      </tr>
      <tr>
        <td colspan="6"><?php echo $denuncia['observacion']; ?></td>
      </tr>
       <tr>
        <td class="titulo" colspan="6">Direccón:</td>
        
      </tr>
      <tr>
      
    <td colspan="6" style="width: 100px; height: 100px;">
    <?php 
    $latitud= $denuncia['latitud'];
    $longitud= $denuncia['longitud'];
    $address = $latitud.",".$longitud;
    $imagen = "http://maps.googleapis.com/maps/api/staticmap?center=".$latitud.",".$longitud."
    &size=640x400&markers=color:red%7C".$latitud.",".$longitud."&key=AIzaSyBJ9R8F78Mn4umTxFYm0rWfZAsjf-D3Iqw";
    echo "<center><img src='".$imagen."'></center>";
     ?>
    
     
     </td>
   
      
        </td>
      </tr>
    </table>
    <center>
      <br>
      <br>
    <h3>Evidencias</h3>
    </center>
       <?php
    foreach ($consulta_imagenes as $value )
         {
        $multimedia=json_decode($value["enlace"],true);
        foreach ($multimedia as $fetch )
         {?>
        
     

            <img  id="img" src="../<?php echo $fetch["foto"]?>" style="width:100%;">
        
        <?php
         }
        }
    
    ?>
    </main><br><br>
   
  </body>
</html>
<style type="text/css">
  .titulo{
    font-weight: bold;
    font-family:Times New Roman,arial,helvética;
  }
  .
</style>