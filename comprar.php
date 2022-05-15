<section class="main">
    <div class="cargar_curso">
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
</section>