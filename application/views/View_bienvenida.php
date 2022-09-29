<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
<div class="container">
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
    <button class="btn btn-outline-success btn-lg" onclick="guardar()">Guardar</button>
  </form>
</div>

<div class="container" id="tabla_personas">
</div>


<script type="text/javascript">
listar_personas();



function guardar(){
  $.ajax({
    method:"POST",
    url:"<?php echo site_url("Ctrl_bienvenida/guardar");?>",
    data:{
      vnombre :$("#txb_nombre").val(),
      vapellidop :$("#txb_apellidoP").val(),
      vapellidom :$("#txb_apellidoM").val()
    },
    success: function(){
      limpiar_campos();
    },

});

}

function limpiar_campos(){
  $("#txb_nombre").val("");
  $("#txb_apellidoP").val("");
  $("#txb_apellidoM").val("");
}


function listar_personas(){
  $.ajax({
    method:"POST",
    url:"<?php echo site_url("Ctrl_bienvenida/obtener_todas_las_personas");?>",
    data:{
    },
    success: function(personas){
      crear_tabla_personas(personas);
    },
    dataType:'json'
});

}

function crear_tabla_personas(personas){
    if(personas.length >0)
    {

      var tabla_dinamica="<table class='table table-striped'>";
      tabla_dinamica+="";
      
      tabla_dinamica+="<tr>";
      tabla_dinamica+="<th>Id</th>";
      tabla_dinamica+="<th>Nombres</th>";
      tabla_dinamica+="<th>Apellido paterno</th>";
      tabla_dinamica+="<th>Apellido materno</th>";
      tabla_dinamica+="</tr>";
      
      var i;
      for(i=0;i<personas.length;i++)
      {
        tabla_dinamica+="<tr>";
        tabla_dinamica+="<td>"+personas[i].id;+"</td>";
        tabla_dinamica+="<td>"+personas[i].nombres;+"</td>";
        tabla_dinamica+="<td>"+personas[i].apellidop;+"</td>";
        tabla_dinamica+="<td>"+personas[i].apellidom;+"</td>";
        tabla_dinamica+="</tr>";
      }
      tabla_dinamica+="</table>";
      $("#tabla_personas").html(tabla_dinamica);
      
    }
    else
    {
        $("#tabla_personas").html('<div class="alert alert-info"><strong> No hay datos que mostrar<strong></div>');
    }
}

</script>

</body>

</html>
