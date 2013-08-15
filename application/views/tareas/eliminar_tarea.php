<section class="row">
    <h4>Eliminar tarea</h4>
    <form method="post" onsubmit="return confirm('Seguro que desea borrar')" action="<?=base_url(); ?>index.php/tareas/eliminar_tarea_c">
    <!-- INICIA EL FORMULARIO EDITAR TAREA-->
     <?php //print_r($tareas); ?>
        <?php if(isset($tareas)): foreach ($tareas as $tarea): ?>
            <fieldset>
                
                <div class="four columns">
                     <select disabled="disabled">
                        <option value="1" <?=($tarea['id_tipo_tarea'] == 1) ? 'selected="selected"' : ''; ?>>Firma</option>
                        <option value="0" <?=($tarea['id_tipo_tarea'] == 0) ? 'selected="selected"' : ''; ?>>Tramite</option>
                      </select>
                </div>
            </fieldset>
            <fieldset>
                <legend>Fecha y Hora</legend>
                <div class="row">
                    <div class="six columns">
                        <label>Fecha</label>
                        <input disabled="disabled" type="date" name="fecha" value="<?=(isset($tarea['fecha'])) ? $tarea['fecha'] : ''; ?>" placeholder="dd/mm/aaaa" />
                    </div>
                    <div class="six columns">
                        <label>Hora</label>
                        <input disabled="disabled" type="time" name="hora" value="<?=(isset($tarea['hora'])) ? $tarea['hora'] : ''; ?>" placeholder="hh:mm" />
                    </div>
                </div>
            </fieldset>
            
              <fieldset>
            <legend>Datos generales</legend>
            <div class="row">
                <div class="four columns">
                    <label>Cliente</label>
                    <input disabled="disabled" type="text" name="cliente" value="<?=(isset($tarea['cliente'])) ? $tarea['cliente'] : ''; ?>" placeholder="Nombre del Cliente" />
                    </div>
                <div class="four columns">
                    <label>Abogado</label>
                    <select disabled="disabled" name="id_usuario_responsable">
                        <option value="1" <?=($tarea['id_usuario_responsable'] == 1) ? 'selected="selected"' : ''; ?>>1</option>
                        <option value="2" <?=($tarea['id_usuario_responsable'] == 2) ? 'selected="selected"' : ''; ?>>2</option>
                        <option value="3" <?=($tarea['id_usuario_responsable'] == 3) ? 'selected="selected"' : ''; ?>>3</option>
                        <option value="4" <?=($tarea['id_usuario_responsable'] == 4) ? 'selected="selected"' : ''; ?>>4</option>
                        <option value="1" <?=($tarea['id_usuario_responsable'] == 5) ? 'selected="selected"' : ''; ?>>5</option>
                        <option value="6" <?=($tarea['id_usuario_responsable'] == 6) ? 'selected="selected"' : ''; ?>>6</option>
                    </select>
                </div>
                <div class="four columns">
                    <label>Calle</label>
                    <select disabled="disabled" name="calle">
                        <option value="1" <?=($tarea['calle'] == 1) ? 'selected="selected"' : ''; ?>>SI</option>
                        <option value="0" <?=($tarea['calle'] == 0) ? 'selected="selected"' : ''; ?>>NO</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="four columns">
                    <label>Institucion</label>
                     <input disabled="disabled" type="text" name="institucion" value="<?=(isset($tarea['institucion'])) ? $tarea['institucion'] : ''; ?>" placeholder="PEMEX, BAJIO " />
                </div>
                <div class="four columns">
                    <label>Domicilio</label>
                    <input disabled="disabled" type="text" name="domicilio" value="<?=(isset($tarea['domicilio'])) ? $tarea['domicilio'] : ''; ?>" placeholder="insurgentes" />
                </div>
                <div class="four columns">
                    <label>Horario</label>
                     <input disabled="disabled" type="text" name="horario" value="<?=(isset($tarea['horario'])) ? $tarea['horario'] : ''; ?>" placeholder="10:00 a 13:00 hrs" />
                </div>
            </div>
            <div class="row">
                <div class="four columns">
                    <label>Actividad</label>
                     <input disabled="disabled" type="text" name="actividad" value="<?=(isset($tarea['actividad'])) ? $tarea['actividad'] : ''; ?>" placeholder="Recoger documentos" />
                </div>
                <div class="four columns">
                    <label>Operacion</label>
                     <input disabled="disabled" type="text" name="operacion" value="<?=(isset($tarea['operacion'])) ? $tarea['operacion'] : ''; ?>" placeholder="CV, Donacion, Poder" />
                    </div>
                <div class="four columns">
                    <label>RPP</label>
                    <select disabled="disabled" name="rpp">
                        <option value="DF" <?=($tarea['rpp'] == 'DF') ? 'selected="selected"' : ''; ?>>DF</option>
                        <option value="ESTADO" <?=($tarea['rpp'] == 'ESTADO') ? 'selected="selected"' : ''; ?>>ESTADO</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="four columns">
                    <label>Números</label>
                     <input disabled="disabled" type="text" name="numeros" value="<?=(isset($tarea['numeros'])) ? $tarea['numeros'] : ''; ?>" placeholder="12344,53211" />
                </div>
                <div class="four columns">
                    <label>Asignado</label>
                    <select disabled="disabled" name="tbl_usuarios_ag_id_usuario">
                        <option value="1" <?=($tarea['tbl_usuarios_ag_id_usuario'] == 1) ? 'selected="selected"' : ''; ?>>Gabriel</option>
                        <option value="2" <?=($tarea['tbl_usuarios_ag_id_usuario'] == 2) ? 'selected="selected"' : ''; ?>>Rodrigo</option>
                    </select>
                </div>
                <div class="four columns">
                    <label>Observaciones</label>
                    <input disabled="disabled" type="text" name="observaciones" value="<?=(isset($tarea['observaciones'])) ? $tarea['observaciones'] : ''; ?>" placeholder="ej. Puntual" />
                </div>
                <div> 
                    <div class ="four columns">
                    <input style="visibility: hidden" type="text" name="id_tarea" value="<?=(isset($tarea['id_tarea'])) ? $tarea['id_tarea'] : ''; ?>">
                </div>
                </div>
                
            </div>
            
            
            <div class="four columns centered">
                <input type="submit" class="button" value="Eliminar tarea" />
            </div>
        </fieldset>
    </form>
