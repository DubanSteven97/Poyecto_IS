<?php
include('conexion.php');
session_start();
if (isset($_SESSION['u_usuario'])){
	$nom_img=$_FILES['imagen']['name'];
	$nom_video=$_FILES['video']['name'];
	$titulo_curso=$_POST['titulo_curso'];
	$contenido_curso=$_POST['contenido_curso'];
	$caracteristicas_curso=$_POST['caracteristicas_curso'];
	$nombre_profesor= $_POST['nombre_profesor'];
	$nom_img_profe=$_FILES['imagen_profesor']['name'];
	$descripcion_profesor=$_POST['descripcion_profesor'];
	$usuario=$_SESSION['u_usuario'];
	$valor_curso=$_POST['costo_curso'];
	$dir_destino = "../imagenes_usu/cursos/";
	$dir_destino_profe = "../imagenes_usu/profesores/";
	$dir_destino_video = "../videos_usu/cursos/";
	$imagen_subida = $dir_destino . basename($_FILES['imagen']['name']);
	$imagen_subida_profesor = $dir_destino_profe . basename($_FILES['imagen_profesor']['name']);
	$video_subida = $dir_destino_video . basename($_FILES['video']['name']);

	$usuario_consultar=$conexion->query("select * from ingresar where id_usu='$usuario'");
	$row=$usuario_consultar-> fetch_assoc();
	
	$cod_usuario=$row['cod_usu'];


	$guardar=$conexion->query("insert into curso(titu_curso,cont_curso,img_curso,vid_curso,fec_curso,carac_curso,cod_usu,costo_curso,nombre_profesor,img_profesor,descripcion_profesor) values ('$titulo_curso','$contenido_curso','$nom_img','$nom_video',NOW(),'$caracteristicas_curso','$cod_usuario','$valor_curso','$nombre_profesor','$nom_img_profe','$descripcion_profesor')");


	if ($guardar) {
	
		if(!is_writable($dir_destino)){
			echo '<script language="javascript">alert("Error al cargar la imagen");location.href="../publicar.php";</script>';
		}else{
			if(is_uploaded_file($_FILES['imagen']['tmp_name']) && is_uploaded_file($_FILES['video']['tmp_name']) && is_uploaded_file($_FILES['imagen_profesor']['tmp_name']) ){
				if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_subida) &&  move_uploaded_file($_FILES['video']['tmp_name'], $video_subida) && move_uploaded_file($_FILES['imagen_profesor']['tmp_name'], $imagen_subida_profesor)) {
						echo'<script language="javascript">alert("Publicado con exito");location.href="../publicar.php";</script>';
					}				
				} else {
					echo '<script language="javascript">alert("Posible ataque de carga de archivos!\n");location.href="../publicar.php";</script>';
				}
		}
		
		
 	}else{
		echo'<script language="javascript">alert("El contenido no se ha publicado");location.href="../publicar.php";</script>';
 	}
}else{
 	header('location:../index.php');
 }
?>