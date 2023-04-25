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
<div class="signupFrm">
    <form action="" method="post" class="form" enctype="multipart/form-data" >
        <img src="../img/inadeh-logo.png" alt="logo"> 
      <h1 class="title">Registro de Curso</h1>

      <div class="inputContainer">
        <input type="text" name="txtcodigo" class="input" placeholder="a">
        <label for="" class="label">Codigo del Curso</label>
      </div>

      <div class="inputContainer">
        <input type="text" name="txtnombrecurso"class="input" placeholder="a">
        <label for="" class="label">Nombre del Curso</label>
      </div>

      <div class="inputContainer">
        <input type="text" name="txthora"class="input" placeholder="a">
        <label for="" class="label">Horas</label>
      </div>

      <div class="inputContainer">
        <label for="" class="label">Subir imagen</label>
        <input type="file" name="imagen" class="input" id="myFile" name="filename">
        
      </div>

      <input type="submit" class="submitBtn" value="Registrar Curso">
      
    </form>
  </div>
  <?php 
  if($_POST) {
      $codigo = $_POST['txtcodigo'];
      $nombre = $_POST['txtnombrecurso'];
      $hora = $_POST['txthora'];
      $activo = "Activo";

      $path ="/Applications/MAMP/htdocs/SET-UTP/img/".basename($_FILES['imagen']['name']);
      if(move_uploaded_file($_FILES['imagen']['tmp_name'], $path)){
        echo '<script>alert("El Archivo se ha subido correctamente")</script>';
      }else{
        echo '<script>alert("el archivo no se ha subido correctamente")</script>';
      }
      $archivo = basename($_FILES['imagen']['name']);
    // $fecha_solicitud=strftime( "%Y-%m-%d-%H-%M-%S", time() );//capturar la fecha actual
      
      $sql = "INSERT INTO tb_cursos (codigo, nombre, horas , activo , foto) VALUES ('$codigo', '$nombre','$hora','$activo','$archivo')";
      if($connect->query($sql) === TRUE) {
          echo "<h2>se ha creado un nuevo usuario </h2>";

      } else {
          echo "Error " . $sql . ' ' . $connect->connect_error;
      }
  
      $connect->close();
  }
 
?>
</body>
</html>
