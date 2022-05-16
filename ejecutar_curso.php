<?php
        $cod_curso=$_SESSION['cod_tema'];
        $usuario=$_SESSION['u_usuario'];
        $admin = $_SESSION['admin'];
        if (isset($_SESSION['u_usuario'])){
?>
<section class="main">
        <?php
                include('php/conexion.php');
                include('php/proxima_leccion.php');
                        $usuario_consultar=$conexion->query("select * from ingresar where id_usu='$usuario'");
                        $row=$usuario_consultar-> fetch_assoc();
                        $cod_usuario=$row['cod_usu'];
                        $tema="SELECT * FROM pagos AS pg INNER JOIN curso AS cur ON pg.cod_curso  = cur.cod_curso WHERE pg.cod_usu=$cod_usuario and pg.estado_pago = 'aprobado';";
                        $resultadostema=$conexion->query($tema);
                while ($rowtema=$resultadostema -> fetch_assoc()){				
	?>
        <div class="temas">
            <div class="temas_titulo">
                <h1><?php echo $rowtema['titu_curso']; ?></h1>
            </div>
            <img src="imagenes_usu/cursos/<?php  echo $rowtema['img_curso'];?>" id="img"><br>

            <?php 
                $codigo_curso=$rowtema['cod_curso'];
                $cantidad_leccion=$conexion->query("SELECT COUNT(*) codigo FROM leccion where cod_curso=$codigo_curso");
                $row_leccion_real=$cantidad_leccion-> fetch_assoc();
                $total_lecciones = $row_leccion_real['codigo'];  
                
                $cantidad_lecciones_avanzadas=$conexion->query("SELECT COUNT(cod_leccion) codigo FROM progreso where cod_curso=$codigo_curso and cod_usu= $cod_usuario");
                $row_progreso=$cantidad_lecciones_avanzadas-> fetch_assoc();
                $ultima_progreso = $row_progreso['codigo']; 

                $avance_total= ($ultima_progreso * 100 )/$total_lecciones;
            ?>

            <div class="progress-bar blue stripes shine">
            <span style="width: <?php echo $avance_total;?>%"></span><p style="color:#00ADB5; text-align: center;	margin: 5px 0px 0% 1%; font-size:150%;font-weight: bold;";><?php echo floor($avance_total)."%";?></p>
            </div>                   
            <?php 
                $codigo_curso=$rowtema['cod_curso'];
                $ultima_leccion=$conexion->query("SELECT MAX(cod_leccion) codigo FROM leccion where cod_curso=$codigo_curso");
                $row_leccion=$ultima_leccion-> fetch_assoc();
                $ultima = $row_leccion['codigo'];  
                
                $ultima_progreso=$conexion->query("SELECT MAX(cod_leccion) codigo FROM progreso where cod_curso=$codigo_curso and cod_usu= $cod_usuario");
                $row_progreso=$ultima_progreso-> fetch_assoc();
                $ultima_progreso = $row_progreso['codigo']; 
                
          
                if ($ultima_progreso == $ultima){
            ?>
                <h2>Curso Finalizado</h2>
                
            <?php 
            }else{
            ?>
                <a href="ejecutar_leccion.php?cod_leccion=<?php echo proxima_leccion($rowtema['cod_curso'],$cod_usuario);?>&cod_curso=<?php echo $rowtema['cod_curso'];?>">Ejecutar curso</a>
            <?php 
            }
            ?>  
        </div>

        <?php 
	        }
	?>
</section>
<?php
 }else{
 	header('location:../index.php');
 }
?>