<?php
session_start();
require_once("./core/MasterPDO.php");
  
if(isset($_POST["enviar"]) && $_POST["enviar"]=="si"){
    require_once("models/usersModel.php");
    $usuario = new User();
    $usuario->login();

    echo $_POST["enviar"];    
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?=COMPANY;?> </title>	
	<?php require_once("views/modules/_styles.php"); ?>	

</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <?php
          // Incluir el archivo controlador viewsController.php
          require_once("./controllers/viewsController.php");
          //intancias la clase de viewsController
          $vw= new viewsController();
          //llamar a la funcion ó metodo get_views_controller de la clase viewsController
          $viewR = $vw ->get_views_controller();
          //otra forma de hacer la condicion if es asignar if(algo): else: endid; en vez de {}
          if ($viewR=="login"):
            require_once ("./views/contents/login-view.php");
          else:
            if (isset($_SESSION["IDUser"])) {
        ?>
        <section>
            <!-- NavBar -->
            <?php require_once("views/modules/navbar.php"); ?>
            <!-- SideBar -->
            <?php require_once("views/modules/sidebar.php"); ?>          				
            <!-- Content page -->
            <?php  require_once($viewR);?>	
           
            <!-- Footer -->
            <?php require_once("views/modules/footer.php"); ?>			
          </section>
        <?php }else {
                require_once ("./views/contents/login-view.php");
              }
              endif;?>	
      
    </div>
  </div>
  <!--====== Scripts -->
	<?php require_once("views/modules/_script.php"); ?>
</body>

</html>