<?php
	
	session_start();
	
		if(!isset($_SESSION["admin"])) {
		
			header("location:login_adm.php");
			
		}
	
require_once('Connections/conec.php');
mysqli_set_charset($conec,"utf8");

$count="SELECT
Sum(voto.voto) AS total,
voto.empleado_id,
voto.nombre,
voto.caracteristica,
voto.fecha,
voto.ip,
sedes.sede,
empleados.foto,
empleados.apellido
FROM
voto
INNER JOIN empleados ON voto.empleado_id = empleados.empleado_id
INNER JOIN sedes ON empleados.sede_id = sedes.sede_id

GROUP BY
voto.empleado_id
";

$Listar=mysqli_query($conec, $count);

if ($Listar = mysqli_query($conec, $count)) {
		
?>
<!DOCTYPE html>
<html>
<title>Administrador Conexion</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><form action="logout_adm.php" method="post"><input type="submit" name="cerrar" id="cerrar" class="btn btn-danger" value="Cerrar Sesión" /></form></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="img/icono.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    
    <div class="w3-col s8 w3-bar">
      <span>Bienbenido, <strong><?php echo $_SESSION["admin"]?></strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Menu Opciones</h5>
  </div>
  <div class="w3-bar-block">
    <a href="" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="Insetar_User.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Insertar Usuarios</a>
    <br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Administrador</b></h5>
  </header>
<?php  while ($Row=mysqli_fetch_assoc($Listar)) {?>
  <div class="w3-panel">
    
  </div>
  <hr>
  <p>&nbsp;</p>
  <table width="92%" class="w3-center col-lg-3 col-md-3 col-sm-5 col-xl-4 border-primary border-top container-fluid border-bottom">
    <tr>
      <td width="20%" rowspan="3" class="w3-xlarge w3-text-blue"><img src="img/<?php echo $Row['foto']?>" class="w3-left"></td>
      <td colspan="2" class="w3-xlarge w3-text-blue"><?php echo $Row['nombre']." ". $Row['apellido']; ?></td>
    </tr>
    <tr>
      <td width="76%" class="text-info h4"><?php echo $Row['sede']; ?></td>
      <td width="4%" rowspan="2"><p class="h5">TOTAL:</p><br>
	  <p class="h3"><?php echo $Row['total']; ?></p></td>
    </tr>
  </table>
<?php }
     mysqli_free_result($Listar);
}
		/* cerrar la conexión */
	mysqli_close($conec); 
?>
  <!-- Footer --><!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>