<div class="abs-center">

  <form class="border p-3 form" action="editar_tipo_estado.php" method="post">
    <input type="hidden" name="id_estado" value="<?php echo $id_estado; ?>" id="id_estado">
    <h1 style="font-family: arial, arial, helvetica;">Editar tipo maltrato</h1>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Nombre</label>
      <input type="text" name="nombre" id="nombre" style="width: 100%; height: 100%;" required="" value="<?php echo $nombre; ?>"></input>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
  </form>
</div>

</div>

