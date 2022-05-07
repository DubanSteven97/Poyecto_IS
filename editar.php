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
			<div class="temas">
			<?php
				$cod_cont=$_REQUEST['cod_cont'];
				$cod_usu=$_REQUEST['cod_usu']; 
					include('php/conexion.php');

					$query= "SELECT * FROM contenido WHERE cod_cont='$cod_cont' AND cod_usu ='$cod_usu'";
					$resultado = $conexion->query($query);
					$row= $resultado-> fetch_assoc();
			?>
					<form action="php/editar_pro.php?cod_cont=<?php echo$row['cod_cont'];?>&cod_usu=<?php echo$row['cod_usu'];?>" method="post">
						<input type="text" id="campo_1" name="titulo" required placeholder="Titulo publicacion" value="<?php echo $row['titu_cont']; ?>"><br>
						<textarea rows="10" cols="40"  id="campo_2" required name="contenido" placeholder="Contenido publicacion"><?php echo $row['cont_cont']; ?></textarea>
						<textarea rows="10" cols="30" id="campo_3" name="url" placeholder="Url imagen"><?php echo $row['img_cont']; ?></textarea><br>
						<button type="submit"  id="publicar">Editar</button>
					</form>	
			</div>
		</section>
	</body>	
</html>
<?php
 }else{
 	header('location:../index.php');
 }
?>