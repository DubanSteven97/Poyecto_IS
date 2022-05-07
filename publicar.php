<?php
session_start();
$cod_tema=$_SESSION['cod_tema'];
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
			<button onclick="publicar()" id="btn-4">Crear curso</button>
			<script type="text/javascript">
				function publicar(){
					window.location="tema.php";
				}
			</script>
		</div>
		</header>
			<!--<section class="main">
			<?php
				if(empty($cod_tema)){
				echo"<h1>Comentarios realizados</h1>";
			?>
				
			<?php
				}else{
			?>
			<div class="temas">
					<form action="php/publicar_pro.php?cod_tema=<?php echo$cod_tema;?>" method="post" enctype="multipart/form-data">
						<input type="text" id="campo_1" name="titulo" required placeholder="Titulo publicacion"><br>
						<textarea rows="10" cols="40"  id="campo_2" required name="contenido" placeholder="Contenido publicacion"></textarea>
						<input type="file" name="imagen" multiple="multiple" accept="image/png,image/jpg,image/gif,image/jpeg" required>
						<button type="submit"  id="publicar">Publicar</button>
					</form>	
			</div>			
		<?php
			}	
		?>
			<div class="tabla">
					<?php
							include('php/conexion.php');
								$cod_tema=$_SESSION['cod_tema'];
								$usuario=$_SESSION['u_usuario'];
								$usuario_consultar=$conexion->query("select * from ingresar where id_usu='$usuario'");
								$row=$usuario_consultar-> fetch_assoc();
								$cod_usuario=$row['cod_usu'];
								$mostrar="SELECT * FROM contenido a, tema b where a.cod_usu = '$cod_usuario' and a.cod_tema = b.cod_tema order by a.fec_cont desc";
								$resultados=$conexion->query($mostrar);
								
							while ($row=$resultados -> fetch_assoc()){
							?>
				<div class="temas">
					<table border="0">
						<tr>
							<td><p style="color:#00ADB5;font-size:20px;font-weight: 700;">tema que comento:</p><?php echo $row['titu_tema'];?></td>
						<tr>
						<tr>
							
							<td id="titu"><?php echo $row['titu_cont'];?></td>
							<td id="fecha"><p style="color:#00ADB5;font-size:20px;">publicado el:</p><?php echo $row['fec_cont']; ?></td>
							
						</tr>
						<tr id="cont">
							<td id="contenido"><?php echo $row['cont_cont']; ?></td>
							<td id="imagen"><img src="imagenes_usu/<?php echo $usuario."/".$row['img_cont']; ?>" id="tamaño"></td>
						</tr>
						<tr>
							<td id="btn-3"><a href="editar.php?cod_cont=<?php echo$row['cod_cont'];?>&cod_usu=<?php echo$cod_usuario;?>" >Editar</a></td>
							<td id="btn-3" ><a href="php/eliminar_pro.php?cod_cont=<?php echo$row['cod_cont'];?>&cod_usu=<?php echo$cod_usuario;?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a></td>
						</tr>
					</table>
				</div>
						<?php
							}
						?>
			</div>	
			</section>-->
	</body>	
</html>
<?php
 }else{
 	header('location:../index.php');
 }
?>
