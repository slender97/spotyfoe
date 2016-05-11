<?php
function connect($db_name)
{
	$servername = "192.168.43.182";
	$username = "MP";
	$password = "123";
	/*$servername = "localhost";
	$username = "root";
	$password = "";*/
	//$db_name = "musica";
	$conn = mysqli_connect($servername, $username, $password);
	if (!$conn)		
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	mysqli_select_db($conn, $db_name);
	return $conn;
}
?>