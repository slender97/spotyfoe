<?php
	include("connection.php");
	$id = $_GET['userID'];
	$nombre = $username = $email = $fecha = $genero = "";
	$con = connect("usuarios");
	$query = mysqli_query($con,"SELECT USERID, NOMBRE, USERNAME, PASSWORD, EMAIL, FECHA, GENERO   FROM usuario WHERE USERID= $id");
	while ($res = mysqli_fetch_assoc($query)) {
		$nombre = $res['NOMBRE'];
		$username = $res['USERNAME'];
		$email = $res['EMAIL'];
		$fecha = $res['FECHA'];
		if ($res['GENERO']=1){
			$genero = "Masculino";
		}
		else {
			$genero = "Femenino";
		}
	}
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Perfil - <?php echo $username ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel = "stylesheet" href = "style/formatoPerfil.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat|Inconsolata">
</head>
<body>
	<div id="container">
		<?php include("menuIzquierda.php"); ?>
		<div id="content">
			<span><b>UserID: </b><?php echo $id;?></span><br>
			<span><b>Nombre: </b><?php echo $nombre;?></span><br>
			<span><b>Usuario: </b><?php echo $username;?></span><br>
			<span><b>Email: </b><?php echo $email;?></span><br>
			<span><b>Fecha: </b><?php echo $fecha;?></span><br>
			<span><b>Género: </b><?php echo $genero;?></span><br>
			<a href="modificarUsuario.php?userID=<?php echo $id;?>">
				<input type="button" class="button" value="ACTUALIZAR DATOS">
			</a>
		</div>
	</div>
</body>
</html>