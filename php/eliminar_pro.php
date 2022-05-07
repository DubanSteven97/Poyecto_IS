<?php
	include('conexion.php');

	$cod_cont=$_REQUEST['cod_cont'];
	$cod_usu=$_REQUEST['cod_usu'];
	
	$query="DELETE FROM	contenido WHERE cod_cont='$cod_cont' AND cod_usu ='$cod_usu'";
	$resultado = $conexion -> query($query);

	if ($resultado){
		echo header("location:../publicar.php");
	}
	else{
		echo "insercion fallida";
	}
?>