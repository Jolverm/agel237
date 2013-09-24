function editar_tarea (id) {
    
    var url = b + 'tareas/mostrar_vistas_c/editar_tarea/' + id;
  
    location.href =  url;
    
       }

function ver_tarea (id) {
    
    var url = b + 'tareas/mostrar_vistas_c/consulta_tareas_id/' + id;
  
    location.href =  url;
    
       }

function borrar_tarea (id) {
    
    var url = b + 'tareas/mostrar_vistas_c/eliminar_tarea/' + id;
  
    location.href =  url;
    
       }

function mostrar_formulario(){
  var tp = $('#id_tipo_tarea').val();
  if (tp == 0){
   $('.firma').hide();
   $('.tramite').show();
  } else if (tp == 1) {
   $('.tramite').hide();
   $('.firma').show();
  }
}

function resumen_date(){
  var dt = $('#date_resume').val();
  url = b + 'tareas/mostrar_vistas_c/resumen/';
  if(dt != 0){
    $.ajax({
      url: url,
      data: {date_resume:dt},
      dataType: 'html',
      type: 'post',
      success: function(data){
        $('body').html(data);
      }
    });
  }
}

function cambiar_asignado(id_tarea){

  var asg = $('#asignar_tarea_'+ id_tarea).val();

   url = b + 'tareas/asigna_tareas/';

   $.ajax({
      url: url,
      data: {id_usuario : asg, id_tarea : id_tarea},
      type: 'post',
      success: function(data){

        $('#mensaje_foo').html('<div class="alert-box success">Se cambio el usuario exitosamente <a href="" class="close">&times;</a></div>');

        $('.alert-box').fadeOut(3000);

      }

    });

}

function agregar_coche(id){

  var chk = $('#otro_auto_' + id).attr('checked');

  if(chk == null){

    $('#otro_auto_' + id).attr('checked', 'checked');

    $('#automovil_' + id).attr('disabled', 'disabled');

    $('#otro_auto_text_' + id).removeAttr('disabled');    

  } else{

    $('#otro_auto_' + id).removeAttr('checked');

    $('#otro_auto_text_' + id).attr('disabled', 'disabled');

    $('#automovil_' + id).removeAttr('disabled');

  }

}

function agregar_telefono(id){

  var chk = $('#otro_tel_' + id).attr('checked');

  if(chk == null){

    $('#otro_tel_' + id).attr('checked', 'checked');

    $('#tel_' + id).attr('disabled', 'disabled');

    $('#otro_tel_text_' + id).removeAttr('disabled');    

  } else{

    $('#otro_tel_' + id).removeAttr('checked');

    $('#otro_tel_text_' + id).attr('disabled', 'disabled');

    $('#tel_' + id).removeAttr('disabled');

  }

}

function agregar_atributo_s(id, tipo){
    if(tipo == 'auto'){
          var id_text = '#automovil_' + id;
    } else {
          var id_text = '#telefono_' + id;
    }
    var selectedLabel = $(id_text).val();
    selectedLabel = $.trim(selectedLabel);
    var selectedAsignado = $(id_text).attr('data-asignado');
    var date = $(id_text).attr('data-date');
    var type = $(id_text).attr('data-type');
     url = b + 'tareas/agregar_atributo/';
    $.ajax({
        url: url,
        data: {nombre_atributo : selectedLabel, tipo_atributo : type, fecha: date ,tbl_usuarios_ag_id_usuario: selectedAsignado},
        type: 'post'
    });
}

function agregar_atributo(id, tipo){
    var id_text = '#otro_' + tipo +'_text_' + id;
    var selectedLabel = $(id_text).val();
    selectedLabel = $.trim(selectedLabel);
    var selectedAsignado = $(id_text).attr('data-asignado');
    var date = $(id_text).attr('data-date');
    var type = $(id_text).attr('data-type');
     url = b + 'tareas/agregar_atributo/';
    $.ajax({
        url: url,
        data: {nombre_atributo : selectedLabel, tipo_atributo : type, fecha: date ,tbl_usuarios_ag_id_usuario: selectedAsignado},
        type: 'post'
    });
}