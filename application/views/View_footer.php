<script type="text/javascript">
listar_personas();



function guardar(){
  if($("#txb_id").val()==""){
    $.ajax({
      method:"POST",
      url:"<?php echo site_url("Ctrl_bienvenida/guardar");?>",
      data:{
        vnombre :$("#txb_nombre").val().trim().toUpperCase(),
        vapellidop :$("#txb_apellidoP").val().trim().toUpperCase(),
        vapellidom :$("#txb_apellidoM").val().trim().toUpperCase()
      },
      success: function(){
        limpiar_campos();
        listar_personas();
      },
  
  });
  }else{
    $.ajax({
    method:"POST",
    url:"<?php echo site_url("Ctrl_bienvenida/modificar");?>",
    data:{
      vid :$("#txb_id").val(),
      vnombre :$("#txb_nombre").val().trim().toUpperCase(),
      vapellidop :$("#txb_apellidoP").val().trim().toUpperCase(),
      vapellidom :$("#txb_apellidoM").val().trim().toUpperCase()
    },
    success: function(){
      limpiar_campos();
      listar_personas();
    },

});
  }
}



function limpiar_campos(){
  $("#txb_nombre").val("");
  $("#txb_apellidoP").val("");
  $("#txb_apellidoM").val("");
  $("#txb_id").val("");

}


function editar(id,nombre,apellidop,apellidom){
  $("#txb_id").val(id);
  $("#txb_nombre").val(nombre);
  $("#txb_apellidoP").val(apellidop);
  $("#txb_apellidoM").val(apellidom);
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

function listar_personas_by(){
  $.ajax({
    method:"POST",
    url:"<?php echo site_url("Ctrl_bienvenida/obtener_todas_las_personas_by");?>",
    data:{
      vnombre :$("#txb_nombre").val().trim().toUpperCase(),
      vapellidop :$("#txb_apellidoP").val().trim().toUpperCase(),
      vapellidom :$("#txb_apellidoM").val().trim().toUpperCase()

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
      
      tabla_dinamica+="<th>Nombres</th>";
      tabla_dinamica+="<th>Apellido paterno</th>";
      tabla_dinamica+="<th>Apellido materno</th>";
      tabla_dinamica+="<th>Acciones</th>";
      tabla_dinamica+="</tr>";
      
      var i;
      for(i=0;i<personas.length;i++)
      {
        tabla_dinamica+="<tr>";
        
        tabla_dinamica+="<td>"+personas[i].nombres+"</td>";
        tabla_dinamica+="<td>"+personas[i].apellidop+"</td>";
        tabla_dinamica+="<td>"+personas[i].apellidom+"</td>";
        tabla_dinamica+="<td>";
        tabla_dinamica+="<button class='btn btn-outline-success btn-lg' onclick=\"eliminar('" +personas[i].id+ "')\">Eliminar</button>";
        tabla_dinamica+="<button class='btn btn-outline-danger btn-lg' onclick=\"editar('" +personas[i].id+"','"+personas[i].nombres +"','"+personas[i].apellidop +"','"+personas[i].apellidom +"')\">editar</button>";
        tabla_dinamica+="</td>";
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

function eliminar(id){
  $.ajax({
    method:"POST",
    url:"<?php echo site_url("Ctrl_bienvenida/eliminar");?>",
    data:{
      vid :id
      
    },
    success: function(){
      limpiar_campos();
      listar_personas();
    },

});

}





</script>

<footer>
</footer>
</body>




</html>