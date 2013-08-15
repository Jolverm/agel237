<div class="row">
    <div class="ten columns push-two">
        <h2><small>Actividades del dia <?=isset($dia) ? $dia : ''; ?></small></h2>
    </div>
    <div class="twelve columns">
    <table class="responsive">
        <thead>
          <tr>
            <th>Hora</th>
            <th>Cliente</th>
            <th>calle</th>
            <th>Abogado</th>
            <th>Institucion</th>
            <th>Operacion</th>
            <th>RPP</th>
            <th>Numeros</th>
            <th>Asignado</th>
            <th>Domicilio</th>
            <th>Horario</th>
            <th>Observaciones</th>
            <th>acciones</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($tareas as $tarea): ?>
          <tr>
            <td><?=isset($tarea['hora']) ? $tarea['hora'] : ''; ?></td>
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
                            echo '';
                            break;
                    endswitch;
                endif; ?>
            </td>    
            <td><?=isset($tarea['id_usuario_responsable']) ? $tarea['id_usuario_responsable'] : ''; ?></td>
            <td><?=isset($tarea['institucion']) ? $tarea['institucion'] : ''; ?></td>
            <td><?=isset($tarea['operacion']) ? $tarea['operacion'] : ''; ?></td>
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
                            echo '';
                            break;
                    endswitch;
                endif; ?>
           <td><?=isset($tarea['numero']) ? $tarea['numero'] : ''; ?></td>
            <td><?=isset($tarea['tbl_usuarios_ag_id_usuario']) ? $tarea['tbl_usuarios_ag_id_usuario'] : ''; ?></td>
            <td><?=isset($tarea['domicilio']) ? $tarea['domicilio'] : ''; ?></td>
            <td><?=isset($tarea['horario']) ? $tarea['horario'] : ''; ?></td>
            <td><?=isset($tarea['observaciones']) ? $tarea['observaciones'] : ''; ?></td>
            <td>
                <a onclick="ver_tarea('<?=isset($tarea['id_tarea']) ? $tarea['id_tarea'] : ''; ?>')" > <i class="foundicon-search">   - Ver</i></a>
                <a onclick="editar_tarea('<?=isset($tarea['id_tarea']) ? $tarea['id_tarea'] : ''; ?>')" > <i class="foundicon-edit">     -Editar</i></a>
                <a onclick="borrar_tarea('<?=isset($tarea['id_tarea']) ? $tarea['id_tarea'] : ''; ?>')" > <i class="foundicon-trash">     -Borrar</i></a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody> 
    </table>
        
        <div class="six columns push-eight">
           <a a href="<?=base_url(); ?>/index.php/tareas/mostrar_vistas_c/tarea_manana/" > <i class="foundicon-right-arrow">Dia sguiente</i></a>
        </div>
        
    </div>
</div>