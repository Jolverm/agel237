<!--<pre><?php print_r($tareas); ?></pre>-->
<div class="row">
    <div class="large-8 large-centered columns ">
        <h2><small>Actividades del dia <?=isset($dia) ? $dia : ''; ?></small></h2>
    </div>

    <table class="footable table">
        <thead>
          <tr>
            <th data-hide="">Hora</th>
            <th data-hide="phone">Cliente</th>
            <th data-hide="phone">Calle</th>
            <th data-hide="phone">Abogado</th>
            <th data-hide="phone">Institucion</th>
            <th data-hide="phone">Operacion</th>
            <th data-hide="phone">RPP</th>
            <th data-hide="phone">Números</th>
            <th data-hide="phone">Asignado</th>
            <th data-hide="phone">Domicilio</th>
            <th data-hide="phone">Actividad</th>
            <th data-hide="phone">Horario</th>
            <th data-hide="phone">Observaciones</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($tareas as $tarea): ?>
            <tr>
            <td><?=(isset($tarea['hora']) && $tarea['hora'] != '00:00:00')  ? $tarea['hora'] : '-----'; ?></td>
            <td><?=isset($tarea['cliente']) ? $tarea['cliente'] : ''; ?></td>
            <td>
                <?php
                if(isset($tarea['calle'])):
                    switch ($tarea['calle']):
                        case(0):
                            echo 'NO';
                            break;
                        case(1):
                            echo 'SI';
                            break;
                        case(''):
                            echo '---';
                            break;
                    endswitch;
                endif; ?>
            </td> 
            <td><?=isset($tarea['id_usuario_responsable']) ? $tarea['id_usuario_responsable'] : ''; ?></td>
            <td><?=(isset($tarea['institucion']) && $tarea['institucion'] != '') ? $tarea['institucion'] : '-----'; ?></td>
            <td><?=(isset($tarea['operacion']) && $tarea['operacion'] != '' ) ? $tarea['operacion'] : '-----'; ?></td>
            <td>  <?php
                if(isset($tarea['rpp'])):
                    switch ($tarea['rpp']):
                        case('ESTADO'):
                            echo 'ESTADO';
                            break;
                        case('DF'):
                            echo 'DF';
                            break;
                        case(''):
                            echo '----';
                            break;
                    endswitch;
                endif; ?>
            </td>
           <td><?=(isset($tarea['numero']) && $tarea['numero'] != '') ? $tarea['numero'] : '-----'; ?></td>
           <td>
            <?php if(isset($usuarios)){ ?>
                    <?=isset($tarea['tbl_usuarios_ag_id_usuario'])  ?  $usuarios[$tarea['tbl_usuarios_ag_id_usuario']]['nombre_usuario'] : ''; ?></td>
                    <?php } ?>
            </td>
           <td><?=(isset($tarea['domicilio']) && $tarea['domicilio'] != '') ? $tarea['domicilio'] : '-----'; ?></td>
           <td><?=(isset($tarea['actividad']) && $tarea['actividad'] != '') ? $tarea['actividad'] : '-----'; ?></td>
           <td><?=(isset($tarea['horario']) && $tarea['horario'] != '') ? $tarea['horario'] : '-----'; ?></td>
           <td><?=$tarea['observaciones'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>