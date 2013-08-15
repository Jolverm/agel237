<!DOCTYPE html>

<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width" />

  <title>Bienvenido a Empréndeme</title>
  
  <!-- Inserta los archivos de CSS -->
  <link rel="stylesheet" href="<?=base_url(); ?>predeterminados/css/frameworks/foundation.min.css">
  
  <!-- Inserta los archivos de tablas responsivas-->
  <link rel="stylesheet" href="<?=base_url(); ?>predeterminados/css/frameworks/responsive-tables.css">
  
  
  <!-- 
    Inserta los archivos CSS necesarios para los icon-fonts,
    quitar los comentarios del paquete a usar
  -->
  <!-- 
    Para cada hoja paquete de iconos se tienen 2 hojas de estilos diferentes,
    una para IE 8 y otra para el resto de los navegadores
  -->
  
  <!-- Iconos de generales -->
  <link rel="stylesheet" href="<?=base_url(); ?>predeterminados/css/frameworks/general_foundicons.css">
 <!--[if lt IE 8]>
    <link rel="stylesheet" href="<?=base_url(); ?>predeterminados/css/frameworks/general_foundicons_ie7.css">
  <![endif]-->
  
  <!-- Iconos generales en disco -->
<!-- <link rel="stylesheet" href="<?=base_url(); ?>predeterminados/css/frameworks/general_enclosed_foundicons.css">-->
  <!--[if lt IE 8]>
    <link rel="stylesheet" href="<?=base_url(); ?>predeterminados/css/frameworks/general_enclosed_foundicons_ie7.css">
  <![endif]-->
  
  <!-- Iconos de accesibilidad -->
<!-- <link rel="stylesheet" href="<?=base_url(); ?>predeterminados/css/frameworks/accessibility_foundicons.css">-->
  <!--[if lt IE 8]>
    <link rel="stylesheet" href="<?=base_url(); ?>predeterminados/css/frameworks/accessibility_foundicons_ie7.css">
  <![endif]-->
  
  <!-- Iconos de redes sociales -->
<!-- <link rel="stylesheet" href="<?=base_url(); ?>predeterminados/css/frameworks/social_foundicons.css">-->
  <!--[if lt IE 8]>
    <link rel="stylesheet" href="<?=base_url(); ?>predeterminados/css/frameworks/social_foundicons_ie7.css">
  <![endif]-->
  
  <!-- Inserta la libreria modernizer y jQuery, esta ultima desde los servidores de Google-->
  <script src="<?=base_url(); ?>predeterminados/js/frameworks/modernizr.foundation.js"></script>



</head>
<body>
    <header class="row" id="mensaje_head">
        <?php if((isset($mensaje) && $mensaje != 'sm')):?>
        <div class="alert-box success">
            <?=$mensaje ?>
            <a href="" class="close">&times;</a>
        </div>
        <?php endif; ?>
    </header>
     
