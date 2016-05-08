<html>
 <head>
  <title>Caracteristicas</title>
 </head>
 <body>
<?php
 include("connection.php");
$codCancio = $_GET['codCanci'];
$calif = $_POST["calificacion"];
$conn = connect("musica");


if (isset($_POST['enviar'])){

	$enviar = $_POST['enviar'];
	}

	else{

		$enviar = false;
	}

	if($enviar){

		$sql = "INSERT INTO calificacioncancion VALUES((SELECT Cod_cancion from cancion WHERE Cod_cancion = '$codCancio'), '$calif');";
		mysqli_query($conn, $sql);
		mysqli_close($conn);
	}

	else{ ?> <form action="calificacion.php?codCanci=<?php echo $codCancio;?>" method="post">
				Ingrese la calificacion
				<input type="text" name="calificacion" size="30"><br>
				<input type="submit" value="Enviar" name = "enviar">
				</form>
<?php


	}
/*$sql2 = sprintf("SELECT cancion.Nombre as CancionNombre, AVG(calificacioncancion.Calificacion) as Promedio FROM cancion, calificacioncancion WHERE calificacioncancion.Cod_cancion = (SELECT Cod_cancion from cancion where Nombre = '$valor') and cancion.Nombre = '$valor'");

$resultado = mysql_query($sql2);

if (!$resultado) {
    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
    $mensaje .= 'Consulta completa: ' . $sql;
    die($mensaje);
}

while ($fila = mysql_fetch_assoc($resultado)) {
echo $fila ['CancionNombre']. "<br /> "; 
echo $fila ['Promedio']. "<br />" ;
}

*/
 ?>
 </body>
</html>