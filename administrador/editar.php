 



<div class="abs-center">
      <form class="border p-3 form" action="update.php" method="post">
            <input type="hidden" name="lista_denuncia_id" value="" id="lista_denuncia_id">
            <h1 style = "font-family:arial,arial,helvética;">Editar Reporte</h1>
           
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Observación</label>
            <textarea type="text" name="observacion" id="observacion" style="width: 100%; height: 100%;"></textarea> 
             <label for="recipient-name" class="col-form-label" >Estado</label>
              <?php 
              $query_estados = mysqli_query($conection, "SELECT * FROM estados");
              $resultado_estados = mysqli_num_rows($query_estados);

              mysqli_close($conection);

              ?>
           
              <select  id="id_estado" name="id_estado"  class="form-control">
                
                <?php
                if ($resultado_estados > 0) {
                  while ($estados = mysqli_fetch_array($query_estados)) {

                    
                ?>


                    <option value="<?php echo $estados['id_estado']; ?>"><?php echo $estados['nombre']; ?></option>

                <?php
                   }
                }
                ?>
              </select>

            </div>
               
             
              <button type="submit"  class="btn btn-success" >Guardar</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
      </form>
    

 </div>

    </div>



  
      