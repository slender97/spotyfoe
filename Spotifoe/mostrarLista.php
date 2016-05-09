<!DOCTYPE HTML>
<html>
<head>
	<title>
		Lista de Reproduccion
	</title>
	<meta http-equiv="Content-Type" contents="text/html; charset=UTF-8">
	<link rel = "stylesheet" href = "style/formato2.css">
	<link rel = "stylesheet" href = "style/formatoMenuIzquierda.css">
	<link rel="shortcut icon" href="favicon.ico">
	<?php 
	include("connection.php");
	if (empty($_GET['userID'])) {
		header("Location:manejoUsuarios/iniciarSesion.php");
	}
	$codUsuario = $_GET['userID'];

	$conexion  = connect("Musica");

	$conexionUsuario = connect("usuarios");

	$queryLista = mysqli_query($conexion,"SELECT cancion.Cod_cancion, cancion.Nombre,artista.Nombre AS Artista ,cancion.Duracion FROM listarep, cancion,artista,artistacancion
	WHERE cancion.Cod_cancion = listarep.Cod_cancion AND
	artista.Cod_artista = artistacancion.Cod_artista AND
	artistacancion.Cod_cancion = cancion.Cod_cancion AND 
	listarep.Usuario = '$codUsuario';");

	$queryUsuario = mysqli_query($conexionUsuario,"SELECT username FROM usuario WHERE userid = '$codUsuario' ;");

	$arregloUsuario = mysqli_fetch_assoc($queryUsuario);

	$nombreUsuario = $arregloUsuario['username'];
	?>

	<div style="font-family: tahoma;
	font-size: 30px;
	margin: -50 -50 0 -50;
	padding: 40 0 0 0; 
	text-align: center; 
	background-color: #33AABB; 
	color:#FFFFFF;">
	<p id="titulo">Escucha tu lista,  <?php echo $nombreUsuario; ?>! </p><br>
</div>
</head>
<body style = "background-color:#000000 " >
<div style="margin-left:0px;margin-top:0px;">
	<?php include("menuIzquierda.php"); ?>
</div>
	<div style="position: relative; margin-left:650px; margin-top:50px;">
		<table id ="table1" width="600" border="1" cellpading="1" cellspacing="1" >
			<tr>
				<th style="background-color: #33AABB; color: white; font-size: 200%; font-family: Montserrat; ">Nombre</th>

				<th style="background-color: #33AABB; color: white; font-size: 200%; font-family: Montserrat; ">Artista</th>

				<th style="background-color: #33AABB; color: white; font-size: 200%; font-family: Montserrat; ">Duracion</th>

			</tr>
			<?php
			while ($cancion = mysqli_fetch_assoc($queryLista)) {

				echo "<tr>";
				echo "<td style = 'color: white; font-size: 120%; font-family: Inconsolata; ' > <a style = 'color: white' href='opciones.php?userID=$codUsuario & codCanc=".$cancion["Cod_cancion"]." ' >".$cancion["Nombre"]."</td>";
				echo "<td style = 'color: white; font-size: 120%; font-family: Inconsolata; ' >".$cancion['Artista']."</td>";
				echo "<td style = 'color: white; font-size: 120%; font-family: Inconsolata; ' >".$cancion['Duracion']."</td>";
				echo "</tr>";

			}
			?>
		</table>
	</div>
</body>
</html>