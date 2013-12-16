
<div class="row">
		<form action="<?=base_url(); ?>/index.php/usuario/agregar_usuario" method="post">
			<fieldset class="large-8 small-6 large-centered small-centered">
			<legend>Agregar usuario</legend>
			<?php foreach ($campos as $campo) { ?>
				<?php

				if($campo->name == 'id_usuario'){
					continue;
				}

					switch ($campo->type) {
						case 'int':
							$type = 'number';
							break;
						
						default:
							$type = 'text';
							break;
					}

					if($campo->name == 'contrasena'){

						$type = 'password';

					}

					$label = ucfirst(str_replace(array('tbl_roles_ag_id_rol', '_', 'contrasena'), array('Rol de usuario', ' ', 'contraseña'), $campo->name));

				?>
				<label for="<?php echo $campo->name; ?>"><?php echo $label; ?></label>
				<?php if($campo->name != 'tbl_roles_ag_id_rol'){ ?>
					<input required type="<?php echo $type; ?>" name="<?php echo $campo->name; ?>" maxlength="<?php echo $campo->max_length; ?>">
				<?php } else { ?>
					<select name="<?php echo $campo->name; ?>">
						<?php foreach ($roles as $rol) { ?>
							<option value="<?php echo $rol['id_rol'] ?>"><?php echo $rol['nombre_rol'] ?></option>
						<?php } ?>
					</select>
				<?php } ?>
			<?php } ?>
			</fieldset>
			<input class="button" type="submit" value="Agregar">
		</form>
</div>

<pre><?php //print_r($campos); ?></pre>