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
                window.location = "login.php?cod_curso=0&comprar=false";
            }
            </script>
        </div>
    </header>
    <section class="main">
        <?php
			include('php/conexion.php');
				$cod_curso=$_REQUEST['cod_curso'];
				$tema="SELECT * FROM curso where cod_curso=$cod_curso";
                $capitulos="SELECT * FROM capitulo where cod_curso=$cod_curso";
                $horas="SELECT SUM(horas_leccion) AS horas FROM leccion where cod_curso=$cod_curso";
				$resultadostema=$conexion->query($tema);
                $resultadoshoras=$conexion->query($horas);
                $rowhoras=$resultadoshoras -> fetch_assoc();
				$rowtema=$resultadostema -> fetch_assoc();	
                $resultadoscapitulos=$conexion->query($capitulos);
		?>
        <div class="cursos">
            <div class="temas_titulo">
                <p id="titulo_detalle"><?php echo $rowtema['titu_curso'];?></p>
            </div>
            <article class="parrafo">
                <h2>Contenido del curso</h2>
                <?php echo $rowtema['cont_curso']; ?>
            </article>          
            <video src="videos_usu/cursos/<?php echo$rowtema['vid_curso']; ?>" id="vid_detalle" controls autoplay></video>

            <article class="parrafo_v3">
                <h2>Valor del curso</h2>
                <?php echo "$ ".$rowtema['costo_curso']; ?>
            </article>    
            <article class="parrafo_v3">
                <h2>Horas del curso</h2>
                <?php echo $rowhoras['horas']." h"; ?>
            </article>                       
            <article class="parrafo_v3">
                <h2>Componentes</h2><br>
                <?php 		
					while ($rowcapitulos=$resultadoscapitulos -> fetch_assoc()){				
				?>
                <div>
    			 <p><b><?php echo $rowcapitulos['titu_capitulo']; ?></b></p><br>
                 <ul  style="margin: 0px 0px 0% 10%">
                 <?php 	
                    $cod_capitulo=$rowcapitulos['cod_capitulo'];
                    $lecciones="SELECT * FROM leccion where cod_curso=$cod_curso and cod_capitulo =$cod_capitulo ";
                    $resultadosLecciones=$conexion->query($lecciones);
					while ($rowlecciones=$resultadosLecciones -> fetch_assoc()){				
				?>                 
                    <li><?php echo $rowlecciones['titu_leccion']; ?> - <?php echo $rowlecciones['horas_leccion']; ?> <b>h</b></li>
                <?php 
					} 
				?>
                </ul>
                <div>
				<?php 
					} 
				?>
            </article>
            <article class="parrafo_v4">
                <h2>Datos del docente</h2>
            </article>    
            <article class="parrafo_v4">
                <img src="imagenes_usu/profesores/<?php  echo $rowtema['img_profesor'];?>" id="img">
            </article>                      
            <article class="parrafo_v4">
                <h2>Nombre</h2>
                <?php echo $rowtema['nombre_profesor']; ?>
            </article> 
            <article class="parrafo_v4">
                <h2>Descripción</h2>
                <?php echo $rowtema['descripcion_profesor']; ?>
            </article>                         
            <a href="login.php?cod_curso=<?php echo$rowtema['cod_curso'];?>&comprar=true">Comprar</a>
            <a href="index.php">Atrás</a>
        </div>
    </section>
    <footer>
        Copyright &copy; 2022
    </footer>
</body>

</html>