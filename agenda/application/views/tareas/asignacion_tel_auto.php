<?php

    $count = 0;

    foreach ($tareas as $tarea) {
        
        if($count < count($tarea)){

            $count = count($tarea);

        }

    }

?>
<div class="row">
    <div class="large-6 large-centered columns">
        <select name="date_resume" id="date_resume" onchange="resumen_date()">
            <option value="0">Elije una fecha para ver el resumen de ella</option>
            <?php foreach ($fechas as $fecha) {
                ?><option value="<?php print_r($fecha['fecha']); ?>"><?php print_r($fecha['fecha']); ?></option><?php
            } ?>
        </select>
    </div>
</div>
<div class="row">
    <div class="large-10 large-centered columns">
        <h2><small>Asignacion de autos del <?=isset($dia) ? $dia : ''; ?></small></h2>
    </div>
    </div>
<div class="row">
    <div class="large-6 large-centered columns">
    <table class="footable table">
        <thead>
          <tr>
            <th data-hide="">ASIGNADO</th>
            <?php for($i = 1; $i <= $count; $i++){ ?>

                <th data-hide="">ACTIVIDAD <?php echo($i); ?></th>

            <?php } ?>
            <th data-hide="">AUTOMOVIL</th>
            <th data-hide="">TELEFONO</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($tareas as $tarea){ ?>
          <tr>
            <?php $asignado = 0; ?>
            <?php if($tarea != 0): ?>
            <?php foreach ($tarea as $actividad){ ?>
            <?php if(isset($actividad['tbl_usuarios_ag_id_usuario']) && ($asignado != $actividad['tbl_usuarios_ag_id_usuario'])){ ?>
                <td><?php echo $usuarios[$actividad['tbl_usuarios_ag_id_usuario']]['nombre_real'].' '.$usuarios[$actividad['tbl_usuarios_ag_id_usuario']]['apellido_paterno']; ?></td>
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
                <select data-type="AUTOMOVIL" data-date="<?=$fecha_resumen; ?>" data-asignado="<?=$asignado; ?>" id="automovil_<?=(isset($id_tarea)) ? $id_tarea : ''; ?>">
                    <?php if(isset($atributos['AUTOMOVIL'])){ ?>
                    <?php foreach ($atributos['AUTOMOVIL'] as $automovil) { ?>
                        <option value="<?=$automovil['nombre_atributo']; ?>">
                            <?php print_r($automovil['nombre_atributo']); ?>
                        </option>
                    <?php } ?>

                    <?php } ?>
                </select>
                <label>Otro</label>
                <input type="checkbox" id="otro_auto_<?=(isset($id_tarea)) ? $id_tarea : ''; ?>" name="otro_auto" onchange="agregar_coche('<?=(isset($id_tarea)) ? $id_tarea : ''; ?>')" />
                <input type="text" id="otro_auto_text_<?=(isset($id_tarea)) ? $id_tarea : ''; ?>" data-type="AUTOMOVIL" data-date="<?=$fecha_resumen; ?>" data-asignado="<?=$asignado; ?>" name="otro_auto" placeholder="Ejem. Tsuru Rojo" disabled="disabled"/>
                <input type="text" class="button" onclick="agregar_atributo_s('<?=(isset($id_tarea)) ? $id_tarea : ''; ?>', 'auto')" value="Aceptar">
            </td>
            <td>
                <select data-type="TELEFONO" data-date="<?=$fecha_resumen; ?>" data-asignado="<?=$asignado; ?>" id="telefono_<?=(isset($id_tarea)) ? $id_tarea : ''; ?>">
                    <?php if(isset($atributos['TELEFONO'])){ ?>
                    <?php foreach ($atributos['TELEFONO'] as $telefono) { ?>
                        <option id="opc_telefono_<?=$telefono['id_atributo']; ?>" value="<?=$telefono['nombre_atributo']; ?>" data-type="TELEFONO" data-date="<?=$fecha_resumen; ?>" data-asignado="<?=$asignado; ?>">
                            <?php print_r($telefono['nombre_atributo']); ?>
                        </option>
                    <?php } ?>

                    <?php } ?>
                </select>
                <label>Otro</label>
                <input type="checkbox" id="otro_tel_<?=(isset($id_tarea)) ? $id_tarea : ''; ?>" name="otro_auto" onchange="agregar_telefono('<?=(isset($id_tarea)) ? $id_tarea : ''; ?>')" />
                <input type="text" id="otro_tel_text_<?=(isset($id_tarea)) ? $id_tarea : ''; ?>" data-type="TELEFONO" data-date="<?=$fecha_resumen; ?>" data-asignado="<?=$asignado; ?>" name="otro_auto" placeholder="Ejem. Tsuru Rojo" disabled="disabled" onchange="agregar_atributo('<?=(isset($id_tarea)) ? $id_tarea : ''; ?>', 'tel')" />
                <input type="text" class="button" onclick="agregar_atributo_s('<?=(isset($id_tarea)) ? $id_tarea : ''; ?>', 'tel')" value="Aceptar">
            </td>
          </tr>
        <?php } ?>
        </tbody> 
    </table>
        
    </div>
</div>