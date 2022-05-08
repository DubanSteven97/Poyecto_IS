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
            function cerrar() {
                window.location = "login.php?cod_curso=0";
            }
            </script>
        </div>
    </header>
    <section class="main">
        <?php
			include('php/conexion.php');
				$cod_curso=$_REQUEST['cod_curso'];
				$tema="SELECT * FROM curso where cod_curso=$cod_curso";
				$lecciones="SELECT * FROM leccion where cod_curso=$cod_curso";
				$resultadostema=$conexion->query($tema);
				$rowtema=$resultadostema -> fetch_assoc();	
				$resultadosLecciones=$conexion->query($lecciones);
		?>
        <div class="cursos">
            <div class="temas_titulo">
                <p id="titulo_detalle"><?php echo $rowtema['titu_curso'];?></p>
            </div>
            <video src="videos_usu/cursos/<?php echo$row['vid_curso']; ?>" id="img_detalle" controls></video><br>
            <article class="parrafo">
                <h2>Contenido del curso</h2>
                <?php echo $rowtema['cont_curso']; ?>
            </article>
            <article class="parrafo">
                <h2>Caractareristicas del curso</h2>
                <?php echo $rowtema['carac_curso']; ?>
            </article>
            <article class="parrafo">
                <h2>Lecciones</h2><br>
                <?php 		
					while ($rowleccion=$resultadosLecciones -> fetch_assoc()){
								
				?>
    			 <p><?php echo $rowleccion['titu_leccion']; ?></p><br>
				<?php 
					} 
				?>
            </article>

            <a href="participar.php?cod_curso=<?php echo$rowtema['cod_curso'];?>">Comprar</a>
        </div>
    </section>
    <footer>
        Copyright &copy; 2022
    </footer>
</body>

</html>