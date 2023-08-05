 <?php 
  session_start();
  include "../conexion.php";  
 include "includes/header.php";
 include "includes/scripts.php";
 ?>
 <table>
  <thead>
      <tr>
        <th>Foto</th>
        
      </tr>
    </thead>
    <tbody>
      <?php 
      $id_denuncia2 = $_POST['id_denuncia2'];
        

      $consulta_imagenes= mysqli_query($conection,"SELECT enlace FROM imagen where id_denuncia= '$id_denuncia2' ") or die(mysqli_error());
      $fetch_img = mysqli_fetch_array($consulta_imagenes);
      while($fetch_img = mysqli_fetch_array($consulta_imagenes)){
      $multimedia=json_decode($fetch_img['enlace'],true);
      
      foreach ($multimedia as $value) {
    ?>
      <tr>
          <td><?php echo $value["foto"];?></td>
            
          
          
          
    
          
        </tr>
    
    <?php 
        
}
      }
     ?>

</table>

<img src="" class="imagen" name="imagen" id="imagen">
<br>
