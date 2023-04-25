<?php require_once '../conexion/conexion.php'; 
	$userid=$_SESSION['id'];
	$userq=mysqli_query($connect,"select * from `tb_usuario` where id='$userid'");
	$userrow=mysqli_fetch_array($userq);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="../css/registroUsuario.css">
</head>
<body>
<?php
    include('../conexion/conexion.php');
    $idCurso = $_GET['idCursos'];  
?>
<div class="signupFrm">
    <form action="" method="post" class="form" enctype="multipart/form-data" >
        <img src="../img/inadeh-logo.png" alt="logo"> 
        <h1 class="title">Modificar de Curso</h1>
        <?php $sql = " SELECT * FROM tb_misCursos where id = $idCurso ";    
          $result = $connect->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {
                echo "
                <div class='inputContainer'>
                  <input type='text' name='txtcodigo' class='input' value=".$row['nombre_usuario'].">
                  <label for='' class='label'>Codigo del Curso</label>
                </div>

                <div class='inputContainer'>
                  <input type='text' name='txtnombrecurso'class='input' value=".$row['nombre_curso'].">
                  <label for='' class='label'>Nombre del Curso</label>
                </div>

                <div class='inputContainer'>
                  <input type='text' name='txthora'class='input' value=".$row['cidugi_curso'].">
                  <label for='' class='label'>Horas</label>
                </div>

                <div class='inputContainer'>
                  <select class='input' name='cbxactivo' >
                    <option value='Activo'>Activo</option>
                    <option value='Desactivado'>Desactivado</option>
                </div>";
                      }
                      } else {
                          echo "<tr><td colspan='5'><center>Error el curso no existe</center></td></tr>";
                      }
                      ?>
                      <div class="square">
                <input type="submit" class="square" value="Modificar Curso">
                </div>
      </form>
  </div>
  <?php 
  if($_POST) {
      $codigo = $_POST['txtcodigo'];
      $nombre = $_POST['txtnombrecurso'];
      $hora = $_POST['txthora'];
      $activo = $_POST['cbxactivo'];

      
    // $fecha_solicitud=strftime( "%Y-%m-%d-%H-%M-%S", time() );//capturar la fecha actual
      
      $sql = "UPDATE tb_cursos SET codigo= '$codigo', nombre='$nombre', horas='$hora', activo='$activo'  WHERE id=$idCurso ";
      if($connect->query($sql) === TRUE) {
        echo '<script>alert("Los cambios se han realizado con exito")</script>';

      } else {
          echo "Error " . $sql . ' ' . $connect->connect_error;
      }
  
      $connect->close();
  }
 
?>
</body>
</html>
