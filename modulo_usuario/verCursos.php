<?php require_once '../conexion/conexion.php'; 
	$userid=$_SESSION['id'];
	$userq=mysqli_query($connect,"select * from `tb_usuario` where id='$userid'");
	$userrow=mysqli_fetch_array($userq);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="../css/cursosDashboard.css">
</head>
<body>
<?php
    include('../conexion/conexion.php');
    $idCurso = $_GET['idCursos'];  
?>

 
        
<div class="sidebar">
  <div class="logo-details">
    <img src="../img/inadeh-logo.png" width="240" alt="logo"> 
  </div>
        <h1 class="title">Curso</h1>
</div>
<section class="home-section">
<div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      
        <input type="text" placeholder="Search...">
       
      </div>
        <?php $sql = " SELECT * FROM tb_misCursos where id = $idCurso ";    
          $result = $connect->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {
                echo "
                  <a>".$row['nombre_usuario']."</a>
                  <a>".$row['nombre_curso']."</a>
                  <a>".$row['codigo_curso']."</a>"; }
                } else {
                          echo "<tr><td colspan='5'><center>Error el curso no existe</center></td></tr>";
                }
                      ?>
      </div>
</section>
<div class="home-content">

</div>
</body>
</html>
