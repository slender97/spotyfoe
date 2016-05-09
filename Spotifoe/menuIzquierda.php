<html>
<head>
<link rel = "stylesheet" href = "style/formatoMenuIzquierda.css">
</head>
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
<body>
<div>
	<ul class = "Izq">
	  <form action = "buscador.php" method = "post" name = "form1" class = "center">
		<input type = "search" name = "buscador" placeholder = "Ingrese nombre de la cancion o album a buscar" style="width:80%;height:30px">
		<input type = "submit" value="" name = "buscar" class="botonImagen">
	  </form>
	  <br>
	  <li><a class="Left active" href="#">PRINCIPAL</a></li>
	  <li><a class="Left" href="Inicio.html">Inicio</a></li>
	  <li><a class="Left" href="">Perfil</a></li>
	  <li><a class="Left" href="#">Play Lists</a></li>
	  <li><a class="Left" href="#">TOP 25 Canciones</a></li>
	  <li><a class="Left" href="#">Géneros</a></li>
	</ul>

		
</div>
	
</body>
</html>