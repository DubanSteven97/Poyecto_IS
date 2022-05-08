<?php
session_start();
$cod_tema=$_SESSION['cod_tema'];
$cod_curso=$_REQUEST['cod_curso'];
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
        <div>
            <form action="php/publicar_leccion.php?cod_curso=<?php echo $cod_curso;?>" method="post" enctype="multipart/form-data">
                <input type="text" name="titulo_leccion" required placeholder="Titulo lección"><br>
                <input type="text" name="objetivo_leccion" required placeholder="Objetivo lección"><br>
                <label for="video">Video lección:</label>
                <input type="file" name="video" multiple="multiple" accept="video/mp4" required><br>
                <label for="imagen">Material de apoyo:</label>
                <input type="file" name="apoyo" multiple="multiple" accept=".doc,.docx,.pdf" required><br>
                <label for="imagen">Lectura:</label>
                <input type="file" name="lectura" multiple="multiple" accept=".doc,.docx,.pdf" required><br>
                <textarea rows="10" cols="40" required name="links" placeholder="Links de apoyo"></textarea><br>
                <textarea rows="10" cols="40" required name="teoria" placeholder="Teoria de la lección"></textarea><br>
                <textarea rows="10" cols="40" required name="ejemplo"
                    placeholder="Ejemplo de la lección"></textarea><br>
                <input type="reset" id="publicar" value="Limpiar todo" />
                <button type="submit" id="publicar">Crear lección</button>
            </form>
        </div>
        <div>
            <?php
            include('php/conexion.php');
                $cod_tema=$_SESSION['cod_tema'];
                $usuario=$_SESSION['u_usuario'];
                $usuario_consultar=$conexion->query("select * from ingresar where id_usu='$usuario'");
                $row=$usuario_consultar-> fetch_assoc();
                $cod_usuario=$row['cod_usu'];
                $mostrar="SELECT * FROM leccion where cod_usu = $cod_usuario and cod_curso = $cod_curso order by fec_leccion desc";
                $resultados=$conexion->query($mostrar);
            while ($row=$resultados -> fetch_assoc()){
		?>
            <div>
                <table border="1">
                    <tr>
                        <td><?php echo $row['titu_leccion']; ?></td>
                        <td>
                            <p style="color:#00ADB5;font-size:20px;">publicado el:</p><?php echo $row['fec_leccion']; ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?php echo $row['objetivo_leccion']; ?></td>
                    </tr>                  
                    <tr>
                        <td><video src="videos_usu/lecciones/<?php echo$row['vid_leccion']; ?>" width="500" height="500"
                                controls></video></td>
                    </tr>
                    <tr>
                        <td><a href="recursos_usu/material/<?php echo$row['apoyo_leccion']; ?>" download="<?php echo$row['apoyo_leccion']; ?>">Materia de apoyo</a></td>
                    </tr>  
                    <tr>
                        <td><a href="recursos_usu/lectura/<?php echo$row['lectura_leccion']; ?>" download="<?php echo$row['apoyo_leccion']; ?>">Materia de apoyo</a></td>
                    </tr>  
                    <tr>
                        <td><?php echo $row['links_leccion']; ?></td>
                    </tr> 
                    <tr>
                        <td><?php echo $row['teoria_leccion']; ?></td>
                    </tr>   
                    <tr>
                        <td><?php echo $row['ejemplo_leccion']; ?></td>
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