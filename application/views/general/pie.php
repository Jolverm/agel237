<footer class="row" id="mensaje_foo">
</footer>
<!-- Incluir archivos JS -->


<!-- Inserta la libreria de tablas responsivas -->
 <script src="<?=base_url(); ?>predeterminados/js/frameworks/vendor/zepto.js"></script>  
<!-- Inserta la libreria general de foundation -->
<script src="<?=base_url(); ?>predeterminados/js/frameworks/vendor/jquery.js"></script>


<!-- Inserta la libreria de tablas responsivas -->
 <script src="<?=base_url(); ?>predeterminados/js/frameworks/footable.js"></script>  
<!-- Inserta la libreria general de foundation -->
<script src="<?=base_url(); ?>predeterminados/js/frameworks/foundation.min.js"></script>
<!-- Inserta la libreria jQuery -->
<!-- Inserta la libreria de las funciones generales del sistema -->
<script src="<?=base_url(); ?>predeterminados/js/general.js"></script>
<!-- Inserta la libreria de tablas responsivas-->
<script type="text/javascript"> var b = '<?=base_url() . 'index.php/' ; ?>' ; </script>

<script type="text/javascript">
  $(function () {
    $('.footable').footable();
  });
</script>



<script>
    $(document).foundation();
  </script>

<script>
    $(document).ready(function() {
    $(".tipoTramite").change(function() {
      var vm = $('.tipoTramite').val();
      if(vm == 1){
         $('.firmas').show();
        $('.tramites').hide(1000);
      } else {
         $('.tramites').show();
        $('.firmas').hide(1000);
      }
      
    });
});
 </script>

<script>
    $(document).ready(function() {
      var ocultar = $('.tipoTramiteEdicion').val();
      if(ocultar == 1){
         $('.firmas').show();
        $('.tramites').hide(1000);
      } else {
         $('.tramites').show();
        $('.firmas').hide(1000);
      } 
  });
 </script>


</body>
</html>
