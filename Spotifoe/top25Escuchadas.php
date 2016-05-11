<!DOCTYPE html>
<header>
	<link rel = "stylesheet" href = "style/formatoLista.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat|Inconsolata">
</header>
<body class = "fondo">
<?php 
	$codUsuario = $_GET['userID'];
?>
<div id="container">

	<?php include("menuIzquierda.php"); ?>

<div>
	<div id="header">
		<p id="titulo">Top 25 - Lo mejor solo para ti</p>
	</div>
<?php
	include ("consultasSQL.php");
	$resulLista = top25Escuchadas();
?>
	<div class = "listas">
	<ol>
<?php
	while ($arrayLista = mysqli_fetch_array($resulLista)) {
		echo "<li class = 'LiItem'><a class = 'LiItemA' href = 'opciones.php?codCanc=".$arrayLista['Cod_cancion']."&userID=".$codUsuario."'> <h3>".$arrayLista['Nombre']." </h3> </a>".$arrayLista['Veces_escuch']." veces reproducida"."</li>";
	}
?>
	</ol>
	<div>
</div>
</div>
</body>
</html>