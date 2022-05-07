<?php
include('conexion.php');
session_start();
if (isset($_SESSION['u_usuario'])){
	$nom_img=$_FILES['imagen']['name'];
	$titulo_tema=$_POST['titulo_tema'];
	$contenido_tema=$_POST['contenido_tema'];
	$url_tema=$_POST['url_tema'];
	$usuario=$_SESSION['u_usuario'];
	$dir_destino = "../imagenes_usu/temas/";
	$imagen_subida = $dir_destino . basename($_FILES['imagen']['name']);
	
	
	$usuario_consultar=$conexion->query("select * from ingresar where id_usu='$usuario'");
	$row=$usuario_consultar-> fetch_assoc();
	
	$cod_usuario=$row['cod_usu'];
	
	$guardar=$conexion->query("insert into tema(titu_tema,cont_tema,img_tema,fec_tema,cod_usu) values ('$titulo_tema','$contenido_tema','$nom_img',NOW(),$cod_usuario)");
	
	if ($guardar) {
		if(!is_writable($dir_destino)){
			echo '<script language="javascript">alert("Error al cargar la imagen");location.href="../tema.php";</script>';
		}else{
			if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
				if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_subida)) {
					echo'<script language="javascript">alert("Publicado con exito");location.href="../tema.php";</script>';
				} else {
					echo '<script language="javascript">alert("Posible ataque de carga de archivos!\n");location.href="../tema.php";</script>';
				}
		}
		}
 	}else{
		echo'<script language="javascript">alert("El contenido no se ha publicado");location.href="../tema.php";</script>';
 	}
}else{
 	header('location:../index.php');
 }
?>