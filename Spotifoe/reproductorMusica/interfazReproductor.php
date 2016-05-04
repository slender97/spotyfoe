<html>
<head>
  <title>Reproducir cancion</title>
  <link rel="shortcut icon" href="../favicon.ico">
  <style>
   .menu {
      float:left;
      width:100%;
      height:75%;
    }
    .mainContent {
      float:left;
      width:100%;
      height:25%;
    }
  </style>
</head>
<body bgcolor = "black">
<?php $codCa = $_GET['codCanc'];?>

  <iframe class="menu" src='../datos_cancion.php?codCanc=<?php echo $codCa;?>' frameBorder="0"></iframe>
  <iframe class="mainContent" src='reproductor.php?codCanc=<?php echo $codCa;?>' frameBorder="0"></iframe>
</body>
</html>