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
    $idUsuario = $_GET['id_usuario'];  
?>
    <div class="signupFrm">
    <form action="" method="post" class="form">
        <img src="../img/inadeh-logo.png" alt="logo"> 
      <h1 class="title">Modificar Usuario</h1>
<?php
    $sql = " SELECT * FROM tb_usuario where id = $idUsuario ";    
        $result = $connect->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {
                echo "
                <div class='inputContainer'>
                    <input type='text' name='txtnombre' class='input' value=".$row['nombre']." >
                    <label for='' class='label'>Nombre</label>
                </div>
                <div class='inputContainer'>
                    <input type='text' name='txtapellido'class='input' value=".$row['apellido']." >
                    <label for='' class='label'>Apellido</label>
                </div>
                <div class='inputContainer'>
                    <input type='text' name='txtcorreo' class='input' value=".$row['correo']." >
                    <label for='' class='label'>Correo</label>
                </div>
                <div class='inputContainer'>
                    <select class='input' name='cbxroll_id' >
                    <option value='1'>Administrador</option>
                    <option value='2'>Usuario Estandar</option>
              </select>
                </div>  ";
                }
            } else {
                echo "<tr><td colspan='5'><center>Error el curso no existe</center></td></tr>";
            }
            ?>
      <input type="submit" class="submitBtn" value="Modificar">

      
    </form>
  </div>
  <?php 
  if($_POST) {
      $nombre = $_POST['txtnombre'];
      $apellido = $_POST['txtapellido'];
      $correo = $_POST['txtcorreo'];
      $password = $_POST['txtpassword'];
      $roll_id = $_POST['cbxroll_id']; 
    // $fecha_solicitud=strftime( "%Y-%m-%d-%H-%M-%S", time() );//capturar la fecha actual
    $sql = "UPDATE tb_usuario SET nombre= '$nombre', apellido='$apellido',correo='$correo',roll_id='$roll_id' WHERE id= $idUsuario";
     
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
