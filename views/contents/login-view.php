  <?=session_destroy();?>
  <div class="loader"></div>
  <div id="app">
      <section class="section">
          <div class="container mt-5">
              <div class="row">
                  <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                      <div class="card author-box card-primary">
                          
						  	  <div class="author-box-center mt-4">
                                  <img alt="image" src="<?=PATH;?>/views/public/img/logo_cielo.png"
                                      class="rounded-circle author-box-picture">
                              </div>
							  <div class="text-center pt-2">
                                  <h3>Acceso GesTicket</h3>
                              </div>
							  <div class="card-header">
                          	</div>
                          <div class="card-body">
                              <form method="POST" action="" autocomplete="off" class="needs-validation" novalidate=""
                                  id="login_form">

                                  <?php
										if (isset($_GET["m"])) {
											switch ($_GET["m"]) {
												case '1':
													?>
                                                <div class="alert alert-danger alert-has-icon">
                                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                                    <div class="alert-body">
                                                        <div class="alert-title">ERROR</div>
                                                        El Correo Electrónico y/o Contraseña son incorrectos.
                                                    </div>
                                                </div>

                                  <?php
													break;                            
											}
										}
									?>
                                  <div class="form-group">
                                      <label for="UserEmail">Email</label>
                                      <input id="UserEmail" type="email" class="form-control" name="UserEmail"
                                          tabindex="1" required autofocus>
                                      <div class="invalid-feedback">
                                          Por favor, introduce tu Correo Electrónico
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="d-block">
                                          <label for="UserPass" class="control-label">Password</label>
                                          <div class="float-right">
                                              <a href="auth-forgot-password.html" class="text-small">
                                                  Olvidaste tu Contraseña?
                                              </a>
                                          </div>
                                      </div>
                                      <input id="UserPass" type="password" class="form-control" name="UserPass"
                                          tabindex="2" required>
                                      <div class="invalid-feedback">
                                          Por favor introduce tu Contraseña
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="custom-control custom-checkbox">
                                          <input type="checkbox" name="remember" class="custom-control-input"
                                              tabindex="3" id="remember-me">
                                          <label class="custom-control-label" for="remember-me">Recordarme</label>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <input type="hidden" name="enviar" class="form-control" value="si">
                                      <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                          Iniciar sesión
                                      </button>
                                  </div>
                              </form>
                          </div>
                      </div>
                      <div class="mt-5 text-muted text-center">
                          Desea crear una nueva cuenta de usuario? <a href="auth-register.html">Crear Una</a>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>