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
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Boxicons CDN Link -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
    <!-- Boxicons CDN Link -->

<!-- Boxicons CDN Link -->
<div class="home-section">
    <div class="sidebar-button">
        <nav>
            <div class="search-box">
            <input type="text" placeholder="buscar...">
            <i class='bx bx-search' ></i>
            </div>
        </nav>
<!-- Boxes  -->
        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                <table >
                <tr>
                    <th>Nombre del curso</th>

                    <th>Operaciones </th>
                </tr>
                <?php 
                $sql = "SELECT * From tb_wishlist where id_usuario = $userid";
                    $result = $connect->query($sql);
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td><a>".$row['nombre_curso']."</a> </td>
                               
                                <td><a href='eliminarWishList.php?para=".$row['id']."'><i class='material-icons'></i>Eliminar</a></td>
                            </tr>";}
                    } else {
                    } ?>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>