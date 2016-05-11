<?php


	include ("connection.php");

	if (empty($_GET['userID'])) {
		header("Location:manejoUsuarios/iniciarSesion.php");
	}

	$codCancion = $_GET['codCanc'];
	$codUsuario = $_GET['userID'];
	$conn = connect("Musica");

	$queryAlbum = "SELECT album.nombre, album.imagen from cancion,album where album.Cod_album = (select Cod_album from cancion where Cod_cancion = ".$codCancion.")";
	$resulAlbum = mysqli_query($conn, $queryAlbum);
	$arrayAlbum = mysqli_fetch_array($resulAlbum);
	$queryNombre = "SELECT nombre from cancion where Cod_cancion = ".$codCancion;
	$resulNombre = mysqli_query($conn, $queryNombre);
	$arrayNombre = mysqli_fetch_array($resulNombre);

	$nombreAlbum = $arrayAlbum["nombre"];
	$nombreCancion = $arrayNombre["nombre"];

	$queryFecha = "SELECT fecha_lan from cancion where Cod_cancion = ".$codCancion;
	$resulFecha = mysqli_query($conn, $queryFecha);
	$arrayFecha = mysqli_fetch_array($resulFecha);

	$queryDuacion = "SELECT duracion from cancion where Cod_cancion = ".$codCancion;
	$resulDuracion = mysqli_query($conn, $queryDuacion);
	$arrayDuracion = mysqli_fetch_array($resulDuracion);

	$queryCalificacion = "SELECT ROUND(AVG(Calificacion),2) as Promedio FROM calificacioncancion WHERE Cod_cancion = (SELECT Cod_cancion from cancion where Cod_cancion = ".$codCancion.")";
	$resulCalificacion = mysqli_query($conn, $queryCalificacion);
	$arrayCalificacion = mysqli_fetch_array($resulCalificacion);

	$queryContar = "SELECT COUNT(Calificacion) as Cantidad from calificacioncancion WHERE Cod_cancion = (SELECT Cod_cancion from cancion where Cod_cancion = ".$codCancion.")";
	$resulContar = mysqli_query($conn, $queryContar);
	$arrayContar = mysqli_fetch_array($resulContar);
	
	//mysqli_close($conn);	
		
?>

<script type="text/javascript">

	<?php
			$conexion  = connect("Musica");
			$queryAgregado = "SELECT Cod_cancion FROM listarep WHERE Cod_cancion = '$codCancion' AND Usuario = '$codUsuario';";
			$executequery = mysqli_query($conexion,$queryAgregado);
			$agregado = "";
			$tituloOpcion = ""
	?>
	
	function agregarQuitarCancion() {

		var etiqueta = document.getElementById('Lista');

		<?php
			if (mysqli_num_rows($executequery) == 1) {
				//ya se agrego la cancion;
				$agregado = "si";
				$tituloOpcion = "Eliminar de la lista de reproduccion";
			}
			else {
				$agregado = "no";
				$tituloOpcion = "Agregar a lista de reproduccion";
			}
		?>

		var agregadoEnBD = "<?php echo $agregado; ?>";
		var tituloEnJs = "<?php echo $tituloOpcion; ?>"

		if  (agregadoEnBD == "no") {
			alert("Cancion Agregada!");
			etiqueta.innerHTML = tituloEnJs ;
			agregadoEnBD = "si";
		}
		else if (agregadoEnBD == "si") {
			alert("Cancion Eliminada");
			etiqueta.innerHTML = tituloEnJs;
			agregadoEnBD = "no";
		}
	}
	<?php
		mysqli_close($conexion);
	?>

</script>
<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $nombreCancion; ?>
	</title>
	<meta http-equiv="Content-Type" contents="text/html; charset=UTF-8">
	<link rel = "stylesheet" href = "style/formatoOpciones.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat|Inconsolata">
	<link rel = "shortcut icon" href="favicon.ico">
</head>

<body>
	<div id="container">
		<?php include("menuIzquierda.php"); ?>
		<div id="content">
		    <div id="header">
				<p id="titulo">Escucha La Cancion Perfecta</p>

			</div>
			<div class="dropdown">
				<img src="images/puntos.png" alt="Opciones" width="50px" height="20px">
				<div class="dropdown-content">
					<a href="https://www.google.com.bo">Formato WAV</a>
				    <a href="#">Formato MP3</a>
				    <a href="#">Ver Letra</a>
				    <a id= "Lista" href='ProcesoLista.php?userID=<?php echo $codUsuario?>&codCanc=<?php echo $codCancion?>&varAgregado=<?php echo $agregado?>'  onClick="agregarQuitarCancion()"><?php echo $tituloOpcion; ?></a>
			   		<a href="#">Agregar a favoritos</a>
				</div>
			</div>
				<div id=dataBox>
					<div id="imgAlbum">
						<img src="<?php echo $arrayAlbum["imagen"]?>" alt="<?php echo $nombreAlbum?>" width="300px" height="300px">	
					</div>
					<div id="datos"> <h1> <?php echo $nombreCancion; ?> </h1> 
									   <h2>
									   <?php
											$queryArtista = "SELECT artista.nombre FROM artista, artistacancion WHERE artista.Cod_artista = artistacancion.Cod_artista and artistacancion.Cod_cancion = ".$codCancion;
											$resulArtista = mysqli_query($conn, $queryArtista);
											while ($arrayArtista = mysqli_fetch_array($resulArtista)) {
												echo $arrayArtista["nombre"]." ";
											}
											mysqli_close($conn);
										?>
										</h2> 
									   <h3><?php echo $nombreAlbum?></h3> 
									   <h3><?php echo $fechaLanzamiento = $arrayFecha["fecha_lan"]?></h3> 
									   <h3><?php echo $duracion = $arrayDuracion["duracion"]?></h3>
									   <h3>CALIFICACION: <?php echo $calificacion = $arrayCalificacion["Promedio"];?>/10 <?php echo '('.$contar = $arrayContar["Cantidad"].')'; ?></h3>
						</div>
					</div>
						<div id="botones">
							<div id="botonImagen">
								<a href='opciones.php?codCanc=<?php echo $codCancion; ?>&userID=<?php echo $codUsuario;?>&pres=1'>
									<img src="images/imagen.png" alt="Boton reproductor" width="50px" height="50px" border="0"  onmouseover="this.src='images/logoW2.png';" onmouseout="this.src='images/imagen.png';">
								</a>
							</div>						
						</div>
					<?php
			if (!empty($_GET['pres'])) {
				?>
				<div>
				<?php
					include("reproductorMusica/interfazReproductor.php");
				?>
				</div>
				<?php
			}
		?>
			</div>

	</div>
</body>
</html>


