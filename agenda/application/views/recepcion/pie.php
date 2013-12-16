
<!-- Incluir archivos JS -->

<script type="text/javascript"> var b = '<?=base_url() . 'index.php/' ; ?>' ; </script>

<!-- Inserta la libreria de tablas responsivas -->
 <script src="<?=base_url(); ?>predeterminados/js/frameworks/vendor/zepto.js"></script>  
<!-- Inserta la libreria general de foundation -->
<script src="<?=base_url(); ?>predeterminados/js/frameworks/vendor/jquery.js"></script>

<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<!-- Inserta la libreria de tablas responsivas -->
 <script src="<?=base_url(); ?>predeterminados/js/frameworks/footable.js"></script>  
<!-- Inserta la libreria general de foundation -->
<script src="<?=base_url(); ?>predeterminados/js/frameworks/foundation.min.js"></script>
<!-- Inserta la libreria jQuery -->
<!-- Inserta la libreria de las funciones generales del sistema -->
<script src="<?=base_url(); ?>predeterminados/js/general.js"></script>
<!-- Inserta la libreria de tablas responsivas-->

<script type="text/javascript">
  $(function () {
    $('.footable').footable();
  });
</script>



<script>
    $(document).foundation();
  </script>



</body>
</html>