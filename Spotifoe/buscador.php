<!DOCTYPE html>
<html>
<head>
	<title>
		Motor de busqueda
	</title>
	<link rel="shortcut icon" href="../favicon.ico">
	<link rel = "stylesheet" href = "formato.css">
	<meta http-equiv="Content-Type" contents="text/html; charset=UTF-8">
	
</head>
<body style="background-color:black">

	<h2	class = "centerTitulos">
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
	<div>
	<?php
		include ("consultasSQL.php");
		if( isset($_POST['buscar']) ){
			$Nombre = $_POST["buscador"];
			$Album = $_POST["buscador"];

			$connection = connect ("Musica");
			
			//para cancion
			$ejecutar_consulta = buscarPorCancion($Nombre);

			//mostrar el resultado de la consulta, dentro de un ciclo y en una variable ingresamos la funcion mySQL fetch array (la ejecicion dela consulta la guarda en un arreglo)
	?>
			<ul>			
			<?php
			while ($registro = mysqli_fetch_array($ejecutar_consulta)){
				$nombresArtistas = "";
				$resulArtista = getArtista($registro["Cod_cancion"]);
				while ($arrayArtista = mysqli_fetch_array($resulArtista)) {
					$nombresArtistas = $nombresArtistas." ".$arrayArtista["nombre"];
				}
				echo "<li><a href='opciones.php?codCanc=".$registro["Cod_cancion"]."'>".$registro["Nombre"]." - ".$nombresArtistas."</a></li>";
			}
			?>
			</ul>		
	<?php
		}
	?>
	<div>
</body>
</html>