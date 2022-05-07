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
		?>
		<section class="main">
			<div class="temas">
					<form action="php/registro_usu.php?cod_tema=<?php echo$cod_tema;?>" method="post" autocomplete="off">
						<input type="text" id="campo_1" name="numero_documento" required placeholder="Numero de documento"><br>
						<input type="email" id="campo_1" name="email" required placeholder="Email"><br>
						<input type="tel" id="campo_1" name="telefono" required placeholder="Telefono"><br>
						<button type="submit"  id="registro">Registrase</button>
					</form>	
			</div>				
		</section>

	</body>	
</html>