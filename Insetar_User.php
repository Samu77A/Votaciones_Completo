<?php
	
	session_start();
	
		if(!isset($_SESSION["admin"])) {
		
			header("location:login_adm.php");
			
		}
	
require_once('Connections/conec.php');

$sqlV="voto.usuario_id,
voto.empleado_id,
voto.nombre,
voto.voto,
voto.caracteristica,
voto.descripcion,
voto.fecha,
voto.hora,
voto.ip
FROM
voto
ORDER BY
voto.usuario_id ASC";

$most=mysqli_query($conec, $sqlV);

 
		
?>
<!DOCTYPE html>
<html>
<title>Administrador Conexion-Insetar</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
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
    <a href="dashboard.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-home fa-fw"></i>  Inicio</a>
    <br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Insetar Usuarios</b></h5>
  </header>
<?php if ($most = mysqli_query($conec, $sqlV)) {
           while ($rowV = mysqli_fetch_assoc($most)) { }} ?>
  
  <form action="inset.php" method="post" class="padding_left1 border-info border-top">
 	 <div class="form-row">
    	<div class="col-md-5 mb-5">
     		<label for="usu">Usuario</label>
      			<input type="text" name="usu" id="usu" class="form-control row" required>
    	</div>
        <div class="col-md-5 mb-5">
     		<label for="contra">Contraseña</label>
      				<input type="password" name="contra" id="contra" class="form-control row" required>		
    	</div>
        <div class="col-md-5 mb-5">
     		<label for="tipo" >Tipo de Cuenta</label>
      			<select name="tipo" id="tipo" class="form-control row">
           	  		<option value="">----Seleccione uno----</option>
            		<option value="admin">admin</option>
                	<option value="user">user</option>
            	</select>		
    	</div>
        <div class="col-md-5 mb-5">
     		<label for="nombre">Nombre</label>
      				<input type="text" name="nombre" id="nombre" class="form-control row" required>		
    	</div>
        <div class="col-md-5 mb-5">
     		<label for="nombre">Nombre</label>
      				<input type="text" name="nombre" id="nombre" class="form-control row" required>		
    	</div>
        <div class="col-md-5 mb-5">
     		<label for="ape">Apellido</label>
      				<input type="text" name="ape" id="ape" class="form-control row">		
    	</div>
        <div class="col-md-5 mb-5">
     		<label for="email">Email</label>
      				<input type="email" name="email" id="email" class="form-control row">	
    	</div>
        <div class="col-md-5 mb-5">
     		<label for="email">Estado</label>
      				<input type="text" name="estato" id="estato" class="form-control row">	
    	</div>
        <div class="col-md-5 mb-5">
     		<label for="enviando"></label>
      				<input type="submit" name="enviando" value="Guardar" class="btn btn-success">	
    	</div>
      </div>
    </form>

  <div class="w3-panel">
    
  </div>
  <hr>
  <br>

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