</section>
              <!-- TERMINA EL FORMULARIO EDITAR TAREA--> 
    
              
              
                <!-- INICIA EL FORMULARIO AGREGAR TAREA--> 
       
                <?php endforeach;  else: ?>
                <fieldset>
                <select class="four columns" name="id_tipo_tarea">
                    <option value="1" selected="selected">Firma</option>
                    <option value="0">Tramite</option>
                </select>
            </fieldset>
            <fieldset>
            <legend>Fecha y Hora</legend>
            <div class="row">
                <div class="six columns">
                    <label>Fecha</label>
                    <input type="date" name="fecha" placeholder="dd/mm/aaaa" />
                </div>
                <div class="six columns">
                    <label>Hora</label>
                    <input type="time" name="hora" placeholder="hh:mm">
                </div>
            </div>
        </fieldset>
                
            <fieldset>
            <legend>Datos generales</legend>
            <div class="row">
                <div class="four columns">
                    <label>Cliente</label>
                    <input type="text" name="cliente">
                </div>
                <div class="four columns">
                    <label>Abogado</label>
                    <select name="id_usuario_responsable">
                        <option value="1">1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                    </select>
                </div>
                <div class="four columns">
                    <label>Calle</label>
                    <select name="calle">
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="four columns">
                    <label>Institucion</label>
                    <input type="text" placeholder="PEMEX, BAJIO" name="institucion">
                </div>
                <div class="four columns">
                    <label>Domicilio</label>
                    <input type="text" placeholder="Insurgentes" name="domicilio">
                </div>
                <div class="four columns">
                    <label>Horario</label>
                    <input type="text" placeholder="10:00 a 13:00 hrs">
                </div>
            </div>
            <div class="row">
                <div class="four columns">
                    <label>Actividad</label>
                    <input type="text" placeholder="Entregar Recibos" name="actividad">
                </div>
                <div class="four columns">
                    <label>Operacion</label>
                    <input type="text" placeholder="CV, Donacion, Poder" name="operacion">
                </div>
                <div class="four columns">
                    <label>RPP</label>
                    <select name="rpp">
                        <option value="DF">DF</option>
                        <option value="ESTADO">ESTADO</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="four columns">
                    <label>Números</label>
                    <input type="text" name="numeros">
                </div>
                <div class="four columns">
                    <label>Asignado</label>
                    <select name="tbl_usuarios_ag_id_usuario">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                    </select>
                </div>
                <div class="four columns">
                    <label>Observaciones</label>
                    <input type="text" placeholder="ej. Puntual" name="observaciones"/>
                </div>
            </div>
            <div class="four columns centered">
                <input type="submit" class="button" value="Agendar" onClick="confirm( 'Estas Seguro que deseas eliminar?' )">/>
            </div>
        </fieldset>
    </form>
</section>

    
        <?php endif; ?>
        
                
             