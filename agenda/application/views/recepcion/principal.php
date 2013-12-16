<?=doctype('html5'); ?>
<html>
    <head>
        <?=(isset($encabezado)) ? $encabezado : ''; ?>
    </head>
    <body>
        <?=(isset($contenido)) ? $contenido : ''; ?>
    </body>
</html>