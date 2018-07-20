<?php
session_start();
	
		if(!isset($_SESSION["user"])) {
		
			header("location:participantes.php");
		
		}else{

 session_destroy();
 
	require_once('Connections/conec.php');
	mysqli_set_charset ($conec ,"utf8");
?>

<?php
$consulta = "SELECT
empleados.empleado_id,
empleados.sede_id,
empleados.nombre,
empleados.apellido,
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
empleados.empleado_id = empleados.empleado_id";

$resultado = mysqli_query($conec, $consulta);


$menu = "SELECT * FROM usuarios WHERE usuario=usuario";

$respuesta=mysqli_query($conec,$menu);


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

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"> Sistema de votación</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#inicio">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#participantes">Participantes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#ganador">Ganador!</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href=""></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href=""></a>
            </li>
            <?php  //En el if va la variable con la que identificas al usuario
            if($_SESSION['user'] == $respuesta){ ?>
       		
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="logout_adm.php"><i class="fa fa-sign-out">   Cerrar Sesión</i></a>
            </li>

			<?php }else {?>
            
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login_adm.php"><i class="fa fa-user-circle">  Iniciar Sesión</i></a>
            </li>
            
			<?php }; ?>
            
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong class="z-index2"><img src="img/logo1.png" alt="Conexion" title="Sitema Conexion"/></strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Bienvenido al sistema de votacion de conexion para saber el quien es el mejor empleado del mes..</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#participantes">Vota</a>
          </div>
        </div>
      </div>
    </header>
    <section class="bg-primary" id="inicio">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Hola, Debes iniciar sesión para participar</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4"></p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="login_adm.php">Empezemos!</a>
          </div>
        </div>
      </div>
    </section>

<section id="participantes">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Participantes!.</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
    <?php    if ($resultado = mysqli_query($conec, $consulta)) {
           while ($row = mysqli_fetch_assoc($resultado)) { ?>
            
          <div class="col-lg-3 col-md-4 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class=" text-primary mb-3 sr-icons"><img src="img/<?php echo $row['foto']; ?>" alt="<?php echo $row['empleado_id']; ?>"/></i>
              <h3 class="mb-3"><?php echo $row['nombre'] ." " .$row['apellido']; ?></h3> 
             <p class="text-muted mb-0"><?php echo $row['sede']; ?></p>
             
            </div>
          </div>
<?php }

    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
}

/* cerrar la conexión */
mysqli_close($conec); ?>
        </div>
      </div>
    </section>

<section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Proximamente los resultados!!!</h2>
        <a class="btn btn-light btn-xl sr-button" href="ganador.php">Ver!</a>
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

  </b>

    <body>
 
</html>
 <?php } ?>