<!-- <div class="container div color3"> -->
  <div class="row b_bottom">
    <div class="col-sm-12 encabezado">
      Subir archivo de video
    </div>
  </div>

  <form action="../models/subir_video" enctype="multipart/form-data" method="POST">
    <br>
    <div class="row">
      <div class="col-sm-2 t_centro espacio2">
        <label for="name">Nombre del archivo</label>
      </div>
      <div class="col-sm-2">
        <input type="text" name="nombre" id="name" class="form-control inputs" placeholder="nombre archivo.." required>
      </div>
      <div class="col-sm-2 t_centro espacio2">
        <label for="file">Agregar archivo</label>
      </div>
      <div class="col-sm-4 espacio2">
        <input type="file" name="archivo_video" required>
      </div>
      <div class="col-sm-2 espacio2">
        <input type="submit" class="btn btn-sm btn-outline-dark" value="Subir archivo"></input>
      </div>
    </div>
  </form>
<br>
<!-- </div> -->
		