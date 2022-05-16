<html>

	<?php 

		if($_REQUEST['comprar'] == null){
			$comprar="false";
		}else{
			$comprar=$_REQUEST['comprar'];
		}	
	
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
						<h1>Formulario de ingreso</h1>
						<form action="php/login.php?cod_curso=<?php echo $_REQUEST['cod_curso'];?>&comprar=<?php echo $comprar;?>" method="post">					
							<input type="text" id="campo_1" name="usuario" required placeholder="Usuario" autocomplete="off" >
							<input type="password" id="campo_1" name="contraseña"  required placeholder="Contraseña" autocomplete="off">
							<button type="submit"  id="registro">Ingresar</button>
						</form><br>
						<button onclick="cerrar()" id="registro">Registrarse</button>
						<script type="text/javascript">
							function cerrar(){
								window.location="registro.php?cod_curso=<?php echo $_REQUEST['cod_curso'];?>&comprar=<?php echo $comprar;?>";
							}
						</script>						
			</div>	
	</body>	
</html>