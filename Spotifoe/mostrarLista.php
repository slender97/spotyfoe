<?php 
	include("connection.php");
	if (empty($_GET['userID'])) {
		header("Location:manejoUsuarios/iniciarSesion.php");
	}
	$codUsuario = $_GET['userID'];

	$conexion  = connect("Musica");

	$conexionUsuario = connect("usuarios");

	$query = "SELECT cancion.Cod_cancion, cancion.Nombre,artista.Nombre AS Artista ,cancion.Duracion FROM listarep, cancion,artista,artistacancion
	WHERE cancion.Cod_cancion = listarep.Cod_cancion AND
	artista.Cod_artista = artistacancion.Cod_artista AND
	artistacancion.Cod_cancion = cancion.Cod_cancion AND 
	listarep.Usuario = '$codUsuario';";
	$queryLista = mysqli_query($conexion,$query);

	$queryUsuario = mysqli_query($conexionUsuario,"SELECT username FROM usuario WHERE userid = '$codUsuario' ;");

	$arregloUsuario = mysqli_fetch_assoc($queryUsuario);

	$nombreUsuario = $arregloUsuario['username'];
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>
		Lista de Reproduccion
	</title>
	<meta http-equiv="Content-Type" contents="text/html; charset=UTF-8">
	<link rel = "stylesheet" href = "style/formatoMostrarLista.css">
	<link rel = "stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat|Inconsolata">
	<link rel = "shortcut icon" href="favicon.ico">
</head>
<body>
	<div id="container">
		<?php include("menuIzquierda.php"); ?>
		<div id="content">
			<div id="header">
				<p id="titulo">¡Escucha tu lista,  <?php echo $nombreUsuario; ?>!</p>
			</div>
			<div id="datos">
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
		</div>
	</div>
	<?php
		if (empty($_GET['pres']))
		{
			echo "aca";
			?>
			<div class="imagenPlay" style="position: relative; margin-left:650px;">
			<a href='mostrarLista.php?userID= <?php echo $codUsuario;?> &pres=1'>
				<img src="images/play.png" alt="Boton reproductor" width="55px" height="50px" border="0">
			</a>
			</div>
			<?php
		}
		else
		{
			echo "aqui";
			include("reproductorListas.php");
		}
	?>
</body>
</html>