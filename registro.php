<html>
	<?php 
		$comprar=$_REQUEST['comprar'];
		$cod_curso=$_REQUEST['cod_curso'];
	?>	
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
		<section class="main">
			<div class="login">
					<h1>Formulario de registro</h1>
					<form action="php/registro_usu.php?cod_curso=<?php echo$cod_curso;?>&comprar=<?php echo $comprar;?>" method="post" autocomplete="off">
						<input type="text" id="campo_1" name="numero_documento" required placeholder="Número de documento"><br>
						<input type="email" id="campo_1" name="email" required placeholder="Email"><br>
						<input type="tel" id="campo_1" name="telefono" required placeholder="Teléfono"><br>
						<button type="submit"  id="registro">Registrarse</button>
					</form>	
			</div>				
		</section>

	</body>	
</html>