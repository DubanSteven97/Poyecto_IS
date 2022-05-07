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
		</div>
		</header>
		<?php
			$cod_tema=$_REQUEST['cod_tema'];
			if(empty($cod_tema)){	
		?>
		<section class="main">
			<div class="temas">
						<form action="php/login.php?cod_tema=0" method="post">					
							<input type="text" id="campo_1" name="usuario" required placeholder="Usuario" autocomplete="off">
							<input type="password" id="campo_1" name="contraseña"  required placeholder="Contraseña" autocomplete="off">
							<button type="submit"  id="registro">Ingresar</button>
						</form><br>
						<button onclick="cerrar()" id="registro">Registrarse</button>
						<script type="text/javascript">
							function cerrar(){
								window.location="registro.php?cod_tema=0";
							}
						</script>						
			</div>	
			<?php 
			}else{
			?>
		<section class="main">
			<div class="temas">
						<form action="php/login.php?cod_tema=<?php echo$cod_tema;?>" method="GET">					
							<input type="text" id="campo_1" name="usuario" required placeholder="Usuario" autocomplete="off">
							<input type="password" id="campo_1" name="contraseña"  required placeholder="Contraseña" autocomplete="off">
							<button type="submit"  id="registro">Ingresar</button>
						</form><br>
						<button onclick="cerrar()" id="registro">Registrarse</button>
						<script type="text/javascript">
							function cerrar(){
								window.location="registro.php?cod_tema=<?php echo$cod_tema;?>";
							}
						</script>						
			</div>
			<?php 
			}
			?>
		</section>
	</body>	
</html>