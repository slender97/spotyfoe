<!DOCTYPE HTML>
<html>
<head>
	<title>
		Iniciar Sesion

	</title>
	<link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Montserrat|Inconsolata">
    <style>
    	body {
    		background-color: #000000
    	}
      	.title {
        	font-family: 'Montserrat', serif;
        	font-size: 36px;
        	text-align: center;
        	color : #FFFFFF;
      	}
      	form {
        	text-align: center;
      	}
      	.textDiv{
        	padding: 5px;
      	}
      	.textField {
        	font-family: 'Inconsolata', serif;
        	height: 30px;
        	width: 90%;
        	font-size: 15px;
      	}
      	#content {
    		background-color: #33AABB;
    		align-items: center;
		    width: 35%;
		    margin: 0 auto; 

      	}
      	#header {
        	text-align: center;
        	padding: 10px;
      	}
      	#buttonDiv {
      		padding: 30px;
      	}

      	.button {
        	font-family: 'Montserrat', serif;
      		height:50px; 
      		width:170px; 
      		font-size:15px; 
      		background-color: #33AABB; 
      		color: white;
      		border-width: 0px;
      	}
      	.button:hover {
        	font-family: 'Montserrat', serif;
      		height:50px; 
      		width:170px; 
      		font-size:15px; 
      		background-color: white; 
      		color: #33AABB;
      		border-width: 0px;
      	}
      	#errorDiv {
      		text-align: center;
		}
		.error {
        	font-family: 'Montserrat', serif;
			color:#FFFFFF; 
			font-size:15px; 
			padding: 5px
		}
    </style>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="shortcut icon" href="../favicon.ico">
</head>
<body>
	<?php
	function test_input($data){
		$data = trim($data); //SE DESHACE DE LOS ESPACIOS EN BLANCO AL FINAL
		$data = stripslashes($data); //ELIMINA BACKSLASHES
		$data = htmlspecialchars($data); //CONVIERTE CARACTERES ESPECIALES A ENTIDADES HTML (!!!PREVIENE ATAQUES)
		return $data;
	}
	$errorInicio = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		include("../connection.php");

		
		if(isset($_POST['Usuario']) && !empty($_POST['Usuario']) 
			&& isset($_POST['Password']) && !empty($_POST['Password']))
		{
			$con = connect("usuarios");

			$usuario = mysqli_real_escape_string($con,test_input($_POST['Usuario']));
			$contrasenia = mysqli_real_escape_string($con,test_input($_POST['Password']));

			$query = mysqli_query($con,"SELECT USERNAME,PASSWORD FROM usuario WHERE USERNAME='$usuario' AND PASSWORD='$contrasenia'");
			$queryCodigo = mysqli_query($con,"SELECT userid FROM usuario WHERE username = '$usuario';");
			$almacenarCodigo = mysqli_fetch_assoc($queryCodigo);
			$codigoUsuario = $almacenarCodigo['userid'];

			

			if(mysqli_num_rows($query) == 1)
			{
				//echo "Iniciaste Sesion";

				//header("Location:../buscador.php?userID=$codigoUsuario");

				header("Location:../mostrarLista.php?userID=$codigoUsuario");

			}
			else
			{
				$errorInicio = "Usuario o contraseña incorrectos";	
			}

			mysqli_close($con);

		}
		elseif (isset($_POST['btnreg']))
		{
			header("Location:registrarUsuario.php");
		}
		else
		{
			$errorInicio = "Llena los datos";
		}
	}
	?>
	<div id="content">
	<div id="header"><img src="../images/logoW.png" width="90%" height="30%" align="middle"> </div>
	<div><p class="title">INICIAR SESION</p></div>
	<div>
	<div id="errorDiv"><span class="error"><?php echo $errorInicio; ?></span><br></div>
	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" name="form1">
	<div>
		<div class="textDiv">
		<input type="text" name="Usuario" class="textField" placeholder="Usuario">
		</div>

		<div class="textDiv"><input type="password" name="Password" class="textField" placeholder="Contraseña"></div>
	</div>
	<div id="buttonDiv">	
		<input type="submit" class="button" name="btnreg" value="REGISTRARSE">
		<input type="submit" class="button" value="INICIAR SESION">
	</div>
	</form>	
	</div>
	</div>
</body>
</html>