  <?php 
  session_start();
  include "../conexion.php";  
  
  include "includes_usuario/scripts.php";
  ?>


  <!DOCTYPE html>
  <html lang="en">
  <script src="js/jquery-3.5.1.js"></script>
  <meta charset="UTF-8">

    <link rel="stylesheet" href="css/registro_usuario.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <title>Formulario de reporte</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Librerias de Bootstrap -->
  <link rel="stylesheet" href="files/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!--  Libreria de Font Awesome -->
  <link rel="stylesheet" href="files/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="files/bower_components/Ionicons/css/ionicons.min.css">

  <script src="files/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="files/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="files/plugins/sweetalert2/sweetalert2.all.js"></script>

  </head>
  <body onload="getLocation();">
    <style>
    .alerta {
      color: white;
      background-color: red;
      padding: 10px;
      font-weight: bold;
    }
     h1 {
      color: black;
      font-size: 20px;
      background-color: #e9ecef;
    }
    form {
    width: 1200px;
    margin: 0 auto;
}

  </style>

    <?php include "includes_usuario/header.php";?>
  <b>
  <div class="input-group multimediaVirtual" style="display:none">
  </div>
  <div class="multimediaFisica">
  <form class="formulario_denuncia" style="overflow-x: scroll;">
  <center>
  <h1 style = "font-family:arial,arial,helvética;">Formulario de reporte</h1> 
  </center>
  <form>
 <div class="alerta">
    "Advertencia: La denuncia falsa es un delito y puede resultar en acciones legales, de acuerdo a la ley de protección animal en Paraguay."
  </div>
  <label>Descripción del reporte *</label>
  <textarea type="text" id="descripcion" class="form-control input-lg descripcion"  placeholder="Ej:detalle" ></textarea>


  <div class="" id="grupo__celular">
  <label for="celular" class="formulario__label">Celular:</label>
  <div class="formulario__grupo-input">
  <input type="text" class="form-control input-lg celular" name="celular" id="celular" placeholder="Ej:0985456789">
  <i class="formulario__validacion-estado fas fa-times-circle"></i>
  </div>
          
  <p class="formulario__input-error">Solo permite numero de 10 digitos.</p>
  </div>
   

    <div class="form-group">
        <label>Coordenadas de la ubicación</label>
        <div class="row">
          <div class="col-md-6">
            <label>Latitud</label>
            <input type="text" class="form-control input-lg latitud" id="latitud" name="latitud" disabled="">
          </div>
          <div class="col-md-6">
            <label>Longitud</label>
            <input type="text" class="form-control input-lg longitud" id="longitud" name="longitud" disabled="">
          </div>
        </div>
      </div>
  <center>

    <label>Arrazte para seleccionar la ubicación</label>
    
    <div class="row"  style="width: 100%; height: 30%;">
    <div class="col-md-12">
    <div  id="mapa" style="width: 95%; height: 200px;"></div>
    </div>
    </div>
    </center>

    
 
    <input type="hidden" class="form-control input-lg usuario_id" value="<?php echo $fetch['usuario_id']?>" placeholder="escribe su numero de cedula">
    
    
    <div class="form-group" >
    <br>
    <label>Estado del reporte</label>
    <?php
    $query_estados = mysqli_query($conection, "SELECT id_estado, nombre FROM estados");
    $resultado_estados= mysqli_num_rows($query_estados);
    ?>
    <select disabled="" id="estados" name="estados" class="form-control estados" required="">
    <?php
    if ($resultado_estados > 0)
    {
    while ($estados= mysqli_fetch_array($query_estados)) 
    {
    ?>
    <option value="<?php echo $estados['id_estado']; ?>"><?php echo $estados['nombre']; ?></option>
    <?php
    }
    }
    ?>
    </select>
    <label>Tipos de maltrato animal *</label>
    <?php
    $query_maltrato = mysqli_query($conection, "SELECT id_tipo_maltrato, nombres FROM
    tipo_maltrato");
    $resultado_maltrato= mysqli_num_rows($query_maltrato);
    mysqli_close($conection);
    ?>

    <select  id="id_tipo_maltrato" name="id_tipo_maltrato" class="form-control id_tipo_maltrato">
    <?php
    if ($resultado_maltrato > 0) {
    while ($id_tipo_maltrato= mysqli_fetch_array($query_maltrato)) {
    ?>
    <option value="<?php echo $id_tipo_maltrato['id_tipo_maltrato']; ?>"><?php echo $id_tipo_maltrato['nombres']; ?></option>
    <?php
    }
    }
    ?>
    </select>
    <br>
     <button type="button" value="Guardar" class="btn btn-success guardar_denuncia">
    Enviar</button> 
    </div>
  </form>
    </div>
    </div>
    </div>
    <div>
    </div>
    </div>
    </form>
<script type="text/javascript">
     function getLocation(){
        if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(showPosition);
        }

    }
    function showPosition(position){
        document.querySelector('.formulario_denuncia input[name = "latitud"]').value = position.coords.latitude;
        document.querySelector('.formulario_denuncia input[name = "longitud"]').value = position.coords.longitude;
    }
    </script>
 








    <?php include "includes_usuario/footer.php"; ?>

    </body>
        

    <script src="guardar_denuncia.js" type="text/javascript"></script>
    </html>
    <script>

    function iniciarMapa(){
    var latitud = -27.33116999529115;
    var longitud = -55.8611768359375;
    coordenas = {
      lng: longitud,
      lat: latitud
    }
    generarMapa(coordenas);
    }
    function generarMapa(coordenadas){
    var mapa = new google.maps.Map(document.getElementById('mapa'),
    {
    zoom : 14,
    center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
    });
    marcador = new google.maps.Marker(
    {
    map: mapa,
    draggable: true,
    position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
    });
    marcador.addListener('dragend',function(event){
    document.getElementById("latitud").value = this.getPosition().lat();
    document.getElementById("longitud").value = this.getPosition().lng();
    })
    }

    </script>
      
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ9R8F78Mn4umTxFYm0rWfZAsjf-D3Iqw&callback=iniciarMapa"></script>

    <style type="text/css">
    .formulario_denuncia{
    padding: 50px 50px;
    border-radius: 2px;
    overflow-x: scroll;
    } 
    .guardar_denuncia{
    float: right;
    }

    </style>
    <style type="text/css">
      input{
        border: #ccc;
      }
    </style>