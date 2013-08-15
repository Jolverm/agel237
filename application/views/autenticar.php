<form class="twelve" action="<?=base_url(); ?>/index.php/usuario/autenticar_c" method="POST">
 
     <fieldset class="six columns centered">

        <legend>Inicia Sesion</legend>
  
            <label>Usuario</label>
            <input type="text" name="nombre_usuario" placeholder="Ingresa tu usuario" autofocus />

            <label>Contraseña</label>
            <div class="two columns push-ten">
            <input type="password" name="contrasena"/>

            <input type="submit" class="button" value="Acceder" />
            </div>
 
     </fieldset>

</form>