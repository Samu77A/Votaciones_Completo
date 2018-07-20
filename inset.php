<?php
	
	session_start();
	
		if(!isset($_SESSION["admin"])) {
		
			header("location:login_adm.php");
			
		}
	

	$usuario= $_POST["usu"];
	$password= $_POST["contra"];
	$tipoUser= $_POST["tipo"];
	$nom= $_POST["nombre"];
	$ape= $_POST["ape"];
	$email= $_POST["email"];
	$Es= $_POST["estato"];
		
	$encriptado= password_hash($password, PASSWORD_DEFAULT, array("cost"=>12));
	//$encriptado=hash("whirlpool",$contrasenia);	
				
	try{

		$base=new PDO('mysql:host=localhost; dbname=conexion_db', 'root', '');
		
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$base->exec("SET CHARACTER SET utf8");		
		
		
		$sql="INSERT INTO usuarios (usuario, password, tipo_cuenta, nombre, apellido, email, estado) VALUES ( :usu, :password, :tipo, :nombre, :ape, :email, :estado)";
		
		$resultado=$base->prepare($sql);		
		
		
		$resultado->execute(array(":usu"=>$usuario, ":password"=>$encriptado, ":tipo"=>$tipoUser, ":nombre"=>$nom, ":ape"=>$ape, ":email"=>$email, ":estado"=>$Es));		
		
		//echo "Registro insertado";
		
		
		header("location:Insetar_User.php");
		
		$resultado->closeCursor();

	}catch(Exception $e){		
		
		
		//echo "Línea del error: " . $e->getLine();
		
	
	}
	

?>

