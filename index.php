<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>D&D Software</title>
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
                window.location = "login.php?cod_tema=0";
            }
            </script>
        </div>
    </header>

    <section>

        <img src="imagenes/prueba.png"><br><br><br>
        <p>Codificamos tus ideas; Estamos para servirte.</p><br><br><br>

        <h2 class="temas_titulo">¿Quiénes somos?</h2><br><br>
        <p>Somos una compañía que brinda soluciones informáticas, ayudando a nuestros clientes en la
            sistematización de sus ideas y necesidades.</p><br><br><br>

        <h2 class="temas_titulo">Visión</h2><br><br>
        <p>Ser una compañía líder en la construcción de soluciones informáticas de calidad, excelencia e
            integralidad en Colombia.</p><br><br><br>

        <h2 class="temas_titulo">Misión</h2><br><br>
        <p>Ser una empresa reconocida y respetada en el desarrollo de soluciones informáticas; prestando
            los mejores servicios; dando las garantías que permitan la tranquilidad y confianza que cada cliente
            se merece.</p><br><br><br>

        <h2 class="temas_titulo">Políticas</h2><br><br>
        <p>Los empleados de D & D Software no trabajaran bajo algún horario, se trabaja por objetivos.
            Así este será libre de escoger el horario que más le convenga. Si el empleado no cumple con los
            objetivos propuestos entrará en un proceso disciplinario, donde si no es justificado el
            incumplimiento se desistirá de sus servicios.<br>
            La modalidad de trabajo será virtual y presencial, según las necesidades del cargo.
            La puntualidad y la excelencia serán retribuidos a nuestros empleados en bonos adicionales al
            sueldo de los empleados, esto dependerá de las evaluaciones de desempeño de cada uno.</p><br><br><br>

        <h2 class="temas_titulo">Objetivo general</h2><br><br>
        <p>Implementar una solución informática que contribuya al desarrollo de la institución y
            promover el acceso a una educación superior.</p><br><br><br>

        <h2 class="temas_titulo">Objetivos Específicos</h2><br><br>
        <p>
            <li>Fomentar el desarrollo de las personas mediante cursos libres.</li>
            <li>generar oportunidades para el desarrollo integral de los integrantes de la universidad y
                no estudiantes.</li>
            <li> Estimular la forma en que la universidad ofrece y/o promueve los diversos cursos a
                personas que no tiene la disponibilidad de acceder a una educación superior.</li>
        </p><br><br><br>
    </section>

    <section class="main">
        <?php
			include('php/conexion.php');
				$tema="SELECT * FROM tema";
				$resultadostema=$conexion->query($tema);
			while ($rowtema=$resultadostema -> fetch_assoc()){				
		?>
        <div class="temas">
            <div class="temas_titulo">
                <h1><?php echo $rowtema['titu_tema']; ?></h1>
            </div>
            <img src="imagenes_usu/temas/<?php  echo $rowtema['img_tema'];?>" id="img"><br>
            <article class="parrafo">
                <?php echo $rowtema['cont_tema']; ?>
            </article>
            <a href="participar.php?cod_tema=<?php echo$rowtema['cod_tema'];?>">Ver más</a>
            <a href="participar.php?cod_tema=<?php echo$rowtema['cod_tema'];?>">Comprar</a>
        </div>

        <?php 
			}
		?>
    </section>
    <footer>
        Copyright &copy; 2022
    </footer>
</body>

</html>