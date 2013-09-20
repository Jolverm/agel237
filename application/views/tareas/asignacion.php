<div class="row">
    <div class="ten columns push-two">
        <h2><small>ASIGNACION DEL <?=isset($dia) ? $dia : ''; ?></small></h2>
    </div>
    <div class="large-6 large-centered columns">
    
        <form method="post" action="<?=base_url(); ?>index.php/tareas/resumen">
        <table class="footable table">
        <thead>
          <tr>
            <th>ASIGNADO</th>
            <th>ACTIVIDAD 1</th>
            <th>ACTIVIDAD 2</th>
            <th>ACTIVIDAD 3</th>
            <th>ACTIVIDAD 4</th>
            <th>ACTIVIDAD 5</th>
            <th>ACTIVIDAD 6</th>
            <th>AUTOMOVIL</th>
            <th>TELEFONO</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($actividades as $actividad): ?>
          
           <tr>
            <td>
                <select name="usuario_asignado">
                    <option value="JUAN" selected="selected">JUAN</option>
                    <option value="PEDRO">PEDRO</option>
                </select>
            </td>
            <td>
                <select name="act1">
                    <option value="viene de consulta" selected="selected">viene de consulta</option>
                    <option value="viene de consulta">viene de consulta</option>
                </select>
            </td>
            <td>
                <select name="act2">
                    <option value="viene de consulta" selected="selected">viene de consulta</option>
                    <option value="viene de consulta">viene de consulta</option>
                </select>
            </td>
            <td>
                <select name="act3">
                    <option value="viene de consulta" selected="selected">viene de consulta</option>
                    <option value="viene de consulta">viene de consulta</option>
                </select>
            </td>
            <td>
                <select name="act4">
                    <option value="viene de consulta" selected="selected">viene de consulta</option>
                    <option value="viene de consulta">viene de consulta</option>
                </select>
            </td>
            <td>
                <select name="act5">
                    <option value="viene de consulta" selected="selected">viene de consulta</option>
                    <option value="viene de consulta">viene de consulta</option>
                </select>
            </td>
            <td>
                <select name="act6">
                    <option value="viene de consulta" selected="selected">viene de consulta</option>
                    <option value="viene de consulta">viene de consulta</option>
                </select>/td>
            <td>
                <select name="auto">
                    <option value="chevy" selected="selected">chevy</option>
                    <option value="sentra">sentra</option>
                </select>
            </td>
            <td>
                <select name="telefono">
                    <option value="une1" selected="selected">Unefon 1</option>
                    <option value="une2">Unefon 2</option>
                </select>
            </td>
          
          
        <?php endforeach; ?>
        </tbody> 
    </table>
            <input type="submit" class="button" value="ACEPTAR" /> 
  
        </form>     
    </div>
</div>