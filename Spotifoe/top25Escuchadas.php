<html>
<header>
	<link rel = "stylesheet" href = "style/formatoLista.css">
</header>
<body class = "fondo">

<div>
<<<<<<< HEAD
	<?php include("menuIzquierda.php"); ?>
=======
	<?php include("menuIzquierda.html"); ?>
>>>>>>> cf95646e2db4082569f190b9a883945cd6969d18
</div>

<div>
	<h2 class = "centerTitulos">Top 25 - Lo mejor solo para ti</h2>
<?php
	include ("consultasSQL.php");
	$resulLista = top25Escuchadas();
?>
	<div class = "listas">
	<ol>
<?php
	while ($arrayLista = mysqli_fetch_array($resulLista)) {
		echo "<li class = 'LiItem'><a class = 'LiItemA' href = 'opciones.php?codCanc=".$arrayLista['Cod_cancion']."'>".$arrayLista['Nombre']."</a>".$arrayLista['Veces_escuch']."</li>";
	}
?>
	</ol>
	<div>
</div>
</body>
</html>