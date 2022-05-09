<?php
include('conexion.php');
session_start();
if (isset($_SESSION['u_usuario'])){
	$cod_curso=$_REQUEST['cod_curso'];
	$nom_video=$_FILES['video']['name'];
	$nom_material=$_FILES['apoyo']['name'];		
	$nom_lectura=$_FILES['lectura']['name'];
	$titulo_leccion=$_POST['titulo_leccion'];
	$objetivo_leccion=$_POST['objetivo_leccion'];
	$links_leccion=$_POST['links'];
	$teoria_leccion=$_POST['teoria'];
	$ejemplo_leccion=$_POST['ejemplo'];	
	$usuario=$_SESSION['u_usuario'];
	$dir_destino_material = "../recursos_usu/material/";
	$dir_destino_video = "../videos_usu/lecciones/";
	$dir_destino_lectura = "../recursos_usu/lectura/";
	$material_subida = $dir_destino_material . basename($_FILES['apoyo']['name']);
	$video_subida = $dir_destino_video . basename($_FILES['video']['name']);
	$lectura_subida = $dir_destino_lectura . basename($_FILES['lectura']['name']);

	$usuario_consultar=$conexion->query("select * from ingresar where id_usu='$usuario'");
	$row=$usuario_consultar-> fetch_assoc();
	
	$cod_usuario=$row['cod_usu'];


	$guardar=$conexion->query("insert into leccion(titu_leccion	,objetivo_leccion,vid_leccion,apoyo_leccion,lectura_leccion,links_leccion,teoria_leccion,ejemplo_leccion,fec_leccion,cod_curso,cod_usu) values ('$titulo_leccion','$objetivo_leccion','$nom_video','$nom_material','$nom_lectura','$links_leccion','$teoria_leccion','$ejemplo_leccion',NOW(),'$cod_curso','$cod_usuario')");


	if ($guardar) {
	
		if(!is_writable($dir_destino_material)){
			echo '<script language="javascript">alert("Error al cargar la imagen");location.href="../crear_curso.php";</script>';
		}else{
			if(is_uploaded_file($_FILES['apoyo']['tmp_name'])){
				if (move_uploaded_file($_FILES['apoyo']['tmp_name'], $material_subida)) {
					if(!is_writable($dir_destino_video)){
						echo '<script language="javascript">alert("Error al cargar la multimedia");location.href="../crear_curso.php";</script>';
					}else{
						if(is_uploaded_file($_FILES['video']['tmp_name'])){
							if (move_uploaded_file($_FILES['video']['tmp_name'], $video_subida)) {
								if(is_uploaded_file($_FILES['lectura']['tmp_name'])){
									if (move_uploaded_file($_FILES['lectura']['tmp_name'], $lectura_subida)) {
										echo'<script>alert("Lección guardada de forma correcta");location.href ="../crear_leccion.php?cod_curso='.$cod_curso.'";</script>';
									} else {
										echo '<script language="javascript">alert("Posible ataque de carga de archivos!\n");location.href="../crear_curso.php";</script>';
										
									}
							}								
							} else {
								echo '<script language="javascript">alert("Posible ataque de carga de archivos!\n");location.href="../crear_curso.php";</script>';
							}
					}
					}					
				} else {
					echo "<script>alert('Error al guardar formulario');location.href ='javascript:history.back()';</script>";
				}
		}
		}
	
 	}else{
		echo'<script>alert(\'Formulario Enviado\');location.href =\'javascript:history.back()\';</script>';
		/*$url='location:../crear_leccion.php?cod_curso='.$cod_curso;
		header($url);*/
		
		
	
	
 	}
}else{
 	header('location:../index.php');
 }
?>