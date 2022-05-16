<?php
function proxima_leccion($cod_curso, $usuario){
    include('php/conexion.php');
    $tema="SELECT * FROM progreso where cod_curso=$cod_curso and cod_usu = $usuario";
    $resultadostema=$conexion->query($tema);
    $rowtema=$resultadostema -> fetch_assoc();	

    if ($rowtema) {
        $cod_leccion=$conexion->query("SELECT MAX(cod_leccion) codigo FROM progreso where cod_curso=$cod_curso and 	estado_leccion='Aprobado' and cod_usu = $usuario");
        $row=$cod_leccion-> fetch_assoc();
        $max=$row['codigo'];
        $cod_leccion_siguiente=$conexion->query("SELECT cod_leccion  FROM leccion where cod_leccion = (SELECT MIN(cod_leccion) FROM leccion WHERE cod_leccion > $max and  cod_curso=$cod_curso)");
        $row_siguiente=$cod_leccion_siguiente-> fetch_assoc();
        return $row_siguiente['cod_leccion'];

    }else{
        $cod_leccion=$conexion->query("SELECT MIN(cod_leccion) codigo FROM leccion where cod_curso=$cod_curso");
        $row=$cod_leccion-> fetch_assoc();
        return $row['codigo'];
    }
}

?>