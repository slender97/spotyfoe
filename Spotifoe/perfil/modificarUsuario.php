<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<title>Actualizar Datos</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="../style/basic.css">
	<link rel="shortcut icon" href="../favicon.ico">
</head>
<body>
<?php
	function test_input($data){
		$data = trim($data); //SE DESHACE DE LOS ESPACIOS EN BLANCO AL FINAL
		$data = stripslashes($data); //ELIMINA BACKSLASHES
		$data = htmlspecialchars($data); //CONVIERTE CARACTERES ESPECIALES A ENTIDADES HTML (!!!PREVIENE ATAQUES)
		return $data;
	}

	$errNombre = $errUser = $errPass = $errPass2 = $errEmail = $errEmail2 = $errFecha = $errGenero = "";
	$txtNombre = $txtPass = $txtEmail = $txtFecha = "";
	$txtUser = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$valido = true;
		//LEER LOS DATOS
		if (empty($_POST["txNombre"])){
			$errNombre = "";
		} else {
			$txtNombre = test_input($_POST["txNombre"]);	
		}
		if (empty($_POST["txUser"])){
			$errUser = "El nombre de usuario es requerido";
			$valido = false;
		} else {
			$txtUser = test_input($_POST["txUser"]);	
		}
		if (empty($_POST["txPass"])){
			$errPass = "La contraseña es requerida";
			$valido = false;
		} else if ($_POST["txPass"] == $_POST["txPass2"]){
			$txtPass = test_input($_POST["txPass"]);
		} else {
			$errPass2 = "Las contraseñas no coinciden";
			$valido = false;
		}
		if (empty($_POST["txEmail"])){
			$errEmail = "El email es requerido";
			$valido = false;
		} else if ($_POST["txEmail"] == $_POST["txEmail2"]){
			$txtEmail = test_input($_POST["txEmail"]);
			if (!filter_var($txtEmail, FILTER_VALIDATE_EMAIL)){
				$errEmail = "Ingresa un email valido";
				$valido = false;
			}
		} else {
			$errEmail2 = "Los emails no coinciden";
			$valido = false;
		}
		if (empty($_POST["txYear"]) or empty($_POST["txMes"]) or empty($_POST["txDia"])){
			$errFecha = "Ingrese una fecha valida";
			$valido = false;
		} else {
			$txtFecha = test_input($_POST["txYear"] . "-" . $_POST["txMes"] . "-" . $_POST["txDia"]);
		}
		if (empty($_POST["txGenero"])){
			$errGenero = "El genero es requerido";
			$valido = false;
		} else {
			$txtGenero = test_input($_POST["txGenero"]);
		}
		if ($valido){
			//REALIZAR LA CONEXION CON LA BASE DE DATOS
			include("../connection.php");
			 	
			$conn = connect("usuarios");
			//echo "Connected successfully <br>";
			$txtNombre = mysqli_real_escape_string($conn, $txtNombre);
			$txtUser = mysqli_real_escape_string($conn, $txtUser);
			$txtPass = mysqli_real_escape_string($conn, $txtPass);
			$txtEmail = mysqli_real_escape_string($conn, $txtEmail);
			$txtFecha = mysqli_real_escape_string($conn, $txtFecha);
			$txtGenero = mysqli_real_escape_string($conn, $txtGenero);
			$test = mysqli_query($conn,"SELECT NOMBRE, EMAIL FROM USUARIO where username = '$txtUser'");
			$testr = mysqli_fetch_assoc($test);
				$sql = "UPDATE USUARIO SET 
				NOMBRE='$txtNombre', 
				password='txtPass', 
				EMAIL='$txtEmail', 
				GENERO=$txtGenero;
				WHERE username = '$txtUser'";
				if (mysqli_query($conn, $sql)){
					//AGREGADO CORRECTAMENTE
					//¡¡¡¡¡¡¡¡¡¡ABRIR PAGINA DE INICIAR SESION!!!!!!!!!! xdxdxd
					header("Location:iniciarSesion.html");
				} else {
					//echo "Error " . $sql . "<br>" . mysqli_error($conn);
				}	
			$res = $testr['Nombre'];			
			mysqli_close($conn);	
		}
		

	}
?>
<div id="header">
	<p id="titulo">Actualizar Datos</p><br>
</div>
<div id="contenido">
<div id="imagen">
	<img src="../images/imagen.png" width="200px" height="200px">
</div>
<h1> prueba: <?php $res; ?></h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
	<div id="inputs">
	<input type="text" class="texto" name="txNombre" value=$testr['Nombre'] value="<?php echo $txtNombre; ?>"><br>
	<span class="error"><?php echo $errNombre; ?></span><br>
	<input type="password" class="texto" name="txPass" placeholder="Contraseña"><br>
	<span class="error"><?php echo $errPass; ?></span><br>
	<input type="password" class="texto" name="txPass2" placeholder="Confirmar contraseña"><br>
	<span class="error"><?php echo $errPass2; ?></span><br>
	<input type="text" class="texto" name="txEmail" value=$testr['EMAIL'] value="<?php echo $txtEmail; ?>"><br>
	<span class="error"><?php echo $errEmail; ?></span><br>
	<input type="text" class="texto" name="txEmail2" placeholder="Confirmarprueba email"><br>
	<span class="error"><?php echo $errEmail2; ?></span><br>
	Masculino <input type="radio" name="txGenero" <?php if (isset($txtGenero) and $txtGenero) echo "checked"; ?> value=true>
	Femenino <input type="radio" name="txGenero" <?php if (isset($txtGenero) and !$txtGenero) echo "checked"; ?> value=false><br>
	<span class="error"><?php echo $errGenero; ?></span><br><br>
	<input class="boton" type="submit" value="Registrarse">
	</div>
</div>
</form>
</body>
</html>