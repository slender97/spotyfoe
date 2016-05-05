<!DOCTYPE html>
<html>
<head>
	<title>
		Motor de busqueda
	</title>
	<link rel="shortcut icon" href="../favicon.ico">
	<link rel = "stylesheet" href = "formato.css">
	<meta http-equiv="Content-Type" contents="text/html; charset=UTF-8">
	<style type="text/css">
		.botonImagen { 
			background-image: url(images/lupa.png);
			background-position:  0px 0px;
			width: 30px;
			height: 30px;
			border: 0px;
			position: absolute;
		}
		.botonImagen:hover{ 
			background-image: url(images/lupa2.png);
		}
	</style>
</head>
<body 
	class = "fondo";>

	<h2
		class = "centerTitulos">
		BUSCA LA CANCION DE TU PREFERENCIA
	</h2>
	
	<div>
		<img src = "images/lupa.jpg" id = "ima">
	</div>
	<div>
		<form action = "buscador.php" method = "post" name = "form1" class = "center">
			<input type = "search" name = "buscador" placeholder = "Ingrese nombre de la cancion o album a buscar" style="width:284px;height:30px">
			<input type = "submit" value="" name = "buscar" class="botonImagen">
		</form>
	</div>
	<div class = "resultados">
	<?php
		if( isset($_POST['buscar']) )
		{
			$host = "localhost";
			$dbname = "musica";
			$username = "root";
			$PASSWORD = "";


			$Nombre = $_POST["buscador"];
			$Album = $_POST["buscador"];


			//Seleccionar el servidor:
			$connection = mysqli_connect($host, $username, $PASSWORD, $dbname) or die ("No se pudo conectar con el servidor de la BD.");
			//echo "Conexion establecida a MySQL<br />";

			//Seleccionar la BD con la que vamos a trabajar:
			//mysql_select_db($dbname, $connection) or die ("La BD no existe.");
			
			//echo "BD selecconada: " . " " . $dbname. "<br />";

			//para cancion
			$consulta = "SELECT * FROM CANCION WHERE Nombre LIKE '%$Nombre%'";

			//PARA EJECUTAR LA CONSULTA:
			$ejecutar_consulta = mysqli_query($connection, $consulta) or die ("No se pudo ejecutar la consulta en la BD.");
			//echo "Resultados De Busqueda: <br />";
			//echo "    <br />";

			//mostrar el resultado de la consulta, dentro de un ciclo y en una variable ingresamos la funcion mySQL fetch array (la ejecicion dela consulta la guarda en un arreglo)
			?>
			
			<ul>
			
			<?php
			while ($registro = mysqli_fetch_array($ejecutar_consulta))
			{
				echo "<li><a href='opciones.php?codCanc=".$registro["Cod_cancion"]."'>".$registro["Nombre"]."</a></li>";
				//echo "Album: ". $registro["Cod_album"]. "   ". $registro["Fecha_lan"]. "<br />";
			}
			?>
			</ul>
			<?php
			
			
			//para album
			//echo "<h4> BUSCANDO...</h4>";
			$consulta = "SELECT * FROM ALBUM WHERE Nombre = '$Album'";

			//PARA EJECUTAR LA CONSULTA:
			$ejecutar_consulta = mysqli_query($connection, $consulta) or die ("No se pudo ejecutar la consulta en la BD.");
			//echo "Resultados De Busqueda: <br />";
			//echo "    <br />";

			//mostrar el resultado de la consulta, dentro de un ciclo y en una variable ingresamos la funcion mySQL fetch array (la ejecicion dela consulta la guarda en un arreglo)
			?>
			
			<ul>
			
			<?php
			while ($registro = mysqli_fetch_array($ejecutar_consulta))
			{
				echo "<li><a href='http://www.w3schools.com/html/'>".$registro["Cod_album"]." - ".$registro["Nombre"]."</a></li>";
				//echo "Año: ". $registro["Ano"]. "   ". $registro["Fecha_lan"]. "<br />";
			}
			?>
			</ul>
			<?php
		}
	?>
	<div>
</body>
</html>