<?php	
	session_start();
	$cod_tema=$_REQUEST['cod_tema'];
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$usuario=$_POST['Usuario'];
	$contrasena=$_POST['contraseña'];
	$email=$_POST['email'];
	$telefono=$_POST['telefono'];
	
	include('conexion.php');
	
	$guardar=$conexion->query("insert into ingresar(nom_usu,ape_usu,id_usu,pas_usu,ema_usu,tel_usu)values ('$nombres','$apellidos','$usuario','$contrasena','$email',$telefono);");
	
	if ($guardar) {
		mkdir("../imagenes_usu/$usuario", 0700);
		$proceso=$conexion->query("SELECT * FROM ingresar WHERE id_usu='$usuario' AND pas_usu='$contrasena'");
		if ($resultado = mysqli_fetch_array($proceso)) {
			$_SESSION['u_usuario']=$usuario;
			$_SESSION['cod_tema']=$cod_tema;
			header('location:../publicar.php');
		}else{
			echo'<script language="javascript">alert("Usuario o contraseña incorrecta");location.href="../index.php";</script>';
		}
 	}else{
		echo'<script language="javascript">alert("El usuario ya existe");location.href="../registro.php";</script>';
 	}
?>