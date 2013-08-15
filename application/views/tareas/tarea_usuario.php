<pre><?php //print_r($tareas); ?></pre>
<div class="row">
    <table class="twelve">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Calle</th>
            <th>Abogado</th>
            <th>Institucion</th>
            <th>Operacion</th>
            <th>RPP</th>
            <th>Números</th>
            <th>Asignado</th>
            <th>Domicilio</th>
            <th>Horario</th>
            <th>Observaciones</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($tareas as $tarea): ?>
            <tr>
                <td><?=$tarea['fecha'] ?></td>
                <td><?=$tarea['cliente'] ?></td>
                <td><?=$tarea['calle'] ?></td>
                <td><?=$tarea['tbl_usuarios_ag_id_usuario'] ?></td>
                <td><?=$tarea['institucion'] ?></td>
                <td><?=$tarea['operacion'] ?></td>
                <td><?=$tarea['rpp'] ?></td>
                <td><?=$tarea['numeros'] ?></td>
                <td><?=$tarea['id_usuario_responsable'] ?></td>
                <td><?=$tarea['domicilio'] ?></td>
                <td><?=isset($tarea['hora']) ? $tarea['hora'] : ''; ?></td>
                <td><?=$tarea['observaciones'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>