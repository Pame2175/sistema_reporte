

<div class="abs-center">
      <form class="border p-3 form" action="update_reporte.php" method="post">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            <input type="hidden" name="lista_denuncia_id" value="" id="lista_denuncia_id">

            <div class="form-group">
           
             <h1 for="recipient-name" class="" style = "font-family:arial,arial,helvética;">Editar Reporte</h1>
          <div class="form-group">
          <label for="descripcion">Descripcion</label>
          <input type="text" placeholder="Ingrese Nombre" name="descripcion" class="form-control" id="descripcion" value="" required="" maxlength="250" >
          </div>

          <div class="form-group">
          <label for="celular">Celular</label>
          <input type="number" placeholder="Ingrese Teléfono" name="celular" class="form-control" id="celular" value="" required="" min="0971000000">
          </div>
          </div>
           
          
        <div>
           
             <label  for="recipient-name" class="col-form-label">Tipos de maltrato</label>
              <?php 

              include "../conexion.php";  
              $query_tipo_maltrato= mysqli_query($conection, "SELECT * FROM tipo_maltrato");
              $resultado_tipo_maltrato= mysqli_num_rows($query_tipo_maltrato);

              mysqli_close($conection);

              ?>

          
             <select  name="id" id="id" class="form-control">
               
                <?php

                if ($resultado_tipo_maltrato > 0) {

                  while ($tipo_maltrato = mysqli_fetch_array($query_tipo_maltrato)) {
                  
                ?>

                <option value="<?php echo $tipo_maltrato['id_tipo_maltrato']; ?>"  ><?php echo $tipo_maltrato['nombres']; ?></option>

                <?php
                   }
                }
                ?>
              </select>
            </div>
             </div>      
             
          <button type="submit" value="actualizar reporte" class="btn btn-success" >Guardar</button>
      <button type="button" class="btn btn-secondary boton_salir" data-dismiss="modal">Salir</button>
      </form>
      <style type="text/css">
      .boton_salir{
      float: right;
      }
      </style>

 </div>

    



