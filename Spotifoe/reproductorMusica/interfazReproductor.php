<html>
<head>
  <title>Reproducir cancion</title>
  <link rel="shortcut icon" href="../favicon.ico">
  <style>
    .mainContent {
      float:left;
      width:100%;
      height:25%;
    }
  </style>
</head>

<body bgcolor = "green">

<?php
  if (empty($_GET['userID'])) {
    header("Location:../manejoUsuarios/iniciarSesion.php");
  }
  else if (empty($_GET['codCanc'])) {
	$codCa = 1;
  }
  else
  {
	$codCa = $_GET['codCanc'];  
  }
  ?>
  

  <iframe class="mainContent" src='reproductorMusica/reproductor.php?codCanc=<?php echo $codCa;?>' frameBorder="0"></iframe>
</body>
</html>