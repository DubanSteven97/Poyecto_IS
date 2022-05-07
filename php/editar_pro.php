<?php
	include('conexion.php');
	$cod_cont=$_REQUEST['cod_cont'];
	$cod_usu=$_REQUEST['cod_usu'];
	$titulo=$_POST['titulo'];
	$contenido=$_POST['contenido'];
	$url=$_POST['url'];
	
	$query="UPDATE contenido SET titu_cont='$titulo', cont_cont='$contenido', img_cont='$url' WHERE cod_cont='$cod_cont' AND cod_usu ='$cod_usu'";
	$resultado = $conexion -> query($query);
	if ($resultado){
		echo header("location:../publicar.php");
	}
	else{
		echo "insercion fallida";
	}

?>