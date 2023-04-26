<?php
  require('../seguridad/seguridad.php');
	include('../conexion/conexion.php');
	$userid=$_SESSION['id'];
	$userq=mysqli_query($connect,"select * from `tb_usuario` where id='$userid'");
	$userrow=mysqli_fetch_array($userq);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/usuariosDashboard.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

<?php
    $idpara = $_GET['para'];  
    //echo $idpara;
    //echo $userid;
    date_default_timezone_set('America/Panama'); 
    $DateAndTime = date('m-d-Y h:i:s a', time());  

    $userpara=mysqli_query($connect,"select * from `tb_usuario` where id='$idpara'");
    $userrowpara=mysqli_fetch_array($userpara);
?>
<form action="" method="post" class="form">
    <label>Para:</label><input type="text" name="txtpara"class="input" value="<?php echo $userrowpara['nombre']," ",$userrowpara['apellido']; ?>"><br>
    <label>De:</label><input type="text" name="txtde"class="input" value="<?php echo $userrow['nombre']," ",$userrow['apellido']; ?>"><br>
    <input type="text" name="txtmensaje"class="input" placeholder="a">
<input type="submit" class="submitBtn" value="Enviar">
<?php 
  if($_POST) {
      $contactoDe = $_POST['txtde'];
      $contactoPara = $_POST['txtpara'];
      $mensaje = $_POST['txtmensaje'];
      $sql = "INSERT INTO tb_mensaje (timestamp, de_usuario_id, denombre, para_usuario_id, paranombre, mensaje) VALUES ('$DateAndTime', '$userid','$contactoDe','$idpara','$contactoPara','$mensaje')";
      if($connect->query($sql) === TRUE) {
          echo "<h2>Se ha enviado el Mensaje </h2>";
      } else {
          echo "Error " . $sql . ' ' . $connect->connect_error;
      }
      $connect->close();
  }
 
?>
</body>
</html>