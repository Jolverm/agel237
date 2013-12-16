<div class="row">
    <table class="twelve">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Asignado</th>
            <th>Domicilio</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($tareas as $tarea): ?>
            <tr>
                <td><?=$tarea['fecha'] ?></td>
                <td><?=isset($tarea['hora']) ? $tarea['hora'] : ''; ?></td>
                <td><?=$tarea['tbl_usuarios_ag_id_usuario'] ?></td>
                <td><?=$tarea['domicilio'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>