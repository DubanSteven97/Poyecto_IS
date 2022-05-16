<?php	
	session_start();
	include('conexion.php');
	$cod_curso=$_REQUEST['cod_curso'];
	$cod_leccion=$_REQUEST['cod_leccion'];
	$usuario=$_SESSION['u_usuario'];
	$usuario_consultar=$conexion->query("select * from ingresar where id_usu='$usuario'");
	$row=$usuario_consultar-> fetch_assoc();
	$cod_usuario=$row['cod_usu'];


	$guardar=$conexion->query("insert progreso(cod_curso,cod_usu,cod_leccion,estado_leccion)values ('$cod_curso','$cod_usuario','$cod_leccion','Aprobado');");

	if ($guardar) {

		echo'<script language="javascript">alert("Curso finalizado");location.href="../publicar.php";</script>';

 	}else{
		echo"<script>alert('Error al finalizar curso');location.href ='javascript:history.back()';</script>";
 	} 
	 
?>