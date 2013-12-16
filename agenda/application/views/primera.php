<div class="row">
       <form action="<?=base_url(); ?>index.php/visitantes/agregar_visita_primera_c" method="post">
            <fieldset class="large-8 small-6 large-centered small-centered">
            <legend>Registro de consultas por primera vez</legend>
                
                <label> fecha 
                    <input name="fecha" type="date">
                </label>
                <label> Hora<input name="hora" type="time"></label>
                <label> Nombre cliente<input name="nombre" type="text"></label>
                <label> Telefono<input name="telefono" type="text"></label>
                <label> Asunto<input name="asunto" type="text"></label>
                <label>Abogado<select name="atendio" id="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select></label>   
                <label>H    ora de atencion <input value="hora_atencion" type="time"></label>

              </fieldset>
            <input class="button" type="submit" value="registrar">
        </form>
</div>
