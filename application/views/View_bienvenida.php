<div class="container">
<input type="hidden" class="form-control" id="txb_id">
<form>
    <div class="form-group">
      <label for="txb_nombre">Nombre:</label>
      <input type="text" class="form-control" id="txb_nombre">
    </div>
    <div class="form-group">
      <label for="txb_apellidoP">Apellido paterno:</label>
      <input type="text" class="form-control" id="txb_apellidoP">
    </div>
    <div class="form-group">
      <label for="txb_apellidoM">Apellido materno:</label>
      <input type="text" class="form-control" id="txb_apellidoM">
    </div>
    
  </form>
  <button class="btn btn-outline-success btn-lg" onclick="guardar()">Guardar</button>
  <button class="btn btn-outline-success btn-lg" onclick="listar_personas_by()">Buscar</button>
</div>
<div class="container" id="tabla_personas">
</div>



