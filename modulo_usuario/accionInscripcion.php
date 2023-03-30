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
                    <form method='post'>
                    <input type=text' name='txtnombre' value='$nombreCurso'/>
                    <input type=text' name='txtnombre' value='$codigoCurso'/>

                    <button type='submit'>Confirmar Curso</button>
                    ";
                }
            } else {
                echo "<tr><td colspan='5'><center>Error el curso no existe</center></td></tr>";
            }
            
     }
     echo $idUsuario;
     echo $nombreUsuario; 
     echo $apellidoUsuario;

     echo $idCurso;
     echo $nombreCurso;
    
     echo $codigoCurso;
     if($_POST) { 
        $sql1 = "INSERT INTO tb_misCursos (id_usuario, nombre_usuario, apellido_usuario, id_curso, nombre_curso, codigo_curso )VALUES ('$idUsuario', '$nombreUsuario', '$apellidoUsuario','$idCurso','$nombreCurso','$codigoCurso' ) ";
    
        if($connect->query($sql1) === TRUE) {
            echo "<h3>Se ha Registrado el curso Satisfactoriamente </h3>";
            echo "<a href='dashboard.php'><button type='button'>Regresar</button></a>";
        } else {
            echo "Error " . $sql1 . ' ' . $connect;
        }
     
        $connect->close();

     }
     ?>