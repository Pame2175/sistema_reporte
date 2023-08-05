<?php 
    session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="js/jquery-3.5.1.js"></script>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="css/estilo.css">
    <?php include "includes_usuario/scripts.php"; ?>
    <title>Sistema de Reporte</title>
    
    <link rel="stylesheet" href="css/estilo_inicio_usuario.css">
    <link rel="stylesheet" href="css/normalize.css">
    
    <link rel="stylesheet" href="files/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/estilos.css">

    <meta name="theme-color" content="#2091F9">

    <meta name="title" content="Aprende CSS desde cero">
    <meta name="description"
        content="Hola, soy una descripción que verás cuando busques algo de mi temática en Google.">


    <meta property="og:type" content="website">
    <meta property="og:url" content="https://alexcgdesign.github.io">
    <meta property="og:title" content="Aprende CSS desde cero">
    <meta property="og:description"
        content="Hola, soy una descripción que verás cuando busques algo de mi temática en Google.">
    <meta property="og:image" content="https://alexcgdesign.github.io/images/css.jpg">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.jordanalex.com/">
    <meta property="twitter:title" content="Aprende CSS desde cero">
    <meta property="twitter:description"
        content="Hola, soy una descripción que verás cuando busques algo de mi temática en Google.">
    <meta property="twitter:image" content="https://alexcgdesign.github.io/images/css.jpg">
