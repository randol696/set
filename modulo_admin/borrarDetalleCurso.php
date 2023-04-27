<?php
    include('../conexion/conexion.php');
    if (isset($_GET['id_curso'])) {
        $id_curso = $_GET['id_curso'];
        $cursos=mysqli_query($connect,"select * from `tb_detalleCursos` where id='$id_curso'");
        $cursosRow=mysqli_fetch_array($cursos);
        $i=$cursosRow['id_curso'];

       
         $sql1 = "DELETE  FROM tb_detalleCursos WHERE id = {$id_curso} ";
            if($connect->query($sql1) === TRUE) {
                header("Location: cursoDetalles.php?id_curso=$i");
            } else {
                
            }
         
            $connect->close();
        }
?>