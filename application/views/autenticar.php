<form class="large-6 large-centered columns" action="<?=base_url(); ?>/index.php/usuario/autenticar_c" method="POST">
 
     <fieldset>
        <legend>Inicia Sesion</legend>
  
            <label>Usuario</label>
            <input type="text" name="nombre_usuario" placeholder="Ingresa tu usuario" autofocus />
            <label>Contraseña</label>
            <input type="password" name="contrasena"/>
            <input type="submit" class="button" value="Acceder" />
      </fieldset>
</form>