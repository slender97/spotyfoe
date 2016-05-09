<?php

include ("connection.php");

function getAlbum($codCancion)
{
	$conn = connect("Musica");
	$queryAlbum = "SELECT album.nombre from cancion,album where album.Cod_album = (select Cod_album from cancion where Cod_cancion = ".$codCancion.")";
	$resulAlbum = mysqli_query($conn, $queryAlbum);
	mysqli_close($conn);
	return $resulAlbum;
}

function getNombre($codCancion)
{
	$conn = connect("Musica");
	$queryNombre = "SELECT nombre from cancion where Cod_cancion = ".$codCancion;
	$resulNombre = mysqli_query($conn, $queryNombre);
	mysqli_close($conn);
	return $resulNombre;
}

function getArtista($codCancion)
{
	$conn = connect("Musica");
	$queryArtista = "SELECT artista.nombre FROM artista, artistacancion WHERE artista.Cod_artista = artistacancion.Cod_artista and artistacancion.Cod_cancion = ".$codCancion;
	$resulArtista = mysqli_query($conn, $queryArtista);

	mysqli_close($conn);
	return $resulArtista;
}

function getUrl($codCancion)
{
	$conn = connect("Musica");
	$queryUrl = "SELECT calidadA from cancion where cod_cancion = ".$codCancion.";";
	$resulUrl = mysqli_query($conn, $queryUrl);
	mysqli_close($conn);
	return $resulUrl;
}

function reproducirUnaVezMas($codCancion)
{
	$conn = connect("Musica");
	$queryAumentar = "UPDATE cancion set Veces_escuch = Veces_escuch + 1 where Cod_cancion = ".$codCancion;
	mysqli_query($conn, $queryAumentar);
	mysqli_close($conn);
}

function buscarPorCancion($Nombre)
{
	$connection = connect("Musica");
	$consulta = "SELECT * FROM CANCION WHERE Nombre LIKE '%$Nombre%'";
	$ejecutar_consulta = mysqli_query($connection, $consulta) or die ("No se pudo ejecutar la consulta en la BD.");
	mysqli_close($connection);
	return $ejecutar_consulta;
}

function top25Escuchadas()
{
	$conn = connect("Musica");
	$queryMasEscuchadas = "SELECT Cod_cancion, Nombre, Veces_escuch from cancion ORDER BY Veces_escuch DESC LIMIT 25";
	$resulMasEscuchadas = mysqli_query($conn,$queryMasEscuchadas);
	mysqli_close($conn);
	return $resulMasEscuchadas;
}

?>