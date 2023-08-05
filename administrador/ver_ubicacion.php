<?php 
  session_start();
  require '../conexion.php';
 $usuario = $_REQUEST['id_denuncia'];
 
  
  echo $usuario;
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
    <title>Inicio</title>
    
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
        margin: 0;
        padding: 0;
      }
    </style>
    </head>
    <body>
      
   <br>
    

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
          downloadUrl('http://localhost/dashboard/sistema/sistema_reporte/administrador/xml2.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var lista_denuncia_id = markerElem.getAttribute('usuario');
              var descripcion = markerElem.getAttribute('descripcion');
              var direccion = markerElem.getAttribute('direccion');
          
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('latitud')),
                  parseFloat(markerElem.getAttribute('longitud')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = descripcion
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = direccion
              infowincontent.appendChild(text);
              var icon = customLabel[descripcion] || {};
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
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-dFHYjTqEVLndbN2gdvXsx09jfJHmNc8&callback=initMap"
      
    ></script>
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



   