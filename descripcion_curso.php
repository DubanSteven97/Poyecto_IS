<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Software</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link rel="shortcut icon" href="imagenes/prueba.ico">
	</head>
	<body>
		<header>
			<div class="formulario">
				<h2 class='titulo'>Software</h2>	
			<button onclick="cerrar()" id="btn-2">Ingresar</button>
			<script type="text/javascript">
				function cerrar(){
					window.location="login.php?cod_tema=0";
				}
			</script>
			</div>
		</header>
		<section class="main">
		<?php
			include('php/conexion.php');
				$cod_tema=$_REQUEST['cod_tema'];
				$tema="SELECT * FROM tema where cod_tema=$cod_tema";
				$resultadostema=$conexion->query($tema);
				$rowtema=$resultadostema -> fetch_assoc();	
		?>		
		<div class="cursos">	
			<div class="temas_titulo">
				<p id="titulo_detalle"><?php echo $rowtema['titu_tema'];?></p>
			</div>
			<img src="imagenes_usu/temas/<?php  echo $rowtema['img_tema'];?>" id="img_detalle"><br>
			<article class="parrafo">
				<?php echo $rowtema['cont_tema']; ?>
			</article>
		</div>
			<!--<div class="tabla">
				
					<?php
							include('php/conexion.php');
								$mostrar="SELECT * FROM contenido a, ingresar b, tema c where a.cod_usu = b.cod_usu and a.cod_tema=c.cod_tema and a.cod_tema = $cod_tema order by fec_cont desc";
								$resultados=$conexion->query($mostrar);
							while ($row=$resultados -> fetch_assoc()){
					?>
					<div class="temas">	
						<table border="0">
							<tr>
								<td id="titu"><?php echo $row['titu_cont']; ?></td>
								<td id="fecha"><p style="color:#00ADB5;font-size:20px;">publicado el:</p><?php echo $row['fec_cont']; ?> <br> <p style="color:#00ADB5;font-size:20px;">por:</p><?php echo $row['nom_usu']." ".$row['ape_usu']; ?></td>
								
							</tr>
							<tr id="cont">
								<td id="contenido"><?php echo $row['cont_cont']; ?></td>
								<td id="imagen"><img src="imagenes_usu/<?php echo $row['id_usu']."/".$row['img_cont']; ?>" id="tamaño"></td>
							</tr>
						</table>
					</div>
						<?php
							}
						?>
			</div>	-->
		</section>
	<footer>
		Copyright &copy; 2022
	</footer>
	</body>	
</html>