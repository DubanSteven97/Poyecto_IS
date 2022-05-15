<?php
	session_start();
	$cod_tema=$_REQUEST['cod_curso'];
	$usuario=htmlentities($_POST['usuario']);
	$contrasena=htmlentities($_POST['contraseña']);
	$curso=$_REQUEST['comprar'];


	include('conexion.php');
	
	$proceso=$conexion->query("SELECT * FROM ingresar WHERE id_usu='$usuario' AND pas_usu='$contrasena'");	

		if ($resultado = mysqli_fetch_array($proceso)) {
			$_SESSION['u_usuario']=$usuario;
			$_SESSION['cod_tema']=$cod_tema;
			$_SESSION['admin']= $resultado['admin'];
			$_SESSION['compra']= $curso;
			header('location:../publicar.php');
		}else{
		echo'<script language="javascript">alert("Usuario o contraseña incorrecta");location.href="../index.php";</script>';
		}
?>