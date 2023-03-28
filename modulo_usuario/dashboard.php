<?php
    include('../seguridad/seguridad.php');
	include('../conexion/conexion.php');
	$userid=$_SESSION['id'];
	$userq=mysqli_query($connect,"select * from `tb_usuario` where id='$userid'");
	$userrow=mysqli_fetch_array($userq);
?>

<!doctype html>
<html>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/panel_principal.css">
    <head>
        <title>Mis Cursos - Sistema de Estimacion de Tendnecias / Inadeh</title>
    </head>
    <body>
        <h2>Bienvenido </h2>
        Hola, <?php echo $userrow['nombre'],$userrow['apellido']; ?><br>

    </body>
</html>