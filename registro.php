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
					<form action="php/reguistro_pro.php?cod_tema=0"" method="post" autocomplete="off">
						<input type="text" id="campo_1" name="nombres" required placeholder="Nombres"><br>
						<input type="text" id="campo_1" name="apellidos" required placeholder="Apellidos"><br>
						<input type="text" id="campo_1" name="Usuario" required placeholder="Usuario inicio sesion"><br>
						<input type="password" id="campo_1" name="contraseña"  required placeholder="Contraseña"><br>
						<input type="email" id="campo_1" name="email" required placeholder="Email"><br>
						<input type="tel" id="campo_1" name="telefono" required placeholder="Telefono"><br>
						<button type="submit"  id="registro">Registrase</button>
					</form>	
			</div>				
		</section>
		<?php 
			}else{
		?>
				<section class="main">
			<div class="temas">
					<form action="php/reguistro_pro.php?cod_tema=<?php echo$cod_tema;?>" method="post" autocomplete="off">
						<input type="text" id="campo_1" name="nombres" required placeholder="Nombres"><br>
						<input type="text" id="campo_1" name="apellidos" required placeholder="Apellidos"><br>
						<input type="text" id="campo_1" name="Usuario" required placeholder="Usuario inicio sesion"><br>
						<input type="password" id="campo_1" name="contraseña"  required placeholder="Contraseña"><br>
						<input type="email" id="campo_1" name="email" required placeholder="Email"><br>
						<input type="tel" id="campo_1" name="telefono" required placeholder="Telefono"><br>
						<button type="submit"  id="registro">Registrase</button>
					</form>	
			</div>				
		</section>
		<?php 
			}
		?>
	</body>	
</html>