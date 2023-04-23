<?php
    include('../conexion/conexion.php');
     $fecha = date("Y-m-d");
     echo $fecha;
     $sql1 = "SELECT COUNT(id_curso),nombre_curso FROM tb_wishlist GROUP BY nombre_curso"; //cambiar mis cursos con tb_wishlist
     $result1 = $connect->query($sql1);
     if($result1->num_rows > 0) {
        $contador =0;
         while($row = $result1->fetch_assoc()) 
         { 
                 $temp_curso=$row['nombre_curso'];
                 echo $temp_curso;
                 $temp_cantidad=$row['COUNT(id_curso)'];
                 echo $temp_cantidad;
                 $contador++; 
                 echo $contador;
                 $sql = "INSERT INTO tb_estadistica (curso, cantidad, fecha ) VALUES ('$temp_curso', '$temp_cantidad', '$fecha')";
                if($connect->query($sql) === TRUE) {
                    echo '<script>alert("Los cambios se han realizado con exito")</script>';
                } else {
                    echo "Error " . $sql . ' ' . $connect;
                }
        }
                } else {
                    echo "<tr><td colspan='5'><center>!</center></td></tr>";
                }
                echo $contador;

      
    ?>
  