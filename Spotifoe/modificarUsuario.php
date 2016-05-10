<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<title>Actualizar Datos</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="style/basic.css">
	<link rel="shortcut icon" href="favicon.ico">
</head>
<body>
<?php
	function test_input($data){
		$data = trim($data); //SE DESHACE DE LOS ESPACIOS EN BLANCO AL FINAL
		$data = stripslashes($data); //ELIMINA BACKSLASHES
		$data = htmlspecialchars($data); //CONVIERTE CARACTERES ESPECIALES A ENTIDADES HTML (!!!PREVIENE ATAQUES)
		return $data;
	}

	include("connection.php");

	$conn = connect("usuarios");

	$txtUserID = $_GET['userID'];

	$valorInicial = mysqli_query($conn,"SELECT NOMBRE, EMAIL, GENERO FROM USUARIO where USERID = '$txtUserID'");
	$valorInicialR = mysqli_fetch_assoc($valorInicial);

	$txtNombre = $valorInicialR['NOMBRE'];
	$txtEmail = $valorInicialR['EMAIL'];
	if ($valorInicialR['GENERO']==1){
		$txtGenero = true;
	} else {
		$txtGenero = false;
	}

	mysqli_close($conn);

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$txtNombre = test_input($_POST["txNombre"]);
		$txtGenero = test_input($_POST["txGenero"]);
		//REALIZAR LA CONEXION CON LA BASE DE DATOS
		$conn = connect("usuarios");
		//echo "Connected successfully <br>";
		$txtNombre = mysqli_real_escape_string($conn, $txtNombre);
		$txtGenero = mysqli_real_escape_string($conn, $txtGenero);
		$sql = "UPDATE USUARIO SET 
				NOMBRE='$txtNombre', 
				GENERO=$txtGenero
				WHERE USERID = '$txtUserID'";
		if (mysqli_query($conn, $sql)){
			//AGREGADO CORRECTAMENTE
			//¡¡¡¡¡¡¡¡¡¡ABRIR PAGINA DE INICIAR SESION!!!!!!!!!! xdxdxd
			header("Location:perfil.php?userID=$txtUserID");
		} else {
			echo "Error " . $sql . "<br>" . mysqli_error($conn);
		}				
		mysqli_close($conn);	
		

	}
?>
<div id="container">
	<div id="content">
		<div id="header"><p id="titulo">Actualizar Datos</p><br></div>
		<div id="contenido">
			<div id="imagen"><img src="images/imagen.png" width="200px" height="200px"></div>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?userID='.$txtUserID;?>" method="post">
				<div id="inputs">
					<input type="text" class="texto" name="txNombre" value="<?php echo $txtNombre;?>" ><br><br>
					Masculino <input type="radio" name="txGenero" <?php if ($txtGenero) echo "checked"; ?> value=true>
					Femenino <input type="radio" name="txGenero" <?php if (!$txtGenero) echo "checked"; ?> value=false><br><br>
					<input class="boton" type="submit" value="Actualizar">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>