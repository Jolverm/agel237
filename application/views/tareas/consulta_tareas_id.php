        <!-- ID TAREA
         <div class="three columns centered">
         <?php foreach ($tareas as $tarea): ?>
         <h3>TAREA ID  <?=$tarea['id_tarea'] ?> </h3>
         </div>
         -->
    
         <p>
<div class="two columns centered"><p><label class="label"><?=($tarea['id_tipo_tarea'] == '1') ? 'FIRMA' : 'TRAMITE'; ?></label></p></div>        
       </p> 
    <!-- TIPO ACTIVIDAD-->
    <div class="row">
    <table class="six columns centered">
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
              <td><?=isset($tarea['institucion']) ? $tarea['institucion'] : ''; ?></td>
            </tr>
            <tr>
              <td><strong>CLIENTE</strong></td>
              <td><?=isset($tarea['horario']) ? $tarea['horario'] : ''; ?></td>
            </tr>
            
            <tr>
              <td><strong>ACTIVIDAD</strong></td>
              <td><?=isset($tarea['actividad']) ? $tarea['actividad'] : ''; ?></td>
            </tr>
            <tr>
              <td><strong>OPERACIÓN</strong> </td>
              <td><?=isset($tarea['operacion']) ? $tarea['operacion'] : ''; ?></td>
            </tr>
            <tr>
              <td><strong>ASIGNADOS</strong> </td>
              <td><?=isset($tarea['tbl_usuarios_ag_id_usuario']) ? $tarea['tbl_usuarios_ag_id_usuario'] : ''; ?></td>
            </tr>
            <tr>
              <td><strong>OBSERVACIONES</strong> </td>
              <td><?=isset($tarea['observaciones']) ? $tarea['observaciones'] : ''; ?></td>
            </tr>
            <tr>
              <td><strong>ABOGADO</strong></td>
              <td><?=isset($tarea['id_usuario_responsable']) ? $tarea['id_usuario_responsable'] : ''; ?></td>
            </tr>
            <tr>
              <td><strong>CALLE</strong> </td>
              <td><?=isset($tarea['calle']) ? $tarea['calle'] : ''; ?></td>
            </tr>
            <tr>
              <td><strong>NUMEROS</strong> </td>
              <td><?=isset($tarea['numeros']) ? $tarea['numeros'] : ''; ?></td>
            </tr>
            <tr>
                <td><strong>RPP </strong></td>
              <td><?=isset($tarea['rpp']) ? $tarea['rpp'] : ''; ?></td>
            </tr>
             
          </tbody>
    </table>
        </div>
        
   <?php endforeach; ?>



                