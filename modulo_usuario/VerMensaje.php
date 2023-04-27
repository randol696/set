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
    <link rel="stylesheet" href="../css/inbox.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Boxicons CDN Link -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <style>
    body {
        background-color: #f9fafb;
    margin-top:20px;
    }
    .box{
        
        background-color: #ddd;
        color: #686868;
        width: 90%;
        height: 600px;
    }
    .input_long{
        width: 90%;
        height: 200px;
        text-align: left;
        text-align: top;
        padding: 14px 0;
    }

   </style>
<body>
<button onclick="history.back()">Regresar</button>
<?php
    $idMensaje = $_GET['id'];  
    //echo $idpara;
    //echo $userid;
    date_default_timezone_set('America/Panama'); 
    $DateAndTime = date('m-d-Y h:i:s a', time());  
    $sql = "SELECT * FROM tb_mensaje where id = $idMensaje ";
    $result = $connect->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           $temp_timestamp= $row['timestamp'];
           $temp_denombre=$row['denombre'];
           $temp_paranombre=$row['paranombre'];
           $temp_mensaje=$row['mensaje'];
        }
      } else {
        echo "<li><a>No tienes Ningun Mensaje</a></li>";
      } 
?>
<div class="box">
 <a>Correo</a><br>
 <label for='' class='label'>Fecha</label><br>
 <input type='text' name='txtnombre' class='input' value="<?php echo $temp_timestamp ?>" ><br>
 <label for='' class='label'>De: </label><br>
 <input type='text' name='txtnombre' class='input' value="<?php echo $temp_denombre ?>" ><br>
 <label for='' class='label'>Mensaje: </label><br>
 <input type='text' name='txtnombre' class='input_long' value="<?php echo $temp_mensaje ?>" ><br>
                   
</div>
</table>
</body>
</html>