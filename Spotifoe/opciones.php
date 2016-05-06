<!DOCTYPE html>
<html>
<head>
	<title>
		MenuDeOpciones
	</title>
	<meta http-equiv="Content-Type" contents="text/html; charset=UTF-8">
	<link rel = "stylesheet" href = "style/formato2.css">
	<!--<link rel="shortcut icon" href="images/icon.ico">-->
	<link rel="shortcut icon" href="favicon.ico">
</head>
<body>
<?php

	include ("connection.php");
	$codCancion = $_GET['codCanc'];
	$conn = connect("Musica");


	$queryAlbum = "SELECT album.nombre from cancion,album where album.Cod_album = (select Cod_album from cancion where Cod_cancion = ".$codCancion.")";
	$resulAlbum = mysqli_query($conn, $queryAlbum);
	$arrayAlbum = mysqli_fetch_array($resulAlbum);
	$queryNombre = "SELECT nombre from cancion where Cod_cancion = ".$codCancion;
	$resulNombre = mysqli_query($conn, $queryNombre);
	$arrayNombre = mysqli_fetch_array($resulNombre);

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
	
	///mysqli_close($conn);	
		
?>

<script type="text/javascript">

	var agregado = false;
	<?php
			$conexion  = connect("Musica");
			$queryAgregado = "SELECT Cod_cancion FROM listarep WHERE Cod_cancion = '$codCancion';";
			$executequery = mysqli_query($conexion,$queryAgregado);
			$agregado = "no";
	?>
	
	function agregarQuitarCancion() {

		
		var etiqueta = document.getElementById('Lista');
		var agregadoEnBD = "<?php echo $agregado; ?>";

		<?php
			if (mysqli_num_rows($executequery) == 1) {
				//ya se agrego la cancion;
				$agregado = "si";
			}
			else {
				$agregado = "no";
			}
		?>

		alert(agregadoEnBD);

		if (agregado == false && agregadoEnBD == false) {
			alert("Cancion Agregada!");
			etiqueta.innerHTML = "Eliminar de la lista de Reproduccion";
			agregado = true;
			agregadoEnBD = "si";
		}
		else {
			alert("Cancion Eliminada");
			etiqueta.innerHTML = "Agregar a lista de reproduccion";
			agregado = false;
			agregadoEnBD = "no";
		}
	}

</script>

<ul>
  <li><a class="active" href="#">PRINCIPAL</a></li>
  <li><a href="manejoUsuarios/iniciarSesion.php">Inicio</a></li>
  <li><a href="">Perfil</a></li>
  <li><a href="#">Play Lists</a></li>
  <li><a href="#">TOP 10 Canciones</a></li>
  <li><a href="#">Géneros</a></li>
</ul>

<div style="margin-left:16%;padding:1px 16px;height:1000px; background-color:black">
  
    <div id="header">
		<p id="titulo">Escucha La Cancion Perfecta</p>
		<br>
	</div>
	<div id="imagen">
		<img src="images/audifonoblanco.jpg" width="150px" height="150px">
	</div>

	<form action="opciones.php" name="form1">

		<div align = "center"> <h1> <?php echo $songName = $arrayNombre["nombre"]?> </h1> 
					   <h2>
					   <?php
							$queryArtista = "SELECT artista.nombre FROM artista, artistacancion WHERE artista.Cod_artista = artistacancion.Cod_artista and artistacancion.Cod_cancion = ".$codCancion;
							$resulArtista = mysqli_query($conn, $queryArtista);
							while ($arrayArtista = mysqli_fetch_array($resulArtista)) {
								echo $arrayArtista["nombre"]." ";
							}
						?>
						</h2> 
					   <h3><?php echo $albumName = $arrayAlbum["nombre"]?></h3> 
					   <h4><?php echo $fechaLanzamiento = $arrayFecha["fecha_lan"]?></h3> 
					   <h3><?php echo $duracion = $arrayDuracion["duracion"]?></h3>
					   <h3>CALIFICACION: <?php echo $calificacion = $arrayCalificacion["Promedio"] ?>/10</h3>
					   <h3>NUMERO DE CALIFICACIONES: <?php echo $contar = $arrayContar["Cantidad"]?></h3> 
		</div>
	
		<div class="dropdown">
			<img src="images/puntos.png" alt="Opciones" width="50px" height="20px">
			<div class="dropdown-content">
				<a href="https://www.google.com.bo">Formato WAV</a>
    			<a href="#">Formato MP3</a>
    			<a href="#">Ver Letra</a>
    			<a id= "Lista" href='ProcesoLista.php?codCanc= <?php echo $codCancion; ?> ' onClick="agregarQuitarCancion()">Agregar a lista de reproduccion</a>
    			<a href="#">Agregar a favoritos</a>
  			</div>
		</div>
		<div class="imagenPlay">
			<a href='reproductorMusica/interfazReproductor.php?codCanc= <?php echo $codCancion; ?> '>
				<img src="images/play.png" alt="Boton reproductor" width="55px" height="50px" border="0">
			</a>
		</div>
	</form>
	</div>

</body>
</html>


