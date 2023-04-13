<?php
include('../conexion/conexion.php');
     $fecha = date("Y-m-d");
     $sql1 = "SELECT COUNT(id_curso),nombre_curso FROM tb_wishlist GROUP BY nombre_curso"; //cambiar mis cursos con tb_wishlist
     $result1 = $connect->query($sql1);
     if($result1->num_rows > 0) {
        $contador =0;
         while($row = $result1->fetch_assoc()) 
         { 
                 $temp_curso=$row['nombre_curso'];
                 $temp_cantidad=$row['COUNT(id_curso)'];
                 $contador++; 
                 $sql = "INSERT INTO tb_estadistica (curso, cantidad, fecha ) VALUES ('$temp_curso', '$temp_cantidad', '$fecha')";
                if($connect->query($sql) === TRUE) {
                    echo "El proceso de Recopilacion de datos estadistico se ha realizado con exito";
                } else {
                    echo "Error " . $sql . ' ' . $connect;
                }
        }
                } else {
                    echo "<tr><td colspan='5'><center>!</center></td></tr>";
                }
                echo $contador;

      
    ?>
  