<?php
session_start();
if (isset($_SESSION['u_usuario'])){
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Software</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
	</head>
	<body>
		<header>
		<div class="formulario">
			<h2 class='titulo'>Software</h2>
			<button onclick="cerrar()" id="btn-2">Cerrar sesion</button>
			<script type="text/javascript">
				function cerrar(){
					window.location="php/cerrar.php";
				}
			</script>
		</div>
		</header>
		<section class="main">
			<div>
					<form action="php/publicar_tema.php" method="post" enctype="multipart/form-data">
						<input type="text" id="campo_1" name="titulo_tema" required placeholder="Titulo tema"><br>
						<textarea rows="10" cols="40"  id="campo_2" required name="contenido_tema" placeholder="Contenido tema"></textarea>
						<input type="file" name="imagen" multiple="multiple" accept="image/png,image/jpg,image/gif,image/jpeg" required>
						<button type="submit"  id="publicar">Publicar</button>
					</form>	
			</div>
			<div>
					<?php
							include('php/conexion.php');
								$cod_tema=$_SESSION['cod_tema'];
								$usuario=$_SESSION['u_usuario'];
								$usuario_consultar=$conexion->query("select * from ingresar where id_usu='$usuario'");
								$row=$usuario_consultar-> fetch_assoc();
								$cod_usuario=$row['cod_usu'];
								$mostrar="SELECT * FROM tema  where cod_usu = '$cod_usuario' order by fec_tema desc";
								$resultados=$conexion->query($mostrar);
							while ($row=$resultados -> fetch_assoc()){
							?>
				<!--<div class="temas">
					<table border="0">
						<tr>
							<td id="titu"><?php echo $row['titu_tema']; ?></td>
							<td id="fecha"><p style="color:#00ADB5;font-size:20px;">publicado el:</p><?php echo $row['fec_tema']; ?></td>
							
						</tr>
						<tr id="cont">
							<td id="contenido"><?php echo $row['cont_tema']; ?></td>
							<td id="imagen"><img src="imagenes_usu/temas/<?php echo$row['img_tema']; ?>" id="tamaño"></td>
						</tr>
						<tr>
							<td id="btn-3"><a href="editar.php?cod_cont=<?php echo$row['cod_tema'];?>&cod_usu=<?php echo$row['cod_usu'];?>" >Editar</a></td>
							<td id="btn-3" ><a href="php/eliminar_pro.php?cod_cont=<?php echo$row['cod_tema'];?>&cod_usu=<?php echo$row['cod_usu'];?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a></td>
						</tr>
					</table> 
				</div>-->
						<?php
							}
						?>
			</div>		
		</section>
	</body>	
</html>
<?php
 }else{
 	header('location:../index.php');
 }
?>
