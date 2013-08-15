<div class="row">
     <br>
       <div class="twelve columns">
    <a href="<?=base_url(); ?>index.php/bienvenido"> <i class="foundicon-home"> Home</i></a>
    <a href="<?=base_url(); ?>/index.php/tareas/mostrar_vistas_c/tarea_dia/"><i class="foundicon-calendar">Agenda dia</i></a>
    <a href="<?=base_url(); ?>/index.php/tareas/mostrar_vistas_c/tarea_usuario"><i class="foundicon-address-book"> Mi Agenda </i></a>
    <a class="has-tip" data-width="210" title="Crea una tarea" href="<?=base_url(); ?>/index.php/tareas/mostrar_vistas_c/agregar_tarea"><i class="foundicon-add-doc"> Nueva </i></a>
    <a href="<?=base_url(); ?>/index.php/tareas/mostrar_vistas_c/resumen"><i class="foundicon-folder"> Resumen </i></a>
    <a onclick="window.print();" > <i class="foundicon-page">Imprimir</i></a> 
    <?php if(isset($permisos) && ($permisos['tbl_roles_ag_id_rol'] == 1 || $permisos['tbl_roles_ag_id_rol'] == 2)){ ?>
      <a title="Asignación de tareas a usuarios" href="<?=base_url(); ?>/index.php/tareas/mostrar_vistas_c/asignar_tramites"><i class="foundicon-add-doc"> Asignar trmaites </i></a>
      <a title="Asignación de telefonos y automoviles" href="<?=base_url(); ?>/index.php/tareas/mostrar_vistas_c/asignar_ta"><i class="foundicon-add-doc"> Asignar Tel. Auto </i></a>  
    <?php } ?>
    <a href="<?=base_url(); ?>index.php/usuario/destruir_sesion_c"><i class="foundicon-remove"> Salir </i></a>
    
    <br>
    <br>
  
   
  </div>