<?php require_once '../conexion/conexion.php'; ?>
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
    $idCurso = $_GET['id_curso'];  
?>
<div class="signupFrm">
    <form action="" method="post" class="form" enctype="multipart/form-data" >
        <img src="../img/inadeh-logo.png" alt="logo"> 
      <h1 class="title">Modificar de Curso</h1>
<?php
    $sql = " SELECT * FROM tb_cursos where id = $idCurso ";    
        $result = $connect->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {
                echo "
              
                
      <div class='inputContainer'>
        <input type='text' name='txtcodigo' class='input' value=".$row['codigo'].">
        <label for='' class='label'>Codigo del Curso</label>
      </div>

      <div class='inputContainer'>
        <input type='text' name='txtnombrecurso'class='input' value=".$row['nombre'].">
        <label for='' class='label'>Nombre del Curso</label>
      </div>


      <div class='inputContainer'>
        <label for='' class='label'>Subir imagen</label>
        <input type='file' name='imagen' class='input' id='myFile' name='filename'>
        
      </div>
      ";
            }
            } else {
                echo "<tr><td colspan='5'><center>Error el curso no existe</center></td></tr>";
            }
            ?>

      <input type="submit" class="submitBtn" value="Modificar Imagen">
      
    </form>
  </div>
  <?php 
  if($_POST) {
  

      $path ="/Applications/MAMP/htdocs/SET-UTP/img/".basename($_FILES['imagen']['name']);
      if(move_uploaded_file($_FILES['imagen']['tmp_name'], $path)){
        echo '<script>alert("El Archivo se ha subido correctamente")</script>';
      }else{
        echo '<script>alert("el archivo no se ha subido correctamente")</script>';
      }
      $archivo = basename($_FILES['imagen']['name']);
    // $fecha_solicitud=strftime( "%Y-%m-%d-%H-%M-%S", time() );//capturar la fecha actual
      
      $sql = "UPDATE tb_cursos SET foto='$archivo' WHERE id=$idCurso ";
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
