<?php
    //include('../seguridad/seguridad.php'); como el usuario no esta logueado
	include('conexion/conexion.php');
	//$userid=$_SESSION['id'];
	//$userq=mysqli_query($connect,"select * from `tb_usuario` where idusuario='$userid'");
	//$userrow=mysqli_fetch_array($userq);
?>
<!DOCTYPE html>
  <html lang="ES">
    <head>
      <title>CSS Template</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="css/style.css">
 
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
                    echo "
                        <img src='img/".$row['foto']." 'style='width:40%'>
                        <div class='info_curso'>
                        <a>Curso </a><p>".$row['nombre']."</p>
                        <a>Codigo del Curso</a><p>".$row['codigo']."</p>
                        <a>Total de Horas</a><p>".$row['horas']. "</p>
                        <a>Estatus del curso</a><p>".$row['activo']."</p>
                        </div>
                    ";
                }
            } else {
                echo "<tr><td colspan='5'><center>Error el curso no existe</center></td></tr>";
            }
     }?>
</div>
</body>
</html>