<div class="row"> <!-- Inicia Barra de Herramientas-->

  <div class="large-12 large-centered columns">
   
    <a class="small button" href="<?=base_url(); ?>index.php/bienvenido"> 
      <i class="foundicon-home"> Inicio</i>
    </a>

    <a class="small button" href="<?=base_url(); ?>index.php/tareas/mostrar_vistas_c/tarea_dia/">
      <i class="foundicon-calendar">Agenda dia</i>
    </a>
    
    <a class="small button" href="<?=base_url(); ?>index.php/tareas/mostrar_vistas_c/tarea_usuario">
      <i class="foundicon-address-book"> Mi Agenda </i>
    </a>
    
    <a class="small button" href="<?=base_url(); ?>index.php/tareas/mostrar_vistas_c/agregar_tarea">
      <i class="foundicon-add-doc"> Nueva </i>
    </a>
    
    <a   class="small button" href="<?=base_url(); ?>index.php/tareas/mostrar_vistas_c/resumen">
      <i class="foundicon-folder"> Resumen </i>
    </a>
    
        <?php if(isset($permisos) && ($permisos['tbl_roles_ag_id_rol'] == 1)){ ?>
    
    <a class="small button" href="<?=base_url(); ?>index.php/tareas/mostrar_vistas_c/asignar_tramites">
      <i class="foundicon-add-doc"> Asignar trmaites </i>
    </a>
    
    <a class="small button" href="<?=base_url(); ?>index.php/tareas/mostrar_vistas_c/asignar_ta">
      <i class="foundicon-add-doc"> Asignar Tel. Auto </i>
    </a>  
    <?php } ?>
   
    <a class="small button" onclick="window.print();" >
     <i class="foundicon-page">Imprimir</i>
    </a> 
    
    <a class="small button" href="<?=base_url(); ?>index.php/usuario/destruir_sesion_c">
      <i class="foundicon-remove"> Salir </i>
    </a>
  
  </div>
</div> <!-- Termina Barra de Herramientas-->