        <!-- ID TAREA
         <div class="three columns centered">
         <?php foreach ($tareas as $tarea): ?>
         <h3>TAREA ID  <?=$tarea['id_tarea'] ?> </h3>
         </div>
         -->
    
         <p>
<div class="large-1 large-centered columns"><p><label class="label"><?=($tarea['id_tipo_tarea'] == '1') ? 'FIRMA' : 'TRAMITE'; ?></label></p></div>        
       </p> 
    <!-- TIPO ACTIVIDAD-->
    <div class="row">
      <div class="large-5 large-centered columns">
        <table class="footable table">
              <tbody>
                  <tr>
                    <td><strong>FECHA</strong></td> 
                    <td><?=isset($tarea['fecha']) ? $tarea['fecha'] : ''; ?></td>
                </tr>
                <tr>
                   <td><strong>HORA</strong></td> 
                    <td><?=isset($tarea['hora']) ? $tarea['hora'] : ''; ?></td>
               </tr>
        
              <tr>
                  <td><strong>INSTITUCIÓN</strong> </td> 
                  <td><?=(isset($tarea['institucion']) && $tarea['institucion'] != '') ? $tarea['institucion'] : '-----'; ?></td>
                </tr>
                <tr>
                  <td><strong>CLIENTE</strong></td>
                  <td><?=(isset($tarea['cliente']) && $tarea['cliente'] != '') ? $tarea['cliente'] : ''; ?></td>
                </tr>
                
                <tr>
                  <td><strong>ACTIVIDAD</strong></td>
                  <td><?=(isset($tarea['actividad']) && $tarea['actividad'] != '') ? $tarea['actividad'] : '-----'; ?></td>
                </tr>
                <tr>
                  <td><strong>OPERACIÓN</strong> </td>
                  <td><?=(isset($tarea['operacion']) && $tarea['operacion'] != '') ? $tarea['operacion'] : '-----'; ?></td>
                </tr>
                <tr>
                  <td><strong>ASIGNADOS</strong> </td>
                  <td><?=isset($tarea['tbl_usuarios_ag_id_usuario']) ? $tarea['tbl_usuarios_ag_id_usuario'] : ''; ?></td>
                </tr>
                <tr>
                  <td><strong>OBSERVACIONES</strong> </td>
                  <td><?=(isset($tarea['observaciones']) && $tarea['observaciones'] != '') ? $tarea['observaciones'] : ''; ?></td>
                </tr>
                <tr>
                  <td><strong>ABOGADO</strong></td>
                  <td><?=isset($tarea['id_usuario_responsable']) ? $tarea['id_usuario_responsable'] : ''; ?></td>
                </tr>
                <tr>
                  <td><strong>CALLE</strong> </td>
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
                </tr>
                <tr>
                  <td><strong>NUMEROS</strong> </td>
                  <td><?=(isset($tarea['numeros']) && $tarea['numeros'] != '') ? $tarea['numeros'] : '----'; ?></td>
                </tr>
                <tr>
                    <td><strong>RPP </strong></td>
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
                                echo '---';
                                break;
                        endswitch;
                    endif; ?>
              </td> 
                </tr>
                 
              </tbody>
        </table>
    </div>
  </div>
        
   <?php endforeach; ?>



                