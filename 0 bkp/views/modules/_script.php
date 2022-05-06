
  <!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <script src="<?=PATH?>public/plugins/jQuery/jquery.min.js"></script>
  <!-- Bootstrap jQuery -->
  <script src="<?=PATH?>public/plugins/bootstrap/bootstrap.min.js" defer></script>
  <!-- Slick Carousel -->
  <script src="<?=PATH?>public/plugins/slick/slick.min.js"></script>
  <script src="<?=PATH?>public/plugins/slick/slick-animation.min.js"></script>
  <!-- Color box -->
  <script src="<?=PATH?>public/plugins/colorbox/jquery.colorbox.js"></script>
  <!-- shuffle -->
  <script src="<?=PATH?>public/plugins/shuffle/shuffle.min.js" defer></script>
  <!-- toastr -->
  <script src="<?=PATH?>public/plugins/toastr/toastr.min.js" defer></script>

  <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>

  <!-- Google Map API Key-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
  <!-- Google Map Plugin-->
  <script src="<?=PATH?>public/plugins/google-map/map.js" defer></script>

  <!-- Template custom -->
  <script src="<?=PATH?>public/js/script.js"></script>

<!-- script personalizados -->
  <script>

   $(window).on("load", function() {
     $('#client1').show();
     $('#client2').hide();
     $('#client3').hide();
     $('#client4').hide();
     $('#client5').hide();
     $('#client6').hide();
        //console.log( "Ha ocurrido window.load: ventana lista" );

        $('#viewClient1').click(function() {
        $('#client1').show();
        $('#client2').hide();
        $('#client3').hide();
        $('#client4').hide();
        $('#client5').hide();
        $('#client6').hide();
      });

      $('#viewClient2').click(function() {
        $('#client2').show();
        $('#client1').hide();
        $('#client3').hide();
        $('#client4').hide();
        $('#client5').hide();
        $('#client6').hide();
      });

      $('#viewClient3').click(function() {
        $('#client3').show();
        $('#client1').hide();
        $('#client2').hide();
        $('#client4').hide();
        $('#client5').hide();
        $('#client6').hide();
      });

      $('#viewClient4').click(function() {
        $('#client4').show();
        $('#client1').hide();
        $('#client2').hide();
        $('#client3').hide();
        $('#client5').hide();
        $('#client6').hide();
      });

      $('#viewClient5').click(function() {
        $('#client5').show();
        $('#client1').hide();
        $('#client2').hide();
        $('#client3').hide();
        $('#client4').hide();
        $('#client6').hide();
      });

      $('#viewClient6').click(function() {
        $('#client6').show();
        $('#client1').hide();
        $('#client2').hide();
        $('#client3').hide();
        $('#client4').hide();
        $('#client5').hide();
      });


    });
  </script>

<!-- SELECCIONAR LA CLASE ACTIVE DEPENDIENDO LA OPCION DEL MENU -->
<script type="text/javascript">
    $(document).ready(function(){
        var cambio = false;
        $('li').removeClass("active");
        $('.nav li a').each(function(index) {
            if(this.href.trim() == window.location){
                $(this).parent().addClass("active");
                cambio = true;
            }
        });
        if(!cambio){
            $('.nav li:first').addClass("active");
        }
    });
</script>

<!-- <script>
  $(function() {
    $('.toastrDefaultSuccess').submit(function() {
      toastr.success('aqui Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

  });
</script>  -->

<!--Aquí esta la referencia a jquery-->

<script>
$(document).ready(function() {  
  $('.form-control-number').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
      });

  $('#btn_send').one('click', function(e) {

    $('#contact-form').submit(function(e) {
      e.preventDefault();

      var url = "ajax/ajax_form_contact.php";
      var dataString = $('#contact-form').serialize();
      //console.log(dataString);

      $.ajax({
        type: "POST",
        url: url,
        data: dataString,
        DataType: "json",
        success: function(data){
          //Aquí validas lo que trae el nodo success ( $json['success'] )
          if( !data.success ){
              //Como el JSON trae un mensaje, lo puedes imprimir
              toastr.warning( data.message );
          }
          else{
              //Si te regresa un TRUE entonces ya puedes recargar
              toastr.success( data.message);
              //Todo lo que necesites hacer despues de que se termine de hacer la peticion
              $('#contact-form').trigger("reset");
          }
        },
        error: function(data){
            console.log("error")
        }     
      });
    });
	});
});
</script>
