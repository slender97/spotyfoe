<html>
<header>
	Datos de la cancion
	<link rel="shortcut icon" href="../favicon.ico">
</header>
<body>
<font color = "white">
<?php
include ("consultasSQL.php");
$codCancion = $_GET['codCanc'];
$resulAlbum = getAlbum($codCancion);
$arrayAlbum = mysqli_fetch_array($resulAlbum);
$resulNombre = getNombre($codCancion);
$arrayNombre = mysqli_fetch_array($resulNombre);
reproducirUnaVezMas($codCancion);
?>
<div align = "center "> <img src="images/music.jpg" alt="MUSICA" style="width:304px;height:228px;"> </div>
<div align = "center"> <h1> <?php echo $songName = $arrayNombre["nombre"]?> </h1> 
					   <h2>
						<?php
							$resulArtista = getArtista($codCancion);
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