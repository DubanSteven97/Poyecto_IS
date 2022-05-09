<?php
session_start();
$cod_tema=$_SESSION['cod_tema'];
$cod_curso=$_REQUEST['cod_curso'];
$usuario=$_SESSION['u_usuario'];
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
            function cerrar() {
                window.location = "php/cerrar.php";
            }
            </script>
        </div>
    </header>
    <section class="main">
        <div class="cargar_curso">
            <form action="php/publicar_leccion.php?cod_curso=<?php echo $cod_curso;?>" method="post" enctype="multipart/form-data">
                <input type="text" name="titulo_leccion" id="campo_1"  required placeholder="Titulo lección"><br>
                <input type="text" name="objetivo_leccion" id="campo_1" required placeholder="Objetivo lección"><br>
                <label for="video" id="campo_3">Video lección:</label>
                <input type="file" name="video"  id="campo_1" multiple="multiple" accept="video/mp4" required><br>
                <label for="imagen" id="campo_3">Material de apoyo:</label>
                <input type="file" name="apoyo" id="campo_1" multiple="multiple" accept=".doc,.docx,.pdf" required><br>
                <label for="imagen" id="campo_3" >Lectura:</label>
                <input type="file" name="lectura"  id="campo_1" multiple="multiple" accept=".doc,.docx,.pdf" required><br>
                <textarea rows="10" cols="40" id="campo_2" required name="links" placeholder="Links de apoyo"></textarea><br>
                <textarea rows="10" cols="40" id="campo_2" required name="teoria" placeholder="Teoria de la lección"></textarea><br>
                <textarea rows="10" cols="40" id="campo_2" required name="ejemplo"
                    placeholder="Ejemplo de la lección"></textarea><br>
                <button type="submit" id="publicar">Crear lección</button>
            </form>
             <a href="publicar.php">Atrás</a>
        </div>
        <div>
            <?php
            include('php/conexion.php');
                $cod_tema=$_SESSION['cod_tema'];
                $usuario_consultar=$conexion->query("select * from ingresar where id_usu='$usuario'");
                $row=$usuario_consultar-> fetch_assoc();
                $cod_usuario=$row['cod_usu'];
                $mostrar="SELECT * FROM leccion where cod_usu = $cod_usuario and cod_curso = $cod_curso";
                $resultados=$conexion->query($mostrar);
            while ($row=$resultados -> fetch_assoc()){
		?>
            <div  class="tabla">
                <table border="0">
                    <tr>
                        <td id='titu'><?php echo $row['titu_leccion']; ?></td>
                        <td id='fecha'>
                            <p style="color:#00ADB5;font-size:20px;">publicado el:</p><?php echo $row['fec_leccion']; ?>
                        </td>

                    </tr>
                    <tr>
                        <td id='titu'>Objetivo:</td>
                        <td id='contenido'><?php echo $row['objetivo_leccion']; ?></td>
                    </tr>                  
                    <tr>
                        <td colspan="2" ><video src="videos_usu/lecciones/<?php echo$row['vid_leccion']; ?>" width="400" height="400"
                                controls ></video></td>
                    </tr>
                    <tr>
                        <td id='titu'>Links:</td>
                        <td id='contenido'><?php echo $row['links_leccion']; ?></td>
                    </tr> 
                    <tr>
                        <td id='titu'>Teoria lección:</td>
                        <td  id='contenido'><?php echo $row['teoria_leccion']; ?></td>
                    </tr>   
                    <tr>
                        <td id='titu'>Ejemplo lección:</td>
                        <td colspan="2" id='contenido' ><?php echo $row['ejemplo_leccion']; ?></td>
                    </tr>  
                    <tr>
                        <td colspan="2" ><a href="recursos_usu/material/<?php echo$row['apoyo_leccion']; ?>" download="<?php echo$row['apoyo_leccion']; ?>">Materia de apoyo</a></td>
                    </tr>  
                    <tr>
                        <td colspan="2" ><a href="recursos_usu/lectura/<?php echo$row['lectura_leccion']; ?>" download="<?php echo$row['lectura_leccion']; ?>">Lecturas de la lección</a></td>
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
 	header('location:../index.php');
 }
?>