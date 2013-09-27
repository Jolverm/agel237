<section class="row">
    <br>
    <br>
    <h4><?=($tipo_formulario == 'agregar_tarea_c') ? 'Agregar nueva tarea' : 'Editar está tarea'; ?></h4>
    <form method="post" action="<?=base_url(); ?>index.php/tareas/<?=$tipo_formulario; ?>">
    <!-- INICIA EL FORMULARIO EDITAR TAREA-->
       <?php if(isset($tareas)): foreach ($tareas as $tarea): ?>
                <input style="display:none" type="text" name="id_tarea" value="<?=(isset($tarea['id_tarea'])) ? $tarea['id_tarea'] : ''; ?>">
                <select class="large-2 large-offset-5 large-centered tipoTramiteEdicion"  id="id_tipo_tarea" name="id_tipo_tarea" >
                    <option value="1" <?=($tarea['id_tipo_tarea'] == 1) ? 'selected="selected"' : ''; ?>>Firma</option>
                    <option value="0" <?=($tarea['id_tipo_tarea'] == 0) ? 'selected="selected"' : ''; ?>>Tramite</option>
                </select>
            
            <fieldset>
                <legend>Fecha y Hora</legend>
                    <label>Fecha</label>
                    <input type="date" name="fecha" value="<?=(isset($tarea['fecha'])) ? $tarea['fecha'] : ''; ?>" placeholder="dd/mm/aaaa" />
                    <label>Hora</label>
                    <input type="time" name="hora" value="<?=(isset($tarea['hora'])) ? $tarea['hora'] : ''; ?>" placeholder="hh:mm" />                    
            </fieldset>
            
            <fieldset>
                <legend>Datos generales</legend>
                    <label>Cliente</label>
                    <input type="text" name="cliente" value="<?=(isset($tarea['cliente'])) ? $tarea['cliente'] : ''; ?>" placeholder="Nombre del Cliente" />
                    <label>Abogado(s)</label>
                    <input type="text" name="id_usuario_responsable" value="<?=(isset($tarea['id_usuario_responsable'])) ? $tarea['id_usuario_responsable'] : ''; ?>"placeholder="Ej. 1,7,3" required="required"/>
                    <label style="display:none"  class="firmas">Calle</label>
                    <select style="display:none"  class="firmas" name="calle">
                        <option value="1" <?=($tarea['calle'] == 1) ? 'selected="selected"' : ''; ?>>SI</option>
                        <option value="0" <?=($tarea['calle'] == 0) ? 'selected="selected"' : ''; ?>>NO</option>
                    </select>
                    <label style="display:none"  class="firmas">Institucion</label>
                    <input style="display:none"  class="firmas" type="text" name="institucion" value="<?=(isset($tarea['institucion'])) ? $tarea['institucion'] : ''; ?>" placeholder="PEMEX, BAJIO " />
                    <label  style="display:none"  class="tramites">Domicilio</label>
                    <input  style="display:none"  class="tramites" type="text" name="domicilio" value="<?=(isset($tarea['domicilio'])) ? $tarea['domicilio'] : ''; ?>" placeholder="insurgentes" />
                    <label style="display:none"  class="tramites">Horario</label>
                     <input style="display:none"  class="tramites" type="text" name="horario" value="<?=(isset($tarea['horario'])) ? $tarea['horario'] : ''; ?>" placeholder="10:00 a 13:00 hrs" />
                    <label style="display:none"  class="tramites">Actividad</label>
                     <input style="display:none"  class="tramites" type="text" name="actividad" value="<?=(isset($tarea['actividad'])) ? $tarea['actividad'] : ''; ?>" placeholder="Recoger documentos" />
                    <label style="display:none"  class="firmas">Operacion</label>
                     <input style="display:none"  class="firmas" type="text" name="operacion" value="<?=(isset($tarea['operacion'])) ? $tarea['operacion'] : ''; ?>" placeholder="CV, Donacion, Poder" />
                    <label style="display:none"  class="firmas">RPP</label>
                    <select style="display:none"  class="firmas" name="rpp">
                        <option value="DF" <?=($tarea['rpp'] == 'DF') ? 'selected="selected"' : ''; ?>>DF</option>
                        <option value="ESTADO" <?=($tarea['rpp'] == 'ESTADO') ? 'selected="selected"' : ''; ?>>ESTADO</option>
                    </select>
                    <label  style="display:none" class="firmas" >Números</label>
                    <input  style="display:none" class="firmas" type="text" name="numeros" value="<?=(isset($tarea['numeros'])) ? $tarea['numeros'] : ''; ?>" placeholder="12344,53211" />
                    <label>Asignado</label>
                    <select name="tbl_usuarios_ag_id_usuario">
                    <?php if(isset($usuarios)){ ?>
                    <?php foreach ($usuarios as $usuario) { ?>
                            <option value="<?=$usuario['id_usuario']; ?>" <?=($tarea['tbl_usuarios_ag_id_usuario'] == $usuario['id_usuario']) ? 'selected="selected"' : ''; ?>>
                            <?php echo $usuario['nombre_usuario']; ?>
                        </option>
                    <?php } ?>

                    <?php } ?>
                </select>
                    <label>Observaciones</label>
                    <input type="text" name="observaciones" value="<?=(isset($tarea['observaciones'])) ? $tarea['observaciones'] : ''; ?>" placeholder="ej. Puntual" />
                <input type="submit" class="button" value="Guardar Cambios" />
        </fieldset>
    </form>
