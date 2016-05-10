<html>
<head>
	<style>
    .mainContent {
      float:left;
      width:100%;
      height:25%;
    }
	</style>
	
</head>

<body>
	<iframe class="mainContent" id = "myid" src='' frameBorder="0"></iframe>
	<script type="text/javascript">
	<?php
	/*include ("connection.php");
	$conn = connect();*/
	//$query = "SELECT Cod_cancion from cancion where Cod_cancion = 1 or Cod_cancion = 3";
	$resul = mysqli_query($conexion, $query);
	//echo "es  ".mysqli_num_rows($resul);
	$cadenaArray = "var arrayCanc = [";
	$cadenaDuracion = "var arrayDuracion = [1,";
	while ($arrayC = mysqli_fetch_assoc($resul)) {
		//echo "algo: ".$arrayC["Cod_cancion"];
		$cadenaArray .= $arrayC["Cod_cancion"].",";
		$queryDurac = "SELECT Duracion from cancion where Cod_cancion = ".$arrayC["Cod_cancion"];
		$resulDurac = mysqli_query($conexion, $queryDurac);
		$arrayDurac = mysqli_fetch_array($resulDurac);
		$str_time = $arrayDurac["Duracion"];
		sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
		$time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
		$cadenaDuracion .= $time_seconds.",";
	}
	$cadArray = substr($cadenaArray,0,strlen($cadenaArray)-1);
	$cadArray .= "];";
	$cadDuracion = substr($cadenaDuracion,0,strlen($cadenaDuracion)-1);
	$cadDuracion .= "];";
	echo $cadArray." ".$cadDuracion;
	?>
	var pos = -1;
	var index = 0;
	
	function changeSource() {
		pos++;
		index = (index >= arrayDuracion.length) ? 0 : index+1;
		var url;
		if (pos >= arrayCanc.length){
			url = "";
		} 
		else{
			url = 'reproductor.php?codCanc='+arrayCanc[pos];
		}
		alert(url+" "+index);
		document.getElementById('myid').src = url;
		if (url != "")
		{
			setTimeout(function() {   
										changeSource();
										//alert("here " + index);
								  },arrayDuracion[index]*1000);
		}
		
	}
    /*document.getElementById('b1').addEventListener('click',function(event){
		changeSource();
	}
	  );*/
	 setTimeout(function() {   
	   changeSource();
	   //alert("here " + index);
	}, arrayDuracion[index]*1000);
	//arrayDuracion[(index >= arrayDuracion.length)?0:index++]
	
	</script>
	
</body>

</html>