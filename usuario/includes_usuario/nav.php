<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Validación de Formulario con Javascript</title>
<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="../registro_usuario.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: black;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  
}
</style>

</head>
<body>

<div class="topnav" id="myTopnav" >
  <a href="inicio_usuario.php" class="active">Inicio</a>
  <a href="formulario_denuncia.php" class="efecto">Formulario de denuncia</a>
  <a href="lista_denuncias.php" class="efecto">Lista de denuncias</a>
  <a href="mensajeria_usuario/users.php" class="efecto">Mensajeria</a>
  <a href="usuarios_datos.php" class="efecto">Perfil</a>
  <!-- Button trigger modal -->
  
 
  
  <a  href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i>
  </a>
</div>







<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
    
</body>
</html>

<style type="text/css">
.btn_cambiar_datos{
  float: right;

}
.formulario_datos_usuario{
  width: 100%;
}
 .modal-header{
      background: #ccc;
    }

</style>