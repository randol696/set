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
if (isset($_GET['id'])) {
    $idMensaje = $_GET['id'];  
     $sql1 = "DELETE  FROM tb_mensaje WHERE id = {$idMensaje} ";
        if($connect->query($sql1) === TRUE) {
            echo '<script>alert("El mensaje se ha eliminado con exito")</script>';
        } else {
            
        }
     
        $connect->close();
    }
     
?>