<?php
include('conexion.php');
session_start();
if (isset($_SESSION['u_usuario'])){
	$nom_img=$_FILES['imagen']['name'];
	$cod_tema=$_REQUEST['cod_tema'];
	$titulo=$_POST['titulo'];
	$contenido=$_POST['contenido'];
	$url=$_POST['url'];
	$usuario=$_SESSION['u_usuario'];
	$dir_destino = "../imagenes_usu/".$usuario."/";
	$imagen_subida = $dir_destino . basename($_FILES['imagen']['name']);
	
	$usuario_consultar=$conexion->query("select * from ingresar where id_usu='$usuario'");
	$row=$usuario_consultar-> fetch_assoc();
	
	$cod_usuario=$row['cod_usu'];
	$guardar=$conexion->query("insert into contenido(titu_cont,cont_cont,img_cont,fec_cont,cod_usu,cod_tema) values ('$titulo','$contenido','$nom_img',NOW(),$cod_usuario,$cod_tema)");
	
	if ($guardar) {
		if(!is_writable($dir_destino)){
			echo "no tiene permisos";
		}else{
			if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
				if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_subida)) {
					echo'<script language="javascript">alert("Publicado con exito");location.href="../publicar.php";</script>';
				} else {
					echo '<script language="javascript">alert("Posible ataque de carga de archivos!\n");location.href="../publicar.php";</script>';
				}
		}
		}
 	}else{
		echo'<script language="javascript">alert("El contenido no se ha publicado");location.href="../publicar.php";</script>';
 	}
}else{
 	header('location:../index.php');
 }
?>
