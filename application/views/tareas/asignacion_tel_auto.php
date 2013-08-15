<pre><?php //print_r($tareas); ?></pre>
<?php

    $count = 0;

    foreach ($tareas as $tarea) {
        
        if($count < count($tarea)){

            $count = count($tarea);

        }

    }

?>
<div class="row">
    <div class="twelve columns">
        <select name="date_resume" id="date_resume" onchange="resumen_date()">
            <option value="0">Elije una fecha para ver el resumen de ella</option>
            <?php foreach ($fechas as $fecha) {
                ?><option value="<?php print_r($fecha['fecha']); ?>"><?php print_r($fecha['fecha']); ?></option><?php
            } ?>
        </select>
    </div>
</div>
<div class="row">
    <div class="ten columns push-two">
        <h2><small>Resumen Asignados del <?=isset($dia) ? $dia : ''; ?></small></h2>
    </div>
    <div class="twelve columns">
    <table class="responsive">
        <thead>
          <tr>
            <th>ASIGNADO</th>
            <?php for($i = 1; $i <= $count; $i++){ ?>

                <th>ACTIVIDAD <?php echo($i); ?></th>

            <?php } ?>
            <th>AUTOMOVIL</th>
            <th>TELEFONO</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($tareas as $tarea){ ?>
          <tr>
            <?php $asignado = 0; ?>
            <?php if($tarea != 0): ?>
            <?php foreach ($tarea as $actividad){ ?>
            <?php if(isset($actividad['tbl_usuarios_ag_id_usuario']) && ($asignado != $actividad['tbl_usuarios_ag_id_usuario'])){ ?>
                <td><?php echo $actividad['tbl_usuarios_ag_id_usuario']; ?></td>
                <?php $asignado = $actividad['tbl_usuarios_ag_id_usuario']; ?>
            <?php } ?>
            <td>
                <?=(isset($actividad['id_usuario_responsable'])) ? $actividad['id_usuario_responsable']: ''; ?>
                /
                <?=(isset($actividad['institucion'])) ? $actividad['institucion']: ''; ?>
            </td>
            <?php $id_tarea = $actividad['id_tarea']; ?>
            <?php $id_asignado = $actividad['tbl_usuarios_ag_id_usuario']; ?>
            <?php } ?>
            <?php endif; ?>
            <?php 

                if(count($tarea) < $count){

                    $dif = $count - count($tarea);

                    for($j = 0; $j < $dif; $j++){

                        ?><td></td><?php

                    }

                }

            ?>
            <td>
                <select id="automovil_<?=(isset($id_tarea)) ? $id_tarea : ''; ?>">
                    <option value="0" data-type="AUTOMOVIL" data-date="<?=$fecha_resumen; ?>" data-asignado="<?=$asignado; ?>">Propio</option>
                    <?php if(isset($atributos['AUTOMOVIL'])){ ?>
                    <?php foreach ($atributos['AUTOMOVIL'] as $automovil) { ?>
                        <option id="opc_automovil_<?=$automovil['id_atributo']; ?>" value="<?=$automovil['id_atributo']; ?>" data-type="AUTOMOVIL" data-date="<?=$fecha_resumen; ?>" data-asignado="<?=$asignado; ?>">
                            <?php print_r($automovil['nombre_atributo']); ?>
                        </option>
                    <?php } ?>

                    <?php } ?>
                </select>
                <label>Otro</label>
                <input type="checkbox" id="otro_auto_<?=(isset($id_tarea)) ? $id_tarea : ''; ?>" name="otro_auto" onchange="agregar_coche('<?=(isset($id_tarea)) ? $id_tarea : ''; ?>')" />
                <input type="text" id="otro_auto_text_<?=(isset($id_tarea)) ? $id_tarea : ''; ?>" data-type="AUTOMOVIL" data-date="<?=$fecha_resumen; ?>" data-asignado="<?=$asignado; ?>" name="otro_auto" placeholder="Ejem. Tsuru Rojo" disabled="disabled" onchange="agregar_atributo('<?=(isset($id_tarea)) ? $id_tarea : ''; ?>', 'auto')" />
            </td>
            <td>
                <select id="telefono_<?=(isset($id_tarea)) ? $id_tarea : ''; ?>">
                    <option value="0" data-type="TELEFONO" data-date="<?=$fecha_resumen; ?>" data-asignado="<?=$asignado; ?>">Propio</option>
                    <?php if(isset($atributos['TELEFONO'])){ ?>
                    <?php foreach ($atributos['TELEFONO'] as $telefono) { ?>
                        <option id="opc_telefono_<?=$telefono['id_atributo']; ?>" value="<?=$automovil['id_atributo']; ?>" data-type="TELEFONO" data-date="<?=$fecha_resumen; ?>" data-asignado="<?=$asignado; ?>">
                            <?php print_r($automovil['nombre_atributo']); ?>
                        </option>
                    <?php } ?>

                    <?php } ?>
                </select>
                <label>Otro</label>
                <input type="checkbox" id="otro_tel_<?=(isset($id_tarea)) ? $id_tarea : ''; ?>" name="otro_auto" onchange="agregar_telefono('<?=(isset($id_tarea)) ? $id_tarea : ''; ?>')" />
                <input type="text" id="otro_tel_text_<?=(isset($id_tarea)) ? $id_tarea : ''; ?>" data-type="TELEFONO" data-date="<?=$fecha_resumen; ?>" data-asignado="<?=$asignado; ?>" name="otro_auto" placeholder="Ejem. Tsuru Rojo" disabled="disabled" onchange="agregar_atributo('<?=(isset($id_tarea)) ? $id_tarea : ''; ?>', 'tel')" />
            </td>
            <td>
            <a href="<?=(isset($actividad['tbl_usuarios_ag_id_usuario'])) ? base_url().'index.php/tareas/mostrar_vistas_c/tarea_dia_usuario/0/nm/'.$actividad['tbl_usuarios_ag_id_usuario'] : ''; ?>">
                <i class="foundicon-search">
                    Ver detalles
                </i>
            </a>
            </td>
          </tr>
        <?php } ?>
        </tbody> 
    </table>
        
    </div>
</div>