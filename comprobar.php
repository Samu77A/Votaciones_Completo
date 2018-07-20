
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<?php
session_start();

try{
	
    $conec=new PDO("mysql:host=localhost; dbname=conexion_db" , "root", "");
		
	$conec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}catch(PDOException $e){
	//die ($e->getMessage());
    echo "ERROR: " . $e->getMessage();

}

$usuario=htmlentities(addslashes($_POST["usuario"]));
		
$password=htmlentities(addslashes($_POST["password"]));

$sql = $conec->prepare('SELECT * FROM usuarios WHERE usuario = :usuario'); 

$sql->execute(array(':usuario' => $usuario));
		
$resultado = $sql->fetch(PDO::FETCH_ASSOC);

//echo 'SELECT * FROM usuarios WHERE usuario = :usuario';

if ($resultado) { //Retorna TRUE en caso de encontrar datos referentes al USUARIO
         
		 	if (password_verify($password,$resultado['password'])) {//Validamos que coincidan las Contraseñas

            	if ($resultado['tipo_cuenta'] == 'admin') {//Validamos los Tipos de Cuenta del Usuario

                $_SESSION['admin'] = $_POST["usuario"];
               
			    echo "Eres Administrador";
                header("Location: dashboard.php");

             } else if($resultado['tipo_cuenta'] == 'user'){

                $_SESSION['user'] =$_POST["usuario"];
                
				echo "Eres Normal";
                header("Location: participantes.php"); 
            }

         } else {
			 
			header("location:login_adm.php");
			
            echo "class=\"text-white\"><h2>\"Contraseña incorrecta\"</h2><br>";
         }

} else {
	
	echo "<br class=\"text-white\"><h2>\"Usuario no existe\"</h2><br>";
	
	header("location:login_adm.php");
	
    
}

?>

