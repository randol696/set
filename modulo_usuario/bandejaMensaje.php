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
<body>
<table >
                <tr>
                    <th></th>
                    <th>De</th>
                    <th>Para</th>
                    <th></th>
                </tr>

<?php
    $idpara = $_GET['para'];  
    //echo $idpara;
    //echo $userid;
    date_default_timezone_set('America/Panama'); 
    $DateAndTime = date('m-d-Y h:i:s a', time());  



    $sql = "SELECT * FROM tb_mensaje where para_usuario_id = $userid ";
    $result = $connect->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td><input type='checkbox' id='one' /></label></td>
            <td><a>De: ".$row['denombre']."</a> </td>
            <td><a>Para: ".$row['paranombre']."</a> </td>
            <td><a href='Vermensaje.php?id=".$row['id']."'><i class='material-icons'>email</i>Ver</a></td>
        </tr>
             ";}
      } else {
        echo "<li><a>No tienes Ningun Mensaje</a></li>";
      } 

?>
</table>
</body>
</html>