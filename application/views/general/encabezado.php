<!DOCTYPE html>
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Agenda Electronica Notaría 237 DF</title>
  <!-- Inserta los archivos de CSS -->
  <link rel="stylesheet" href="<?=base_url(); ?>predeterminados/css/frameworks/foundation.min.css">
  <!-- Inserta los archivos de tablas responsivas-->
  <link rel="stylesheet" href="<?=base_url(); ?>predeterminados/css/frameworks/footable.core.css">
  <link rel="stylesheet" href="<?=base_url(); ?>predeterminados/css/frameworks/footable.metro.css">

  <!-- Iconos Generales oundicons -->
  <link rel="stylesheet" href="<?=base_url(); ?>predeterminados/css/frameworks/general_foundicons.css">    
  <!-- Inserta la libreria modernizer y jQuery, esta ultima desde los servidores de Google-->
  <script src="<?=base_url(); ?>predeterminados/js/frameworks/vendor/custom.modernizr.js"></script>
</head> <!-- Termina Head-->

<body>
    <header class="row" id="mensaje_head">
        <?php if((isset($mensaje) && $mensaje != 'sm')):?>
        <div class="alert-box success">
            <?=$mensaje ?>
            <a href="" class="close">&times;</a>
        </div>
        <?php endif; ?>
    </header>
     