</head>
<body>
    
      <?php include "includes_usuario/header.php"; ?>
  <style>
    .about__icons {
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .about__title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .crueldad-pasiva {
        background-color: #F5F5DC; /* Beige */
    }

    .crueldad-activa {
        background-color: #F0E68C; /* Khaki */
    }
    .subtitle {

    }
</style>

<section class="container about">
    <h2 class="about__title">¿Qué es el maltrato animal?</h2>
    <p class="about__paragraph">Se considera maltrato animal a toda acción que provoque daño, dolor o sufrimiento al animal. Involucra violencia física como golpes, mutilaciones y torturas, así como la negligencia sobre su alimentación, cuidados sanitarios y abandono.</p>
    <br>
    <h2 class="about__title">Tipos de maltrato animal</h2>
    <div class="about__main">

        <article class="about__icons crueldad-pasiva">
            <h3 class="about__title">Crueldad pasiva</h3>
            <p class="about__paragraph">Se caracteriza por los casos de abandono, donde la crueldad, donde la crueldad es la falta de acción en lugar de la acción por sí misma, sin embargo, una grave negligencia animal puede causar demasiado dolor y sufrimiento animal. La negligencia animal severa puede causar un dolor y sufrimiento increíbles al animal.</p>
        </article>

        <article class="about__icons crueldad-activa">
            <h3 class="about__title">Crueldad activa</h3>
            <p class="about__paragraph">Implica una intención maliciosa, cuando una persona deliberadamente e intencionalmente causa daño a un animal, y a veces se refiere a lesión no accidental. Los actos de crueldad intencional a menudo son los signos más preocupantes y deben ser considerados graves problemas psicológicos y sociales.</p>
        </article>
    </div>
</section>

        <section class="knowledge">
            <div class="knowledge__container container">
                <div class="knowledege__texts">
                    <h2 class="about__title">Legislación de protección y penalización del maltrato animal </h2>
                    <p class="knowledge__paragraph">La lucha por el derecho animal inició por diversos reportes en la sociedad en general, sin embargo, llega a nuestro país recién en 2007 con la ley 4840/13 y plantea sus modificaciones en el artículo 5892/17 sumadas a las ordenanzas municipales que se refieren a la protección, cuidado y tenencia de animales. Los casos de maltrato denunciados en las comisarías o la Dirección Nacional de Defensa, Salud y Bienestar Animal son hechos que suceden en la vía pública o el ámbito privado, por eso surgen las leyes para el cuidado de mascotas y la ley luego de una extensa lucha de organizaciones encargadas de la protección y adopción de los animales desamparados. </p>
                    <a href="#" class="cta">Anterior</a>
                </div>

                <figure class="knowledge__picture">
                    <img src="./images/animal.jpg" class="knowledge__img">
                </figure>
            </div>
        </section>

        <section class="price container">
            <h2 class="about__title">Instituciones que amparan a los animales en Paraguay</h2>

            <div class="price__table">
                <div class="price__element">
                    <p class="price__name"></p>
                    <h3 class="price__price">Bienestar Animal</h3>

                    <div class="price__items">
                        <p class="price__features">El Bienestar Animal fue fundada según la Organización Mundial de Sanidad Animal (OIE) es el estado dinámico de un individuo en relación a los mecanismos biológicos que utiliza, para adaptarse positiva y exitosamente ante los cambios del ambiente, involucrando estos a la salud, al confort y al estado emocional del mismo</p>
                        
                    </div>

                    <a href="#" class="price__cta">Página</a>
                </div>


                <div class="price__element price__element--best">
                    <p class="price__name"></p>
                    <h3 class="price__price">Patitas felices Paraguay</h3>

                    <div class="price__items">
                        <p class="price__features">Fue fundada 20 de octubre del 2011, es una organización sin ánimo de lucro que vela por el bienestar, salud y derechos de los animales, basada fundamentalmente en la Ley 4840/13, de Protección y bienestar animal en vigencia, según Estatuto. No recibe ayuda económica del Gobierno ni de la Municipalidad. Se mantiene sólo y exclusivamente gracias a las colaboraciones de Madrinas y padrinos y algunas empresas como Nestlé Paraguay, Caballero</p>
                        
                    </div>

                    <a href="#" class="price__cta">Página</a>
                </div>


                <div class="price__element">
                    <p class="price__name"></p>
                    <h3 class="price__price">sociedad protectora de animales encarnacion</h3>

                    <div class="price__items">
                        <p class="price__features">Encargada del rescate y adopcion de animales domesticos de la ciudad de Encarnació</p>
                    
                    </div>

                    <a href="#" class="price__cta">Página</a>
                </div>


            </div>
        </section>

        

        <section class="questions container">
            <h2 class="about__title">Objetivo de la creación del sistema</h2>
            <p class="questions__paragraph"></p>

            <section class="questions__container">
                <article class="questions__padding">
                    <div class="questions__answer">
                      
                            El objetivo del sistema informático desarrollado es mejorar la comunicación entre las instituciones y la ciudadanía, proporcionando información y estadísticas precisas en tiempo real. Para ello, se utilizó la geolocalización y la mensajería para obtener ubicaciones precisas y evitar errores. En contraste con los procesos manuales utilizados por las instituciones, el sistema automatizado obtiene ubicaciones más rápidamente y ofrece estadísticas sobre los casos más frecuentes y la cantidad de reportes diarios. Con esta tecnología, se espera mejorar la eficacia y eficiencia en el cuidado y protección de los animales en Encarnación.
                           
                        

                        <p class="questions__show">
                            
                        </p>
                        
                    </div></p>
                    </div>
                </article>

                

                
            </section>

           

</body>
<script src="js/inicio_usuario.js"></script>
<script src="js/inicio_usuarios.js"></script>
<script src="files/bower_components/jquery/dist/jquery.min.js"></script>
<script src="files/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</html>
<!DOCTYPE html>
<html>
<head>
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
          label: 'Cantidad',
          data: <?php echo json_encode($data); ?>,
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
              return data.labels[tooltipItem.index] + ': ' + percentage + '%';
            }
          }
        }
      }
    });
  </script>
</body>
</html>
 <section class="questions__offer">
                <h2 class="about__title">Denuncia</h2>
                <p class="questions__copy">Salva vidas
                   </p>
                <a href="formulario_denuncia.php" class="cta">Reportar</a>
            </section>
        </section>
