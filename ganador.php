<?php require_once('Connections/conec.php'); ?>
<?php

$ipAddress = $_SERVER['REMOTE_ADDR'];


if ($totalRows_muestra2 = $ipAddress) {
 		
		$mensaje="Lo sentimos, ya votaste . $totalRows_muestra2";	
		
		//echo "Problemas al insertar datos";
 		
	} else { 
		//mysql_select_db ($database_conec, $conec)or die("Problemas al conectar la Base de Datos");
	
		
		//$gracias="GRACIAS $ipAddress  por ser parte de las votaciones al mejor empleado del mes";
}

echo $hora

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bienvenido</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    
    <!-- count CSS -->
    <link href="css/count.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger text-info" href="#page-top"> Sistema de votación</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-info" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-info" href="#participantes">Participantes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-info" href="#ganador">Ganador!</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
<section id="participantes">

      <div class="container">
        <div class="row">
        
          <div class="col-lg-12 text-center">
          
            <h2 class="section-heading">Pronto se dara a conocer los resultados!.</h2>
            <hr class="my-4">
          </div>
          
        </div>
      </div>

      
      <div class="container">
        <div class="row">
<!--contometro-->
          		<div class="col-lg-12 text-center text-center">
               		<img src="img/logomin.png" alt="conex"><br><br><br>
                
				<div class="col-lg-12 reloj text-center">
					<p id="quedan" class="time-rest">FALTAN:</p>
				<div class="inline-block">
				<h2 class="counter1" id="dias">00</h2>
						<span class="pre block">días</span>
					</div>
					<div class="inline-block">
						<h2 class="counter" id="horas">00</h2>
						<span class="pre block">horas</span>
					</div>
					<div class="inline-block">
						<h2 class="counter" id="min">00</h2>
						<span class="pre block">min</span>
					</div>
					<div class="inline-block">
						<h2 class="counter" id="seg">00</h2>
						<span class="pre block">seg</span>
					</div>
				</div>
              
              </div>   
          
        </div>
      </div>
    </section>

<section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Proximamente los resultados!!!</h2>
        <br><br><br>
<div id="chart-1"></div>
      </div>
    </section>

    <div id="ganador">
      <div class="card-footer">
        <div class="col-lg-4 mx-auto text-center">
            <h2 class="section-heading">Asociacion Conexion.</h2>
            <hr class="my-4">
            <p class="mb-5"><img src="img/logomin.png" alt="conexion"></p>
        </div>

          <div class="col-lg-12 ml-auto text-center">
          <p>Dirección:  Calle La Reforma #249, Colonia San Benito, San Salvador, El Salvador.</p>
          <p>Teléfono:  +503 2249-2300</p>
          <p>E-mail:  info@conexion.sv</p>
          </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>
    
    <!--count regress -->
    <script src="js/count.js"></script>

  </b>

    <body>

  
</html>
