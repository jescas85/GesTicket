<?php
	session_start();
	$askAjax = false;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
	<title><?=COMPANY;?> </title>
	<!-- Mobile Specific Metas
================================================== -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  	<meta name="description" content="Sistemas de Prevencion y Comunicacion S.A de C.V.">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

  <!-- Favicon
================================================== -->
	<link rel="icon" type="image/png" sizes="64x64" href="<?=PATH_IMG?>favicon.ico">

   <?php include("views/modules/_styles.php");
   ?> 
   	
	
</head>
<body>
<div class="body-inner">
	<?php
		/* Incluye el Header */
		require_once("./views/modules/header.php");

		// Incluir el archivo controlador viewsController.php
		require_once("./controllers/viewsController.php");

		//intancias la clase de viewsController
		$vw= new viewsController();
		//llamar a la funcion ó metodo get_views_controller de la clase viewsController
		$viewR = $vw ->get_views_controller();

		//otra forma de hacer la condicion if es asignar if(algo): else: endid; en vez de {}
		if ($viewR=="home"):
			require_once("./views/contents/home-view.php");
		elseif ($viewR=="404"): //pagina no encontrada
			require_once("./views/contents/404-view.php");
		else:
		// <!--====== Content page  -->
			require_once($viewR);
		endif; // FIN DEL IF 
	
	// <!--====== Footer -->
	 require_once("./views/modules/footer.php");
	//<!--====== Scripts -->
	 include("views/modules/_script.php"); ?>
	
</div>
</body>
</html>