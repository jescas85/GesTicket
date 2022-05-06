
  <!-- Javascript Files
  ================================================== -->
  <!-- General JS Scripts -->
  <script src="<?=PATH?>views/public/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="<?=PATH?>views/public/bundles/chartjs/chart.min.js"></script>
  <script src="<?=PATH?>views/public/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?=PATH?>views/public/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="<?=PATH?>views/public/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?=PATH?>views/public/js/custom.js"></script>

  <!-- SELECCIONAR LA CLASE ACTIVE DEPENDIENDO LA OPCION DEL MENU -->
<script type="text/javascript">
    $(document).ready(function(){
        var cambio = false;
        $('li').removeClass("active");
        $('.sidebar-menu li a').each(function(index) {
            if(this.href.trim() == window.location){
                $(this).parent().addClass("active");
                cambio = true;
            }
        });
        if(!cambio){
            $('.sidebar-menu li:first').addClass("active");
        }
    });
</script>
