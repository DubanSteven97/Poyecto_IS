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
                $siguente=0;
                $primera=$_REQUEST['primera'];
				$tema="SELECT * FROM leccion where cod_leccion=$cod_leccion";
				$resultadostema=$conexion->query($tema);
				$rowtema=$resultadostema -> fetch_assoc();	
		?>
        <div class="cursos">
            <div class="temas_titulo">
                <p id="titulo_detalle"><?php echo $rowtema['titu_leccion'];?></p>
            </div>
            <article class="parrafo">
                <h2>Objetivo de la lección</h2>
                <?php echo $rowtema['objetivo_leccion']; ?>
            </article>             
            <article class="parrafo">
                <h2>Teoria</h2>
                <?php echo $rowtema['teoria_leccion']; ?>
            </article>             
            <video src="videos_usu/lecciones/<?php echo$rowtema['vid_leccion']; ?>" id="vid_detalle" controls autoplay></video>
            <article class="parrafo_v3">
                <h2>Links de apoyo</h2>
                <?php echo $rowtema['links_leccion']; ?>
            </article>  
            <article class="parrafo_v3">
                <h2>Ejemplo</h2>
                <?php echo $rowtema['ejemplo_leccion']; ?>
            </article>                                             
            <a href="recursos_usu/material/<?php echo$rowtema['apoyo_leccion']; ?>" download="<?php echo$rowtema['apoyo_leccion']; ?>">Materia de apoyo</a>
            <a href="recursos_usu/lectura/<?php echo$rowtema['lectura_leccion']; ?>" download="<?php echo$rowtema['lectura_leccion']; ?>">Lecturas de la lección</a>
            <a href="publicar.php">Salir del curso</a>
            <div>
                <h2 style="margin: 0px 0px 0% 1%">Cuestionario</h2>
                        <h2 style="margin: 0px 0px 0% 2%" ><?php echo "¿".$rowtema['pregunta']."?";    ?></h2>
                <form style="margin: 0px 0px 0% 3%" name="input" action="ejecutar_leccion.php?cod_curso=<?php echo$rowtema['cod_curso'];?>&cod_leccion=<?php echo$cod_leccion;?>&primera=1" method="post">
                    <?php 
                        $i=rand(1, 4);
                        switch ($i) {
                            case 1:
                            ?>
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['correcta'];?>" onchange="this.form.submit()"/> <?php echo$rowtema['correcta'];?><br />
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['incorrecta_1'];?>" onchange="this.form.submit()"/> <?php echo$rowtema['incorrecta_1'];?><br />
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['incorrecta_2'];?>" onchange="this.form.submit()"/> <?php echo$rowtema['incorrecta_2'];?><br />
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['incorrecta_3'];?>" onchange="this.form.submit()" /> <?php echo$rowtema['incorrecta_3'];?><br />                    
                            <?php
                                break;
                            case 2:
                            ?>
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['incorrecta_1'];?>" onchange="this.form.submit()"/> <?php echo$rowtema['incorrecta_1'];?><br />
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['correcta'];?>" onchange="this.form.submit()"/> <?php echo$rowtema['correcta'];?><br />
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['incorrecta_2'];?>" onchange="this.form.submit()"/> <?php echo$rowtema['incorrecta_2'];?><br />
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['incorrecta_3'];?>" onchange="this.form.submit()" /> <?php echo$rowtema['incorrecta_3'];?><br />                    
                            <?php
                                break;
                            case 3:
                            ?>
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['incorrecta_1'];?>" onchange="this.form.submit()"/> <?php echo$rowtema['incorrecta_1'];?><br />
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['incorrecta_2'];?>" onchange="this.form.submit()"/> <?php echo$rowtema['incorrecta_2'];?><br />
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['correcta'];?>" onchange="this.form.submit()"/> <?php echo$rowtema['correcta'];?><br />
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['incorrecta_3'];?>" onchange="this.form.submit()" /> <?php echo$rowtema['incorrecta_3'];?><br />                    
                            <?php
                                break;  
                            case  4:
                            ?>
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['incorrecta_1'];?>" onchange="this.form.submit()"/> <?php echo$rowtema['incorrecta_1'];?><br />
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['incorrecta_2'];?>" onchange="this.form.submit()"/> <?php echo$rowtema['incorrecta_2'];?><br />
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['incorrecta_3'];?>" onchange="this.form.submit()" /> <?php echo$rowtema['incorrecta_3'];?><br />    
                                <input type="radio" name="respuesta" value="<?php echo$rowtema['correcta'];?>" onchange="this.form.submit()"/> <?php echo$rowtema['correcta'];?><br />                
                            <?php
                            break;                                                 
                        }
                    ?>    
                </form>

                <?php 
                    $respuesta=$_REQUEST['respuesta'];
                    if ($respuesta==$rowtema['correcta'] && $primera=1){

                        $siguente=1;
                        echo '<script language="javascript">alert("Respuesta correcta!\n");</script>';
                    }elseif($primera==1){
                        $siguente=0;
                        $primera=1;
                        echo '<script language="javascript">alert("Respuesta incorrecta!\n");</script>';
                    }
                ?>
            <?php 
                $ultima_leccion=$conexion->query("SELECT MAX(cod_leccion) codigo FROM leccion where cod_curso=$cod_curso");
                $row=$ultima_leccion-> fetch_assoc();
                $ultima = $row['codigo'];            
                if ($cod_leccion== $ultima && $siguente==1){
            ?>
                <a href="php/terminar_leccion.php?cod_curso=<?php echo$rowtema['cod_curso'];?>&cod_leccion=<?php echo$cod_leccion;?>">Terminar</a>
            <?php 
                 }elseif($siguente==1){
            ?>
                <a href="php/Siguiente_leccion.php?cod_curso=<?php echo$rowtema['cod_curso'];?>&cod_leccion=<?php echo$cod_leccion;?>">Siguiente</a>
            <?php 
                }
            ?>                 
            </div>                      
        </div>
    </section>
</body>
</html>
<?php
 }else{
 	header('location:./index.php');
 }
?>
