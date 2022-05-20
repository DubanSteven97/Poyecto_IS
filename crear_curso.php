<?php
$cod_tema=$_SESSION['cod_tema'];
$usuario=$_SESSION['u_usuario'];
$admin = $_SESSION['admin'];
if (isset($_SESSION['u_usuario'])){
?>
<section class="main">
    <div class="cargar_curso">
    <h1>Creación de cursos</h1>
        <form action="php/publicar_curso.php" method="post" enctype="multipart/form-data">
            <input type="text" id="campo_1" name="titulo_curso" required placeholder="Titulo curso" ><br>
            <textarea rows="10" cols="40" id="campo_2" required name="contenido_curso" placeholder="Contenido curso"></textarea><br>
            <label for="imagen" id="campo_3">Imagen curso:</label><br>
            <input type="file" id="campo_1" name="imagen" multiple="multiple" accept="image/png,image/jpg,image/gif,image/jpeg"
                required><br>
            <label for="video" id="campo_3">Video curso:</label><br>
            <input type="file" id="campo_1" name="video" multiple="multiple" accept="video/mp4" required><br>
            <textarea rows="10" cols="40" id="campo_2" required name="caracteristicas_curso"
                placeholder="caracteristicas curso"></textarea><br>
            <input type="number" id="campo_1" name="costo_curso" required placeholder="Valor del curso" ><br>
            <input type="text" id="campo_1" name="nombre_profesor" required placeholder="Nombre del profesor" ><br>
            <label for="imagen" id="campo_3">Foto profesor:</label><br>
            <input type="file" id="campo_1" name="imagen_profesor" multiple="multiple" accept="image/png,image/jpg,image/gif,image/jpeg"
                required><br>
            <textarea rows="10" cols="40" id="campo_2" required name="descripcion_profesor" placeholder="Descripción profesor"></textarea><br>                            
            <button type="submit" id="publicar">Publicar</button>
            
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
                $mostrar="SELECT * FROM curso where cod_usu = $cod_usuario order by fec_curso desc";
                $resultados=$conexion->query($mostrar);
            while ($row=$resultados -> fetch_assoc()){
		?>
        <div class="tabla">
            <table border="0">
                <tr>
                    <td id='titu'><?php echo $row['titu_curso']; ?></td>
                    <td id='fecha'>
                        <p style="color:#00ADB5;font-size:20px;">publicado el:</p><?php echo $row['fec_curso']; ?>
                    </td>

                </tr>
                <tr>
                    <td id='contenido'><?php echo $row['cont_curso']; ?></td>
                    <td id='contenido'><img src="imagenes_usu/cursos/<?php echo$row['img_curso']; ?>" width="400" height="400"></td>
                </tr>
                <tr>
                    <td id='contenido'><?php echo $row['carac_curso']; ?></td>
                    <td id='contenido'><video src="videos_usu/cursos/<?php echo$row['vid_curso']; ?>" width="400" height="400"
                            controls></video></td>
                </tr>
                <tr>
                    <td colspan="2"><a
                            href="crear_capitulo.php?cod_curso=<?php echo$row['cod_curso'];?>&cod_usu=<?php echo$row['cod_usu'];?>">Agregar
                            capítulo</a>
                    </td>
                </tr>
            </table>
        </div>
        <?php
							}
		?>
    </div>
</section>
<?php
 }else{
 	header('location:../index.php');
 }
?>