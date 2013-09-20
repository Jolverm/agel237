<pre><?php //print_r($tareas); ?></pre>
<div class="row">
    <table class="footable table">
        <thead>
          <tr>
            <th data-hide="">Fecha</th>
            <th data-hide="phone">Cliente</th>
            <th data-hide="phone">Calle</th>
            <th data-hide="phone">Abogado</th>
            <th data-hide="phone">Institucion</th>
            <th data-hide="phone">Operacion</th>
            <th data-hide="phone">RPP</th>
            <th data-hide="phone">Números</th>
            <th data-hide="phone">Asignado</th>
            <th data-hide="phone">Domicilio</th>
            <th data-hide="phone">Horario</th>
            <th data-hide="phone">Observaciones</th>
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