<?php
if (empty($_GET['userID'])) {
	header("Location:manejoUsuarios/iniciarSesion.php");
}
$codUsuario = $_GET['userID'];		
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Motor de busqueda
	</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel = "stylesheet" href = "style/formatoBuscador.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat|Inconsolata">
	<meta http-equiv="Content-Type" contents="text/html; charset=UTF-8">
</head>

<body>
	<div id="container">
		<?php include("menuIzquierda.php"); ?>
		<div id="content">
			<div class = "resultados">
				<?php
				include ("consultasSQL.php");


				if (empty($_GET['userID'])) {
					header("Location:manejoUsuarios/iniciarSesion.php");
				}
				$codUsuario = $_GET['userID'];

				if( isset($_POST['buscar']) )
				{
					
					$Nombre = $_POST["buscador"];
					$Album = $_POST["buscador"];

					$connection = connect ("Musica");
					
						//para cancion
					$ejecutar_consulta = buscarPorCancion($Nombre);

						//mostrar el resultado de la consulta, dentro de un ciclo y en una variable ingresamos la funcion mySQL fetch array (la ejecicion dela consulta la guarda en un arreglo)


					?>

					<ul>

						<?php
						while ($registro = mysqli_fetch_array($ejecutar_consulta))
						{
							$nombresArtistas = "";
							$resulArtista = getArtista($registro["Cod_cancion"]);
							while ($arrayArtista = mysqli_fetch_array($resulArtista)) {
								$nombresArtistas = $nombresArtistas." ".$arrayArtista["nombre"];
							}
							echo "<li><a class='resultado' href='opciones.php?userID=$codUsuario&codCanc=".$registro["Cod_cancion"]."'>".$registro["Nombre"]." - ".$nombresArtistas."</a></li>";
							//echo "Album: ". $registro["Cod_album"]. "   ". $registro["Fecha_lan"]. "<br />";
						}
						?>
					</ul>
					<?php
					}
					?>
			<div>
		</div>
	</div>
</body>
</html>