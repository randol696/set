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
if (isset($_GET['idCursos'])) {
    $idCursos = $_GET['idCursos'];  
    $sql = " SELECT * FROM tb_cursos where id = $idCursos ";    
        $result = $connect->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {
                    $idCurso=$row['id'];
                    $nombreCurso = $row['nombre'];
                    $codigoCurso=$row['codigo'];
                    echo 
                    
                    "
                    <div class='form_post'>
                    <form method='post'>
                    <input type='hidden' name='txtnombre' value='$nombreCurso' />
                    <input type='hidden' name='txtnombre' value='$codigoCurso' />

                    <button type='submit' class='btn'>Confirmar Curso</button>
                    </div>
                    ";
                }
            } else {
                echo "<tr><td colspan='5'><center>Error el curso no existe</center></td></tr>";
            }
            
     }
   /* $idUsuario;
     $nombreUsuario; 
     $apellidoUsuario;

    $idCurso; */
     echo "<a>$nombreCurso</a>";;
    
     $codigoCurso;
     if($_POST) { 
        $sql1 = "INSERT INTO tb_misCursos (id_usuario, nombre_usuario, apellido_usuario, id_curso, nombre_curso, codigo_curso )VALUES ('$idUsuario', '$nombreUsuario', '$apellidoUsuario','$idCurso','$nombreCurso','$codigoCurso' ) ";
        if($connect->query($sql1) === TRUE) {
    
            echo '<script>alert("Se ha Registrado el curso Satisfactoriamente ")</script>';
            header("Location: dashboard.php");
        } else {
            echo "Error " . $sql1 . ' ' . $connect;
        }
        $connect->close();
     }
     ?>
</div>
</body>
</html>