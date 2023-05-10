<?php
    require('../seguridad/seguridad.php');
	include('../conexion/conexion.php');
	$userid=$_SESSION['id'];
    $userq=mysqli_query($connect,"select * from `tb_usuario` where id='$userid'");
	$userrow=mysqli_fetch_array($userq);
    $idUsuario=$userrow['id'];
    $nombreUsuario= $userrow['nombre'];
    $apellidoUsuario=$userrow['apellido']
?>
<link rel="stylesheet" href="../css/style.css">
<html>
    <head></head>
<body>
<div class="detalle_curso">
<?php             
if (isset($_GET['idMisCursos'])) {
    $idCursos = $_GET['idMisCursos'];  
    $sql = " SELECT * FROM tb_cursos where id = $idCursos ";    
        $result = $connect->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {
                    $idCurso=$row['id'];
                    echo $nombreCurso = $row['nombre'];
                    echo $codigoCurso=$row['codigo'];
                    
                    "

                    ";
                }
            } else {
                echo "<tr><td colspan='5'><center>Error el curso no existe</center></td></tr>";
            }
            
     }

     $sql1 = "DELETE  FROM tb_misCursos WHERE id = {$idCursos} ";
     
    
        if($connect->query($sql1) === TRUE) {
            echo "<h3>Se ha Eliminado el curso </h3>";
            header("Location: dashboard.php");
        } else {
            echo "Error " . $sql1 . ' ' . $connect;
        }
     
        $connect->close();

     
     ?>
     </div>
</body>
</html>