<?php	
	session_start();
	$cod_tema=$_REQUEST['cod_tema'];
	$documento=htmlentities($_POST['numero_documento']);
	$contrasena = htmlentities(generar_password_complejo(8));
	$email=$_POST['email'];
	$telefono=$_POST['telefono'];
	
	include('conexion.php');

	$guardar=$conexion->query("insert into ingresar(nom_usu,ape_usu,id_usu,numero_documento,pas_usu,ema_usu,tel_usu,admin)values ('','','$documento','$documento','$contrasena','$email',$telefono,0);");


	if ($guardar) {
		mkdir("../imagenes_usu/$documento", 0700);
		$proceso=$conexion->query("SELECT * FROM ingresar WHERE id_usu='$documento' AND pas_usu='$contrasena'");
		if ($resultado = mysqli_fetch_array($proceso)) {
			$_SESSION['u_usuario']=$documento;
			$_SESSION['cod_tema']=$cod_tema;
			$_SESSION['admin']= $resultado['admin'];
			header('location:../publicar.php');
		}else{
			echo'<script language="javascript">alert("Usuario o contraseña incorrecta");location.href="../index.php";</script>';
		}
 	}else{
		echo'<script language="javascript">alert("El usuario ya existe");location.href="../registro.php?cod_tema=$cod_tema";</script>';
 	}

	 function generar_password_complejo($largo){
		$cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$cadena_base .= '0123456789' ;
		$cadena_base .= '#*+';
	  
		$password = '';
		$limite = strlen($cadena_base) - 1;
	  
		for ($i=0; $i < $largo; $i++)
		  $password .= $cadena_base[rand(0, $limite)];
	  
		return $password;
	  }	 
?>