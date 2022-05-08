<?php
session_start();
$cod_tema=$_SESSION['cod_tema'];
$admin = $_SESSION['admin'];
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
		<?php
			if($admin=="0"){
				include('ejecutar_curso.php');
			}else{
				
				include('crear_curso.php');
			}
		?>

	</body>	
</html>
<?php
 }else{
 	header('location:../index.php');
 }
?>
