<?php
include ("connection.php");
$codCancion = $_GET['codCanc'];
$conn = connect("Musica");
$queryUrl = "select calidadA from cancion where cod_cancion = ".$codCancion.";";
$resulUrl = mysqli_query($conn, $queryUrl);
$arrayUrl = mysqli_fetch_array($resulUrl);

$filename = "Pista 1";
$file = $arrayUrl["calidadA"];

$extension = "mp3";
$mime_type = "audio/mpeg, audio/x-mpeg, audio/x-mpeg-3, audio/mpeg3";

if(file_exists($file))
{
    header('Content-type: {$mime_type}');
    header('Content-length: ' . filesize($file));
    header('Content-Disposition: filename="' . $filename.'"');
    header('X-Pad: avoid browser bug');
    header('Cache-Control: no-cache');
    readfile($file);
}
else
{
    header("HTTP/1.0 404 Not Found");
}
?>
