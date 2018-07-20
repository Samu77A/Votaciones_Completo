<?php require_once('Connections/conec.php'); ?>
<?php

session_start();

if ($_SESSION['user']){

$hora =time('H:i:s');
	
$fecha=date("j, n, Y");

$ipAddress=$_SERVER['REMOTE_ADDR'];

$IDin=$_POST['IDv1'];

$Nomb=$_POST['nombreCompleto'];

$Desc=$_POST['descripcion'];

$carac=$_POST['caracteristica'];



$sql_user="SELECT * FROM usuarios WHERE usuario='".$_SESSION['user']."'";

$users = mysqli_query($conec, $sql_user);

$users1 = mysqli_fetch_assoc($users);

$guardar_usu=$users1['usuario_id'];



$query_listar = "SELECT count(usuario_id)AS total FROM voto WHERE usuario_id='$guardar_usu'  ";
$listar = mysqli_query($conec, $query_listar);
$row_listar = mysqli_fetch_assoc($listar);

$count=$row_listar['total'];

if ($count <= 3){

$inser="INSERT INTO voto SET 
			usuario_id='$guardar_usu',
			empleado_id='$IDin', 
			nombre='$Nomb', 
			voto='1',
			caracteristica='$carac',  
			descripcion='$Desc',
			fecha='$fecha',
			hora='$hora',
			ip='$ipAddress'";
		mysqli_query($conec, $inser);
		

$msj="Gracias por su voto.";
$msj.="<br>";
$msj.="Datos insetados";
$msj.="<br>";
$msj.="Usted puede votar una vez mas";

header("location:resultado.php"); 

} else {
 
$error="Usted ya ha votado.";
 
header ("location:resultado.php?error=$error");	
}
	
};

//mysqli_free_result(mysqli_result,$row_listar);


mysqli_close($conec);


?>
