<?php
	include ("connection.php");
	
	echo "Aqui se agregara a la lista<br>";

	$codCancion  = $_GET['codCanc'];
	$codUsuario = $_GET['userID'];
	$agregado = $_GET['varAgregado'];

	$conexion  = connect("Musica");

	echo $codCancion."<br>";
	echo $codUsuario."<br>";
	echo $agregado;

	$queryNombre = "SELECT Nombre from cancion where Cod_cancion = ".$codCancion ;
	$ResultNombre = mysqli_query($conexion,$queryNombre);
	$arrayNombre = mysqli_fetch_assoc($ResultNombre);

	echo $arrayNombre['Nombre'];

	//VERFICIAR SI LA CANCION ESTA AGREGADA O NO EL BD USANDO LA VARIABLE AGREGADO Y ASI SABER COMO ACTUAR

	$queryInsertar = "INSERT INTO listarep VALUES('$codCancion','$codUsuario');";
	$queryEliminar = "DELETE FROM listarep WHERE Cod_cancion = '$codCancion' AND Usuario = '$codUsuario'; ";

	if($agregado == "no") {
		mysqli_query($conexion,$queryInsertar);
		$agregado = "si";
	}
	elseif ($agregado == "si") {
		mysqli_query($conexion,$queryEliminar);
		$agregado = "no";
	}
	
	header("Location:opciones.php?codCanc=$codCancion & userID=$codUsuario");

?>
