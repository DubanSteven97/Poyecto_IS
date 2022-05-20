<?php
session_start();
$cod_tema=$_SESSION['cod_tema'];
$usuario=$_SESSION['u_usuario'];
$admin = $_SESSION['admin'];
$cod_curso=$_REQUEST['cod_curso'];
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
    <div class="cargar_curso">
    <h1>Creación de capítulos</h1>
        <form action="php/publicar_capitulo.php?cod_curso=<?php echo $cod_curso?>" method="post" enctype="multipart/form-data">
            <input type="text" id="campo_1" name="titulo_capitulo" required placeholder="Titulo capítulo" ><br>
            <textarea rows="10" cols="40" id="campo_2" required name="contenido_capitulo" placeholder="Contenido capítulo"></textarea><br>
            <label for="imagen" id="campo_3">Imagen capítulo:</label><br>
            <input type="file" id="campo_1" name="imagen" multiple="multiple" accept="image/png,image/jpg,image/gif,image/jpeg"
                required><br>
            <label for="video" id="campo_3">Video capítulo:</label><br>
            <input type="file" id="campo_1" name="video" multiple="multiple" accept="video/mp4" required><br>
            <textarea rows="10" cols="40" id="campo_2" required name="caracteristicas_capitulo"
                placeholder="caracteristicas capítulo"></textarea><br>                         
            <button type="submit" id="publicar">Publicar</button>
            
        </form>
        <a href="publicar.php">Atrás</a>
    </div>
    <div>
        <?php
            include('php/conexion.php');
                $cod_tema=$_SESSION['cod_tema'];
                $usuario=$_SESSION['u_usuario'];
                $usuario_consultar=$conexion->query("select * from ingresar where id_usu='$usuario'");
                $row=$usuario_consultar-> fetch_assoc();
                $cod_usuario=$row['cod_usu'];
                $mostrar="SELECT * FROM capitulo where cod_usu = $cod_usuario and cod_curso = $cod_curso order by fec_capitulo desc";
                $resultados=$conexion->query($mostrar);
            while ($row=$resultados -> fetch_assoc()){
		?>
        <div class="tabla">
            <table border="0">
                <tr>
                    <td id='titu'><?php echo $row['titu_capitulo']; ?></td>
                    <td id='fecha'>
                        <p style="color:#00ADB5;font-size:20px;">publicado el:</p><?php echo $row['fec_capitulo']; ?>
                    </td>

                </tr>
                <tr>
                    <td id='contenido'><?php echo $row['cont_capitulo']; ?></td>
                    <td id='contenido'><img src="imagenes_usu/capitulos/<?php echo$row['img_capitulo']; ?>" width="400" height="400"></td>
                </tr>
                <tr>
                    <td id='contenido'><?php echo $row['carac_capitulo']; ?></td>
                    <td id='contenido'><video src="videos_usu/capitulos/<?php echo$row['vid_capitulo']; ?>" width="400" height="400"
                            controls></video></td>
                </tr>
                <tr>
                    <td colspan="2"><a
                            href="crear_leccion.php?cod_curso=<?php echo $cod_curso;?>&cod_usu=<?php echo$row['cod_usu'];?>&cod_capitulo=<?php echo$row['cod_capitulo'];?>">Agregar
                            lección</a>
                    </td>
                </tr>
            </table>
        </div>
        <?php
							}
		?>
    </div>
</section>
</body>	
</html>
<?php
 }else{
 	header('location:index.php');
 }
?>