<?php require_once 'conexion/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="css/registroUsuario.css">
</head>
<body>
<div class="signupFrm">
    <form action="" method="post" class="form">
        <img src="img/inadeh-logo.png" alt="logo"> 
      <h1 class="title">Registro de Usuario</h1>

      <div class="inputContainer">
        <input type="text" name="txtnombre" class="input" placeholder="a">
        <label for="" class="label">Nombre</label>
      </div>

      <div class="inputContainer">
        <input type="text" name="txtapellido"class="input" placeholder="a">
        <label for="" class="label">Apellido</label>
      </div>

      <div class="inputContainer">
        <input type="text" name="txtcorreo"class="input" placeholder="a">
        <label for="" class="label">Correo</label>
      </div>

      <div class="inputContainer">
        <input type="text" name="txtpassword"class="input" placeholder="a">
        <label for="" class="label">Password</label>
      </div>

      <input type="submit" class="submitBtn" value="Sign up">
      <a href="index.php">Regresar al Menu</a>
    </form>
  </div>
  <?php 
  if($_POST) {
      $nombre = $_POST['txtnombre'];
      $apellido = $_POST['txtapellido'];
      $correo = $_POST['txtcorreo'];
      $password = $_POST['txtpassword'];
      $roll_id = 2 ;
    // $fecha_solicitud=strftime( "%Y-%m-%d-%H-%M-%S", time() );//capturar la fecha actual
      
      $sql = "INSERT INTO tb_usuario (nombre, apellido, correo, password , roll_id) VALUES ('$nombre', '$apellido','$correo','$password','$roll_id')";
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
