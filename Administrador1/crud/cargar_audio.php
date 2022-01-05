<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDedatos="cine";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDedatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}

	$consulta = "SELECT * FROM audio ";
	$ejecutarConsulta = mysqli_query($enlace, $consulta);

	while($fila = mysqli_fetch_array($ejecutarConsulta)){
		echo"<option value='".$fila['ID']."'>".$fila['TIPO']."</option>";
	}

	mysqli_close($enlace);
?>