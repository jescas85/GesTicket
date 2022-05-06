
<div id="banner-area" class="banner-area" style="background-image:url(<?=PATH_IMG?>banner/ticket.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Ticket de Servicio</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Ticket</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

<section id="main-container" class="main-container">
  <div class="container">

  <div class="row text-center">
      <div class="col-12">      
      <h2 class="section-title">Ponemos a tu disposición nuestro formulario para que te comuniques con nosotros y reportes alguna anomalia con tu servicio</h2>
      <h3 class="section-sub-title">¿En que te podemos ayudar?</h3>
      </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
      <div class="col-md-12">
        <h3 class="column-title">Generar nuevo ticket</h3>
        <!-- contact form works with formspree.io  -->
        <!-- contact form activation doc: https://docs.themefisher.com/constra/contact-form/ -->
        <form id="contact-form"  method="post" role="form">
          <input type="hidden" id="seccion" name="seccion" value="ticket">
          <div class="error-container"></div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Cliente</label>
                <input class="form-control form-control-number" name="txt_name" id="txt_name" placeholder="Codigo de Monitoreo" type="text" maxlength="6"  required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Sucursal</label>
                <input class="form-control form-control-name" name="txt_sucursal" id="txt_sucursal" placeholder="Sucursal a reportar" type="text" required>
              </div>
            </div>            
            <div class="col-md-4">
              <div class="form-group">
                <label>Tipo de Servicio</label>
                <select class="form-control form-control-subject" name="txt_subject" id="txt_subject" placeholder="" required>
                  <option value="">Seleccione Servicio</option>
                  <option value="Alarmas">Alarmas</option>
                  <option value="CCTV">CCTV</option>
                  <option value="Cercos Electrificados">Cercos Electrificados</option>
                  <option value="Control de Acceso">Control de Acceso</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Email</label>
                <input class="form-control form-control-email" name="txt_email" id="txt_email" placeholder="" type="email"
                  required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Empresa</label>
                <input class="form-control form-control-name" name="txt_company" id="txt_company" placeholder="" type="text" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>Ciudad</label>
                <input class="form-control form-control-email" name="txt_city" id="txt_city" placeholder="" type="text"
                  required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>Teléfono</label>
                <input class="form-control form-control-number" name="txt_phone" id="txt_phone" placeholder="" type="text" maxlength="10" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Mensaje</label>
            <textarea class="form-control form-control-message" name="txt_message" id="txt_message" placeholder="" rows="10"
              required></textarea>
          </div>
          <div class="text-right"><br>
            <button class="btn btn-primary solid blank" type="submit" id="btn_send" name="btn_send">Generar Ticket</button>
          </div>
        </form>
      </div>

    </div><!-- Content row -->     
      <div class="gap-40"></div>


    

    <div class="row">
      <div class="col-md-6">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
          <a title="Ubicación" href="https://goo.gl/maps/VRAN4fRth8eQxW3m8" target="_blank"><i class="fas fa-map-marker-alt mr-0"></i></a>
          </span>
          <div class="ts-service-box-content">
            <h4>Visite nuestra oficina</h4>
            <p>97100 PROTEGE Calle 19 No. 84 x 12 y 14, Colonia Itzmina, Mérida, Yucatán (Matriz)</p>
          </div>
        </div>
      </div><!-- Col 1 end -->

      <!--<div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
          <a title="Ubicación" href="mailto:contacto@seguridadprotege.com"><i class="fa fa-envelope mr-0"></i></a>
          </span>
          <div class="ts-service-box-content">
            <h4>Envíanos un correo electrónico</h4>
            <p>contacto@seguridadprotege.com</p>
          </div>
        </div>
      </div> Col 2 end -->

      <div class="col-md-6">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
          <a href="tel:+529999269945"><i class="fa fa-phone-square mr-0"></i></a>
          </span>
          <div class="ts-service-box-content">
            <h4>Llámanos</h4>
            <p>+ 52 (999) 926-41-71<br>
               + 52 (999) 926-99-45</p>
          </div>
        </div>
      </div><!-- Col 3 end -->

    </div><!-- 1st row end -->

    <!-- <div class="gap-60"></div>

    <div class="google-map">
      <div id="map" class="map" data-latitude="20.99242721089783" data-longitude="-89.60736338466006" data-marker="<?=PATH_IMG?>marker.png" data-marker-name="Protege Matriz"></div>
    </div> -->

    

    
  </div><!-- Conatiner end -->
</section><!-- Main container end -->


