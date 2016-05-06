<?php
	include ("connection.php");
	
	echo "Aqui se agregara a la lista<br>";

	$codCancion  = $_GET['codCanc'];

	$conexion  = connect("Musica");

	echo $codCancion."<br>";

	$queryNombre = "SELECT Nombre from cancion where Cod_cancion = ".$codCancion ;
	$ResultNombre = mysqli_query($conexion,$queryNombre);
	$arrayNombre = mysqli_fetch_assoc($ResultNombre);

	echo $arrayNombre['Nombre'];

	$queryInsertar = "INSERT INTO listarep VALUES('$codCancion','1');";
	mysqli_query($conexion,$queryInsertar);

	header("Location:opciones.php?codCanc=$codCancion");

?>
