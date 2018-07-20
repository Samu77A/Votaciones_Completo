<?php 	
	session_start();
	
		if(!isset($_SESSION["user"])) {
		
			header("location:login_adm.php");
		
		}

	require_once('Connections/conec.php');
	mysqli_set_charset ($conec ,"utf8");
		
?>


<?php	
$IDe=$_POST['IDemple'];


//isset($_GET['error']);
//isset($_GET['msj']);

//echo $_GET['error'];

$consulta = "SELECT
empleados.empleado_id,
empleados.sede_id,
empleados.nombre,
empleados.apellido,
empleados.cargo,
empleados.email,
empleados.telefono,
empleados.foto,
empleados.empleado_estado,
sedes.sede_id,
sedes.sede
FROM
empleados
INNER JOIN sedes ON empleados.sede_id = sedes.sede_id
WHERE
empleados.empleado_id ='$IDe'";

$resultado = mysqli_query($conec, $consulta);

if ($resultado = mysqli_query($conec, $consulta)) {
	
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

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">
    <link href="css/creative.css" rel="stylesheet" type="text/css">
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-dark" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-dark" href="#participantes">Participantes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-dark" href="#ganador">Ganador!</a>
            </li>
             <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#"></a>
            </li>
            <li class="nav-item dropleft">
              <a class="nav-link js-scroll-trigger" href="logout_adm.php"><i class="fa fa-sign-out">   Cerrar Sesión</i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <section class="bg-white text-dark" id="inicio">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white"></h2>
            <hr class="light my-4">
            <p class="text-dark mb-4">
            	<?php if (isset($_GET['error'])!=''){
						
						$error=$_GET['error']; ?>
						
						<?php echo $error; } ?>  
                <?php if (isset($_GET['msj'])!=''){
						
						$msj=$_GET['msj'];
						
						echo $msj;
					} ?>           
            </p>
            
          </div>
        </div>
      </div>
    </section>
    
   <hr class="border-info col-lg-11 col-md-11 col-xl-10">
 <hr>
<section class="p-0 border-dark" id="portfolio">
<?php while ($ver = mysqli_fetch_assoc($resultado)) { ?>
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          
          
          
         
          <div class="col-lg-3 col-sm-3 text-center">
          
          <img class="img-fluid" src="img/<?php echo $ver['foto'];?>" alt="<?php echo $ver['empleado_id'];?>">
            
        
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  
                   <h2 class="text-info"><?php echo $ver['nombre']." " . $ver['apellido'];?></h2>
                   <h6 class="text-muted"><?php echo $ver['cargo'];?></h6>
                </div>
              </div>
          <?php //echo $ver['empleado_id'];?>
          </div>
          <div class="col-lg-9 col-sm-9">
          
           	<form action="comprobar1.php" method="post" >
 					 <div class="form-row">
    						<div class="col-md-10 mb-10">
     							<label for="nombreCompleto">Tu LIKE sera para</label>
      						<input type="text" class="form-control border-top border-primary" id="nombreCompleto1" name="nombreCompleto1" value="<?php echo $ver['nombre']." " . $ver['apellido'];?>" disabled>
    						</div>
    						<div class="col-md-5 mb-3">
      							<label for="cargo">Cargo</label>
      							<input type="text" class="form-control border-top border-primary" id="cargo" name="cargo" value="<?php echo $ver['cargo']?>" disabled>
    						</div>
                            <div class="col-md-5 mb-3">
      							<label for="centro">Centro de Formación</label>
      							<input type="text" class="form-control border-top border-primary" id="centro" name="centro" value="<?php echo $ver['sede']?>" disabled>
    						</div>
                            <div class="col-md-10 mb-7">
      							<label for="caracteristica">Caracteristica Principal de <?php echo $ver['nombre'];?> </label>
      							<input type="text" class="form-control border-top border-primary" id="caracteristica" name="caracteristica" value="" required>
    						</div>
                            <div class="col-md-10 mb-10">
      							<label for="descripcion" class="text-dark"><?php echo "Por que has dado tu voto a " . $ver['nombre']?></label>
                                <textarea class="form-control border-warning border-top" id="descripcion" name="descripcion" ></textarea>
    						</div>
                            	<div class="col-auto"><input type="hidden" name="IDv1" id="IDv1" value="<?php echo $ver['empleado_id'];?>"></div>
                                <div class="col-auto"><input type="hidden" name="nombreCompleto" id="nombreCompleto" value="<?php echo $ver['nombre']?>"></div>
                            		
            				<div class="col-md-12 mb-12 text-left">
                    			<label for="enviar"></label>
      								<input type="submit" name="enviar" id="enviar" class="btn btn-primary mb-4" value="Enviar"/>
    						</div>
                  			</form>
          </div>
        </div>
      </div>          
        <?php }

    /* liberar el conjunto de resultados */
     mysqli_free_result($resultado);
}
		/* cerrar la conexión */
	mysqli_close($conec); ?>
          
    </section>    


  

  <br><br>
<section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Proximamente los resultados!!!</h2>
        <a class="btn btn-light btn-xl sr-button" href="ganador.php">Ver!</a>
      </div>
  </section>

    <div id="ganador">
      <div class="card-footer">
        <div class="col-lg-4 mx-auto text-center">
            <h2 class="section-heading">Asociacion.</h2>
            <hr class="my-4">
            <p class="mb-5"><img src="img/logomin.png" alt="conexion"></p>
        </div>
        <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading"></h2>
            <hr class="my-4">
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

  </body>

</html>

