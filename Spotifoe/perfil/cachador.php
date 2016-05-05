<!DOCTYPE HTML>
<html>
<head>
	<title>
		Pagina Principal
	</title>
</head>
<body>
	<?php
	include("../connection.php");



	
		$usuario = $_GET['user'];
		//echo $_GET['user'];

		$con = connect("usuarios");

		$query = mysqli_query($con,"SELECT USERID, NOMBRE, USERNAME, EMAIL, FECHA, GENERO   FROM usuario WHERE USERNAME= $usuario");
		
		while ($res = mysqli_fetch_assoc($query)) {
			
			echo "<td>".$res['USERID']."</td>"."<br>";
			echo "<td>".$res['NOMBRE']."</td>"."<br>";
			echo "<td>".$res['USERNAME']."</td>"."<br>";
			echo "<td>".$res['EMAIL']."</td>"."<br>";
			echo "<td>".$res['FECHA']."</td>"."<br>";
			if ($res['GENERO']=1){
				echo "Masculino";
			}
			else {
				echo "Femenino";
			}
			
		}

		//ID, Nombre, Username, Email, Fecha Nac, Genero----Alterar Contraseña 

		
	
	
	?>
</body>
</html>