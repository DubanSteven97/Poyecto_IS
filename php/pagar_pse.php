<?php	
	include('conexion.php');
	session_start();
	$cod_curso=$_REQUEST['cod_curso'];
	$usuario=$_SESSION['u_usuario'];
	$banco = $_POST['banco'];
	$nombres = $_POST['nombre_usu'];
	$apellidos = $_POST['apellido_usu'];

	$usuario_consultar=$conexion->query("select * from ingresar where id_usu='$usuario'");
	$row=$usuario_consultar-> fetch_assoc();
	$cod_usuario=$row['cod_usu'];

	$guardar=$conexion->query("insert into pagos(cod_curso,cod_usu ,banco,estado_pago)values ('$cod_curso','$cod_usuario','$banco','Aprobado');");
	$query="UPDATE 	ingresar SET nom_usu='$nombres',ape_usu='$apellidos' WHERE cod_usu ='$cod_usuario'";
	$resultado = $conexion -> query($query);


	if ($guardar && $resultado) {
			$_SESSION['compra']= 'false';
			echo'<script language="javascript">alert("Pago realizado con éxito");location.href="../publicar.php?cod_curso='.$cod_curso.'";</script>';
 	}else{
		$_SESSION['compra']= 'true';
		echo'<script language="javascript">alert("Pago fallido");location.href="../comprar.php?cod_curso='.$cod_curso.'";</script>';
 	}
?>