<html>
<head>
	<link rel = "stylesheet" href = "style/formatoMenuIzquierda.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat|Inconsolata">
</head>
<body>
<?php
if (empty($_GET['userID'])) {
	header("Location:manejoUsuarios/iniciarSesion.php");
}
$codUsuario = $_GET['userID'];		
?>

	<div>
		<ul class = "Izq">
		  <form action = "buscador.php?userID=<?php echo $codUsuario;?>" method = "post" name = "form1" class = "center">
			<input type = "search" id="txtBuscar" name = "buscador" placeholder = "Buscar..." style="width:80%;height:30px">
			<input type = "submit" value="" name = "buscar" class="botonImagen">
		  </form>
		  <br>
		  <li><a class="Left active" href="#">PRINCIPAL</a></li>
		  <li><a class="Left" href="inicio.php">Inicio</a></li>
		  <li><a class="Left" href="perfil.php?userID=<?php echo $codUsuario;?>">Perfil</a></li>
		  <li><a class="Left" href="mostrarLista.php?userID=<?php echo $codUsuario;?>">Play Lists</a></li>
		  <li><a class="Left" href="top25escuchadas.php?userID=<?php echo $codUsuario;?>">TOP 25 Canciones</a></li>
		</ul>	
	</div>
</body>
</html>