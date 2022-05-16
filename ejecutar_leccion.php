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
    <link rel="shortcut icon" href="imagenes/prueba.ico">
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
        <?php
			include('php/conexion.php');
				$cod_leccion=$_REQUEST['cod_leccion'];
                $cod_curso=$_REQUEST['cod_curso'];
				$tema="SELECT * FROM leccion where cod_leccion=$cod_leccion";
				$resultadostema=$conexion->query($tema);
				$rowtema=$resultadostema -> fetch_assoc();	
		?>
        <div class="cursos">
            <div class="temas_titulo">
                <p id="titulo_detalle"><?php echo $rowtema['titu_leccion'];?></p>
            </div>
            <video src="videos_usu/lecciones/<?php echo$rowtema['vid_leccion']; ?>" id="vid_detalle" controls autoplay></video>
            <article class="parrafo">
                <h2>Objetivo de la lección</h2>
                <?php echo $rowtema['objetivo_leccion']; ?>
            </article> 
            <article class="parrafo">
                <h2>Links de apoyo</h2>
                <?php echo $rowtema['links_leccion']; ?>
            </article>  
            <article class="parrafo">
                <h2>Teoria</h2>
                <?php echo $rowtema['teoria_leccion']; ?>
            </article>   
            <article class="parrafo">
                <h2>Ejemplo</h2>
                <?php echo $rowtema['ejemplo_leccion']; ?>
            </article>                                             
            <a href="recursos_usu/material/<?php echo$rowtema['apoyo_leccion']; ?>" download="<?php echo$rowtema['apoyo_leccion']; ?>">Materia de apoyo</a>
            <a href="recursos_usu/lectura/<?php echo$rowtema['lectura_leccion']; ?>" download="<?php echo$rowtema['lectura_leccion']; ?>">Lecturas de la lección</a>
            <?php 
                $ultima_leccion=$conexion->query("SELECT MAX(cod_leccion) codigo FROM leccion where cod_curso=$cod_curso");
                $row=$ultima_leccion-> fetch_assoc();
                $ultima = $row['codigo'];            
                if ($cod_leccion== $ultima){
            ?>
                <a href="php/terminar_leccion.php?cod_curso=<?php echo$rowtema['cod_curso'];?>&cod_leccion=<?php echo$cod_leccion;?>">Terminar</a>
            <?php 
            }else{
            ?>
                <a href="php/Siguiente_leccion.php?cod_curso=<?php echo$rowtema['cod_curso'];?>&cod_leccion=<?php echo$cod_leccion;?>">Siguiente</a>
            <?php 
            }
            ?>            
        </div>
    </section>
</body>
</html>
<?php
 }else{
 	header('location:./index.php');
 }
?>
