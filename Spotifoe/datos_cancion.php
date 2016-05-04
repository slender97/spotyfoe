<html>
<header>
	Datos de la cancion
	<link rel="shortcut icon" href="../favicon.ico">
</header>
<body>
<font color = "white">
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
?>
<div align = "center "> <img src="images/music.jpg" alt="MUSICA" style="width:304px;height:228px;"> </div>
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
</div>
<div align = "center">
</body>
</html>