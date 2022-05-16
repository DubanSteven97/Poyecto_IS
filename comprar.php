<?php
$cod_curso=$_SESSION['cod_tema'];
$usuario=$_SESSION['u_usuario'];
$admin = $_SESSION['admin'];
if (isset($_SESSION['u_usuario'])){
?>
<section class="main">
    <div class="cargar_curso">
        <h1>Formulario de compra</h1>
        <form action="php/pagar_pse.php?usuario=<?php echo $usuario;?>&cod_curso=<?php echo $cod_curso;?>" method="post" enctype="multipart/form-data">
            <input type="text" id="campo_1" name="nombre_usu" required placeholder="Nombres" >
            <input type="text" id="campo_1" name="apellido_usu" required placeholder="Apellidos" > 
            <select id="campo_1" required name="banco">
			<option  selected="true" disabled="disabled">Banco</option>												
			<option value="Banco prueba">Banco prueba</option>								
			</select>                                    
            <button type="submit" id="publicar">Pagar PSE</button>
        </form>
</section>
<?php
 }else{
 	header('location:../index.php');
 }
?>