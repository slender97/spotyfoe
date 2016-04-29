<!DOCTYPE html>
<html>
<head>
	<title>
		MenuDeOpciones
	</title>
	<meta http-equiv="Content-Type" contents="text/html; charset=UTF-8">
	<link rel = "stylesheet" href = "style/formato2.css">
	<link rel="shortcut icon" href="images/icon.ico">
</head>
<body>
<?php

	$host = "localhost";
	$dbname = "musica";
	$username = "root";
	$PASSWORD = "";

	$codCancion= $_GET['codCanc']; //codigo de la cancion buscada

	$connection = mysqli_connect($host, $username, $PASSWORD, $dbname);
	if (!$connection){
		die("No se pudo conectar con el servidor de la BD.". mysqli_connect_error());
	}
	//echo "Conexion establecida a MySQL<br>";

	$queryAlbum = "SELECT album.nombre from cancion,album where album.Cod_album = (select Cod_album from cancion where Cod_cancion = ".$codCancion.")";
	$resulAlbum = mysqli_query($connection, $queryAlbum);
	$arrayAlbum = mysqli_fetch_array($resulAlbum);
	$queryNombre = "SELECT nombre from cancion where Cod_cancion = ".$codCancion;
	$resulNombre = mysqli_query($connection, $queryNombre);
	$arrayNombre = mysqli_fetch_array($resulNombre);

	$queryFecha = "SELECT fecha_lan from cancion where Cod_cancion = ".$codCancion;
	$resulFecha = mysqli_query($connection, $queryFecha);
	$arrayFecha = mysqli_fetch_array($resulFecha);

	$queryDuacion = "SELECT duracion from cancion where Cod_cancion = ".$codCancion;
	$resulDuracion = mysqli_query($connection, $queryDuacion);
	$arrayDuracion = mysqli_fetch_array($resulDuracion);
	
	mysqli_close($connection);	
		
?>

<ul>
  <li><a class="active" href="#">PRINCIPAL</a></li>
  <li><a href="Inicio.html">Inicio</a></li>
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
					   <h2>Artist name</h2> 
					   <h3><?php echo $albumName = $arrayAlbum["nombre"]?></h3> 
					   <h4><?php echo $fechaLanzamiento = $arrayFecha["fecha_lan"]?></h3> 
					   <h3><?php echo $duracion = $arrayDuracion["duracion"]?></h3> 
		</div>
	
		<div class="dropdown">
			<img src="images/puntos.png" alt="Opciones" width="50px" height="20px">
			<div class="dropdown-content">
				<a href="https://www.google.com.bo">Formato WAV</a>
    			<a href="#">Formato MP3</a>
    			<a href="#">Ver Letra</a>
    			<a href="#">Agregar a lista de reproduccion</a>
    			<a href="#">Agregar a favoritos</a>
  			</div>
		</div>
		<div class="imagenPlay">
			<a href="reproductor.php">
				<img src="images/play.png" alt="Boton reproductor" width="55px" height="50px" border="0">
			</a>
			<!--<form method="get" action="http://aprenderaprogramar.com">
				<input name="boton1" type="image"src="images/play.png" width="55px" height="50px">
			</form>!-->
		</div>
	</form>
	</div>

</body>
</html>


<!--
<select>
  <optgroup label="Calidad De Sonido">
  	<option value=""></option>
    <option value="Formato WAV">Formato WAV</option>
    <option value="Formato MP3">Formato MP3</option>
  </optgroup>
  <optgroup label="Listas">
    <option value="Crear Lista De Reproduccion">Crear Lista De Reproduccion</option>
    <option value="Seleccionar Lista">Seleccionar Lista</option>
  </optgroup>
</select>
<!-->