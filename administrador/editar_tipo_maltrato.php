<div class="abs-center">
  <form class="border p-3 form" action="update_tipo_maltrato.php" method="post">
    <input type="hidden" name="id_tipo_maltrato" value="<?php echo $id_tipo_maltrato; ?>" id="id_tipo_maltrato">
    <h1 style="font-family: arial, arial, helvetica;">Editar tipo maltrato</h1>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Nombre</label>
      <input type="text" name="nombre_maltrato" id="nombre_maltrato" style="width: 100%; height: 100%;" required="" value="<?php echo $nombre_maltrato; ?>"></input>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
  </form>
</div>

</div>