</section><!-- TERMINA EL FORMULARIO EDITAR TAREA--> 
    
<?php endforeach;  else: ?>

<!-- INICIA EL FORMULARIO AGREGAR TAREA--> 
<section class="row">
    <select class="large-2 small-6 small-offset-3 large-offset-3  large-centered tipoTramite" id="id_tipo_tarea" name="id_tipo_tarea">
        <option value="none">Elige una actividad</option>
        <option value="1">Firma</option>
        <option value="0">Tramite</option>
    </select>
       
     <fieldset class="large-6 small-6 small-centered large-centered columns">
        <legend>Fecha y Hora</legend>
            <div>
                 <label>Fecha</label>
                 <input type="date" name="fecha" placeholder="dd/mm/aaaa" />
            </div>
            <div>
                 <label>Hora</label>
                 <input type="time" name="hora" placeholder="hh:mm">
            </div>
    </fieldset>
         
    <fieldset class="large-6 large-centered columns">
        <legend>Datos generales</legend>
            <label>Cliente</label>
            <input type="text" name="cliente">
            <label>Abogado(s)</label>
            <input type="text" name="id_usuario_responsable" placeholder="Ej. 1,7,3" />
            <label style="display:none"  class="firmas">Calle</label>
            <select style="display:none"  class="firmas" name="calle">
                <option value="1">SI</option>
                <option value="0">NO</option>
            </select>
            <label style="display:none"  class="firmas">Institucion</label>
            <input style="display:none"  class="firmas" type="text" placeholder="PEMEX, BAJIO" name="institucion">    
            <label style="display:none"  class="tramites">Domicilio</label>
            <input style="display:none"  class="tramites" type="text" placeholder="Insurgentes" name="domicilio">
            <label style="display:none"  class="tramites">Horario</label>
            <input style="display:none"  class="tramites" type="text" placeholder="10:00 a 13:00 hrs" name="horario"> 
            <label style="display:none"  class="tramites">Actividad</label>
            <input style="display:none"  class="tramites" type="text" placeholder="Entregar Recibos" name="actividad">
            <label style="display:none"  class="firmas">Operacion</label>
            <input style="display:none"  class="firmas" type="text" placeholder="CV, Donacion, Poder" name="operacion">
            <label style="display:none"  class="firmas">RPP</label>
            <select style="display:none" class="firmas" name="rpp">
                <option value="NA" selected>NO APLICA</option>
                <option value="DF">DF</option>
                <option value="ESTADO">ESTADO</option>
            </select>
            <label style="display:none" class="firmas">Números</label>
            <input style="display:none" class="firmas" type="text" name="numeros">
            <label>Asignado</label>
            <select name="tbl_usuarios_ag_id_usuario">
                    <?php if(isset($usuarios)){ ?>
                    <?php foreach ($usuarios as $usuario) { ?>
                        <option value="<?=$usuario['id_usuario']; ?>">
                            <?php echo $usuario['nombre_usuario']; ?>
                        </option>
                    <?php } ?>

                    <?php } ?>
                </select>
            <label>Observaciones</label>
            <input type="text" placeholder="ej. Puntual" name="observaciones"/>
            <input type="submit" class="button" value="Agendar" />
        </fieldset>
</section>

  <!-- TERMINA EL FORMULARIO AGREGAR TAREA-->        
        <?php endif; ?>
        
                
             