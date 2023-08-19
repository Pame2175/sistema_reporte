<?php 
  session_start();
  
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <script src="js/jquery-3.5.1.js"></script>
     <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <?php include "includes_admin/scripts_admin.php"; ?>
    <title>Inicio</title>
    <?php include "includes_admin/header_admin.php"; ?>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
     <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    </head>
    <body>
     

  <title>Gráficos de tabla</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <h1 class="about__title">Tipo de maltrato animal más común</h1>
  <canvas id="chart" width="400" height="400"></canvas>

  <?php
  include "../conexion.php";

  // Obtener datos de la tabla de MySQL
 $sql = "SELECT
            r.lista_denuncia_id,
            r.descripcion,
            tm.id_tipo_maltrato,
            tm.nombres,
            COUNT(*) as cantidad,
            COUNT(*) / (SELECT COUNT(*) FROM lista_denuncia) * 100 as porcentaje
        FROM lista_denuncia r
        INNER JOIN estados re ON r.id_estado = re.id_estado
        INNER JOIN tipo_maltrato tm ON r.id_tipo_maltrato = tm.id_tipo_maltrato
        GROUP BY id_tipo_maltrato";

$result = $conection->query($sql);


  $labels = array();
  $data = array();
  $colors = array(); // Array para almacenar colores diferentes

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $labels[] = $row["nombres"];
      $data[] = $row["porcentaje"];
      // Generar un color aleatorio en formato RGB
      $colors[] = 'rgb(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ')';
    }
  }
  ?>

  <script>
    // Get the data from PHP and use it to create the chart
    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'pie', // Usamos un gráfico de tipo pastel
      data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
          label: 'Porcentaje',
          data: <?php echo json_encode($data);?> ,
          backgroundColor: <?php echo json_encode($colors); ?>, // Asignamos los colores aleatorios
          borderWidth: 1
        }]
      },
      options: {
        responsive: false, // Desactivamos la responsividad para mantener el tamaño fijo
        tooltips: {
          callbacks: {
            label: function (tooltipItem, data) {
              var dataset = data.datasets[tooltipItem.datasetIndex];
              var total = dataset.data.reduce(function (previousValue, currentValue, currentIndex, array) {
                return previousValue + currentValue;
              });
              var currentValue = dataset.data[tooltipItem.index];
              var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
              return data.labels[tooltipItem.index] + ':' + percentage + '%';
            }
          }
        }
      }
    });
  </script>


      
   <br>
    <div class="tablero">
    <?php
    include "../conexion.php";  
    $consulta = mysqli_query($conection, "SELECT count(*) as cantidad_reporte FROM lista_denuncia");
    $fetch = mysqli_fetch_assoc($consulta);
    $consul = mysqli_query($conection, "SELECT count(*) as cantidad_reportes_espera FROM lista_denuncia WHERE id_estado='1'");
    $respuesta = mysqli_fetch_assoc($consul);

    $consult = mysqli_query($conection, "SELECT count(*) as cantidad_usuarios FROM usuarios ");
    $result = mysqli_fetch_assoc($consult);
    $consu = mysqli_query($conection, "SELECT count(*) as usuarios_suspendido FROM usuarios WHERE estado='2' and id_rol='2'");
    $resultado = mysqli_fetch_assoc($consu);
      ?>
   
    <div class="row">
  <div class="col-sm-3" >
    <div class="card"  style="width: 90%; height: 100%;">
      <div class="card-body">
      <img class="card-img-top" style="width: 85%; height: 60%;"  src="https://www.itmplatform.com/lib/uploads/36978940_m-300x230.jpg" alt="Reportes">
      <br>
    <h5 class="card-title titulo">Cantidad de Reportes</h5>
    <p class="card-text total_reportes"><?php echo $fetch['cantidad_reporte'];?> </p>
        <a href="lista_denuncias_admin.php" class="btn btn-primary lista_reporte">Vizualizar</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3" >
    <div class="card"  style="width: 90%; height: 100%;">
      <div class="card-body">
      <img class="card-img-top" style="width: 85%; height: 60%;"  src="https://thumbs.dreamstime.com/b/ilustraci%C3%B3n-de-vector-l%C3%ADnea-informe-pendiente-movimiento-inventario-del-icono-firma-s%C3%ADmbolo-contorno-aislado-negra-243008247.jpg" alt="Reportes">
      <br>
    <h5 class="card-title titulo">Reportes pendientes</h5>
    <p class="card-text total_reportes"><?php echo $respuesta['cantidad_reportes_espera'];?> </p>
        <a href="lista_denuncia_pendiente.php" class="btn btn-primary lista_reporte">Vizualizar</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3" >
    <div class="card"  style="width: 90%; height: 100%;">
      <div class="card-body">
      <img class="card-img-top" style="width: 85%; height: 60%;"  src="https://roianalytics.agency/wp-content/uploads/2020/09/Perfil-de-usuario.png" alt="Reportes">
      <br>
    <h5 class="card-title titulo">Cantidad Usuarios</h5>
    <p class="card-text total_reportes"><?php echo $result['cantidad_usuarios'];?> </p>
        <a href="listas_usuarios.php" class="btn btn-primary lista_reporte">Vizualizar</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3" >
    <div class="card"  style="width: 90%; height: 100%;">
      <div class="card-body">
      <img class="card-img-top" style="width: 85%; height: 60%;"  src="https://fututel.com/images/tutorials/webservices-http-api-playsms-para-elimiar-una-cuenta-de-usuario.png" alt="Reportes">
      <br>
    <h5 class="card-title titulo">Usuarios suspendidos</h5>
    <p class="card-text total_reportes"><?php echo $resultado['usuarios_suspendido'];?> </p>
        <a href="lista_usuarios_suspendido.php" class="btn btn-primary lista_reporte">Vizualizar</a>
      </div>
    </div>
  </div>

</div>
    </div>
  

    <div class="mapa">
    <br>
    <br>
    <br>
    <div id="map"></div>
    <br>
    <br>
    <br>
    </div>
    
    
    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-27.33071249913746, -55.86945949737549),
          zoom: 15
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://localhost/dashboard/sistema/sistema_reporte/administrador/xml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var lista_denuncia_id = markerElem.getAttribute('lista_denuncia_id');
              var direccion = markerElem.getAttribute('direccion');
              var descripcion = markerElem.getAttribute('descripcion');
              var nombres = markerElem.getAttribute('nombres');
              var celular = markerElem.getAttribute('celular');
              
          
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('latitud')),
                  parseFloat(markerElem.getAttribute('longitud')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = nombres
              

              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = direccion
              
              text.textContent = celular
             
              
             
              infowincontent.appendChild(text);
              var icon = customLabel[descripcion] ||{};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>


  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ9R8F78Mn4umTxFYm0rWfZAsjf-D3Iqw&callback=initMap"></script>
</body>
</html>

    <style type="text/css">
    .mapa{
    height: 60%;
    width: 100%;
    float: right;

    }
    .lista_reporte{
    float: right;
    }
    .total_reportes{
    color: green;
    font-weight: bold;
    font-size:40px;

    }
    .total_usuarios{
    color: green;
    font-weight: bold;
    font-size:40px;
    }
    .titulo{
    font-size:12px;
    font-weight: bold;
    font-family:helvética,arial,helvética;
    }
    </style>