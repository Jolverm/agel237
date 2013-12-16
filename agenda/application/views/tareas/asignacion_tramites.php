<div class="row">
    <div class="large-10 large-offset-2 columns">
        <h2><small>Asignación de Tramites del Dia <?=isset($dia) ? $dia : ''; ?></small></h2>
    </div>
    </div>
<div class="row">
    <div class="large-12 large-centered columns">
        <table class="footable table">
        <thead>
          <tr>
            <th>CLIENTE</th>
            <th>INSTITUCION</th>
            <th>HORARIO</th>
            <th>ACTIVIDAD</th>
            <th>DOMICILIO</th>
            <th>ASIGNADO</th>
          </tr>
        </thead>
        <tbody>
             <?php if(!isset($tareas['mensaje']) || $tareas['mensaje'] != 0){
                foreach ($tareas as $tarea) { ?>
                <tr>
                    <td><?=(isset($tarea['cliente'])) ? $tarea['cliente'] : '' ; ?></td>
                    <td><?=(isset($tarea['institucion']) && $tarea['institucion'] != '') ? $tarea['institucion'] : '-----'; ?></td>
                    <td><?=(isset($tarea['horario']) && $tarea['horario'] != '' )? $tarea['horario'] : '-----'; ?></td>
                    <td><?=(isset($tarea['actividad'])) ? $tarea['actividad'] : '' ; ?></td>
                    <td><?=(isset($tarea['domicilio'])) ? $tarea['domicilio'] : '' ; ?></td>
                    <td>
                        <?php if(isset($tarea['tbl_usuarios_ag_id_usuario']) && isset($usuarios) ){
                            ?><select id="asignar_tarea_<?php echo $tarea['id_tarea']; ?>" onchange="cambiar_asignado(<?php echo $tarea['id_tarea']; ?>)">
                            <?php
                                foreach ($usuarios as $usuario) {
                                    ?>
                                    <option <?php if($tarea['tbl_usuarios_ag_id_usuario'] == $usuario['id_usuario']){
                                        echo 'selected="selected"';
                                    } ?> 
                                    value="<?=$usuario['id_usuario']; ?>"
                                    >
                                    <?php echo ($usuario['nombre_real']. ' ' .$usuario['apellido_paterno']);?>
                                    </option>
                                    <?php
                                }
                            ?>
                            </select><?php } ?>
                    </td> <?php } ?>
                </tr><?php } ?>
        </tbody> 
    </table>
            <form method="post" action="<?=base_url().'index.php/tareas/mostrar_vistas_c/asignar_ta/0/asignacion_correcta'; ?>">
                <input type="submit" class="button" value="ACEPTAR" />
            </form>   
    </div>
</div>