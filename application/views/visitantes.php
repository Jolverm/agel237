<?=(isset($encabezado)) ? $encabezado : ''; ?>
    
    <div class="row">
        <form action="<?=base_url(); ?>index.php/visitantes/agregar_visita_c" method="post">
            <fieldset class="large-8 small-6 large-centered small-centered">
            <legend>Registrar visita</legend>
                
                <label><input name="fecha" type="date">Fecha</label>
                <label><input name="nombre_cliente" type="text">Nombre</label>
                <label><input name="asunto" type="text">Asunto</label>
                <label><select name="abogado" id="">Abogado
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select></label>
                <label><input name="hora" type="time">Hora</label>
                <label><input name="1aviso" type="text">1° Aviso</label>
                <label><input name="2aviso" type="text">2° Aviso</label>
                
              </fieldset>
            <input class="button" type="submit" value="Agregar">
        </form>
</div>

<pre><?php //print_r($campos); ?></pre>

<?=(isset($pie)) ? $pie : ''; ?>