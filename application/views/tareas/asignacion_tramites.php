<div class="row">
    <div class="ten columns push-two">
        <h2><small>Asignación de Tramites del Dia <?=isset($dia) ? $dia : ''; ?></small></h2>
    </div>
    <div class="twelve columns">
        <table class="responsive">
        <thead>
          <tr>
            <th>INSTITUCION</th>
            <th>ACTIVIDAD</th>
            <th>DOMICILIO</th>
            <th>ASIGNADO</th>
            
          </tr>
        </thead>
        <tbody>
            <?php //print_r($usuarios); ?>
            <?php if(!isset($tareas['mensaje']) || $tareas['mensaje'] != 0){
                ?><tr><?php
                foreach ($tareas as $tarea) {
                    ?><td><?=(isset($tarea['institucion'])) ? $tarea['institucion'] : '' ; ?></td><?php
                    ?><td><?=(isset($tarea['actividad'])) ? $tarea['actividad'] : '' ; ?></td><?php
                    ?><td><?=(isset($tarea['domicilio'])) ? $tarea['domicilio'] : '' ; ?></td><?php
                    ?><td>
                        <?php if(isset($tarea['tbl_usuarios_ag_id_usuario']) && isset($usuarios) ){
                            ?><select id="asignar_tarea" onchange="cambiar_asignado(<?php echo $tarea['id_tarea']; ?>)">
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
                            </select><?php
                        }?>
                    </td><?php
                }
            ?></tr><?php } ?>
        <?php /*foreach ($actividades as $actividad): ?>
          
      
        <td><?=isset($actividad['institucion']) ? $actividad['institucion'] : ''; ?></td>   
        <td><?=isset($actividad['actividad']) ? $actividad['actividad'] : ''; ?></td>   
        <td><?=isset($actividad['domicilio']) ? $actividad['domicilio'] : ''; ?></td>   
        <td> <select name="usuario_asignado">
                    <option value="JUAN" selected="selected">JUAN</option>
                    <option value="PEDRO">PEDRO</option>
                </select>
        </td>
           
        <?php endforeach; */?>
        </tbody> 
    </table>
            <form method="post" action="<?=base_url().'index.php/tareas/mostrar_vistas_c/asignar_ta/0/asignacion_correcta'; ?>">
                <input type="submit" class="button" value="ACEPTAR" />
            </form>   
    </div>
</div>