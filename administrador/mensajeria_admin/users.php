<?php
session_start();
include_once "php/config.php";
if (empty($_SESSION['denunciante'])) {
  header("location: ../index.php");
}
?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content" style="color: red">
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE unique_id = '$_SESSION[unique_id]'");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <style type="text/css">
            .nombre{
              text-transform:capitalize;
            }
            .status{
              color: green;
            }
          </style>
          <div class="details">
            <div class="nombre">
              <span class="nombre"><?php echo $row['nombre_usu'] . " " . $row['apellido'] ?></span>
            </div>
            <div class="status">
                 <p class="etatus"><?php echo $row['status']; ?></p>
            </div>
         
          </div>
        </div>
        <a href="../../administrador/index_admin.php" class="logout">X</a>

      </header>
      <div class="search">
        <span class="text">Selecciona un usuario para iniciar el chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>

</html>
<style type="text/css">
  .wrapper{
    
  }
</style>