<div class="row">
    <div class="large-8 large-centered columns ">
        <h2><small>Actividades del dia <?=isset($dia) ? $dia : ''; ?></small></h2>
    </div>
    <div class="large-12 large-centered columns">
    <table class="footable table">
        <thead>
          <tr>
            <th data-hide="">Hora</th>
            <th data-hide="">Cliente</th>
            <th data-hide="phone">calle</th>
            <th data-hide="phone">Abogado</th>
            <th data-hide="phone">Institucion</th>
            <th data-hide="phone">Operacion</th>
            <th data-hide="phone">RPP</th>
            <th data-hide="phone">Numeros</th>
            <th data-hide="phone">Asignaddo</th>
            <th data-hide="phone">Domicilio</th>
            <th data-hide="phone">actividad</th>            
            <th data-hide="phone">Horario</th>
            <th data-hide="phone">Observaciones</th>
            <th data-hide="phone" id="no-print">acciones</th>
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
                            echo '---';
                            break;
                    endswitch;
                endif; ?>
            </td> 

           
            <td><?=isset($tarea['id_usuario_responsable']) ? $tarea['id_usuario_responsable'] : ''; ?></td>
            <td><?=(isset($tarea['institucion']) && $tarea['institucion'] != '') ? $tarea['institucion'] : '-----'; ?></td>
            <td><?=(isset($tarea['operacion']) && $tarea['operacion'] != '' ) ? $tarea['operacion'] : '-----'; ?></td>
             <td>
                <?php
                if(isset($tarea['rpp'])):
                    switch ($tarea['rpp']):
                        case('ESTADO'):
                            echo 'ESTADO';
                            break;
                        case('DF'):
                            echo 'DF';
                            break;
                        case(''):
                            echo 'N/A';
                            break;
                    endswitch;
                endif; ?>
            </td> 
            <td>
                <?=(isset($tarea['numeros']) && $tarea['numeros'] != '') ? $tarea['numeros'] : '-----'; ?>
            </td>
            <td>
            <?php if(isset($usuarios)){ ?>
                <?=isset($tarea['tbl_usuarios_ag_id_usuario'])  ?  $usuarios[$tarea['tbl_usuarios_ag_id_usuario']]['nombre_usuario'] : ''; ?>
            <?php } ?>
            </td>
           <td><?=(isset($tarea['domicilio']) && $tarea['domicilio'] != '') ? $tarea['domicilio'] : '-----'; ?></td>
            <td><?=(isset($tarea['actividad']) && $tarea['actividad'] != '') ? $tarea['actividad'] : '-----'; ?></td>
            <td><?=(isset($tarea['horario']) && $tarea['horario'] != '' )? $tarea['horario'] : '-----'; ?></td>
            <td><?=isset($tarea['observaciones']) ? $tarea['observaciones'] : ''; ?></td>
            <td id="no-print">
                <a onclick="ver_tarea('<?=isset($tarea['id_tarea']) ? $tarea['id_tarea'] : ''; ?>')" > <i class="foundicon-search">   - Ver</i></a>
                <a onclick="editar_tarea('<?=isset($tarea['id_tarea']) ? $tarea['id_tarea'] : ''; ?>')" > <i class="foundicon-edit">     -Editar</i></a>
                <a onclick="borrar_tarea('<?=isset($tarea['id_tarea']) ? $tarea['id_tarea'] : ''; ?>')" > <i class="foundicon-trash">     -Borrar</i></a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody> 
    </table>
        
        <?php if(!$manana){ ?>
        <div class="six columns push-eight" id="no-print">
           <a a href="<?=base_url(); ?>/index.php/tareas/mostrar_vistas_c/tarea_manana/" >
                <i class="foundicon-right-arrow">
                    Dia sguiente
                </i>
            </a>
        </div>
        <?php } ?>
    </div>
</div>