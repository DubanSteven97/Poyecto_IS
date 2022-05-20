<?php
include('conexion.php');
session_start();
if (isset($_SESSION['u_usuario'])){
	$nom_img=$_FILES['imagen']['name'];
	$nom_video=$_FILES['video']['name'];
	$titulo_capitulo=$_POST['titulo_capitulo'];
	$contenido_capitulo=$_POST['contenido_capitulo'];
	$caracteristicas_capitulo=$_POST['caracteristicas_capitulo'];
	$usuario=$_SESSION['u_usuario'];
	$cod_curso=$_REQUEST['cod_curso'];
	$dir_destino = "../imagenes_usu/capitulos/";
	$dir_destino_video = "../videos_usu/capitulos/";
	$imagen_subida = $dir_destino . basename($_FILES['imagen']['name']);
	$video_subida = $dir_destino_video . basename($_FILES['video']['name']);

	$usuario_consultar=$conexion->query("select * from ingresar where id_usu='$usuario'");
	$row=$usuario_consultar-> fetch_assoc();
	
	$cod_usuario=$row['cod_usu'];

	$guardar=$conexion->query("insert into capitulo(titu_capitulo,cont_capitulo,img_capitulo,vid_capitulo,fec_capitulo,carac_capitulo,cod_usu,cod_curso) values ('$titulo_capitulo','$contenido_capitulo','$nom_img','$nom_video',NOW(),'$caracteristicas_capitulo','$cod_usuario','$cod_curso')");


	if ($guardar) {

		if(!is_writable($dir_destino)){
			echo '<script language="javascript">alert("Error al cargar la imagen");location.href="../publicar.php";</script>';
		}else{
			if(is_uploaded_file($_FILES['imagen']['tmp_name']) && is_uploaded_file($_FILES['video']['tmp_name'])){
				if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_subida) &&  move_uploaded_file($_FILES['video']['tmp_name'], $video_subida)) {
						echo'<script>alert("Capítulo guardado de forma correcta");location.href ="../crear_capitulo.php?cod_curso='.$cod_curso.'";</script>';
					}				
				} else {
					echo '<script language="javascript">alert("Posible ataque de carga de archivos!\n");location.href="../publicar.php";</script>';
				}
		}
		
		
 	}else{
		echo'<script>alert("El contenido no se ha publicado");location.href ="../crear_capitulo.php?cod_curso='.$cod_curso.'";</script>';
 	}
}else{
 	header('location:../index.php');
 }
?>