<?php
  require('../seguridad/seguridad.php');
	include('../conexion/conexion.php');
	$userid=$_SESSION['id'];
	$userq=mysqli_query($connect,"select * from `tb_usuario` where id='$userid'");
	$userrow=mysqli_fetch_array($userq);
?>
<!-- HTML codigo -->
<!doctype html>
<html>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/dashboardUsuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <head>
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
        <script type ="text/javascript" src="../js/sideBar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <title>Mis Cursos - Sistema de Estimacion de Tendnecias / Inadeh / Modulo Administrador</title>
    </head>
    <body>
    <script type="text/javascript">
      var estadistica = [];
    </script>

        <!-- Top Barr -->
        <div class="topnav">
          <a class="openbtn" href="#" onclick="openNav()">Home</a>
          <a href="#about">About</a>
          <a href="#contact">Contact</a>
            <div class="search-container">
              <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
        </div>
         <!-- Barra Derecha Desplegable -->
        <div id="mySidebar" class="sidebar">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
          <a >Hola, <?php echo $userrow['nombre'],$userrow['apellido']; ?> </a><br>
          <a href="#">About</a>
          <a href="#">Services</a>
          <a href="#">Clients</a>
          <a href="#">Contact</a>
        </div>

        <!-- barra derecha -->
        <!-- Perfil -->
        <div class="sidebar-left">
          <div class="profile">
          <h1>Modulo Administrador.</h1>
            <img src="../img/perfil.png" alt="profile_picture">
            <h3><?php echo $userrow['nombre'],$userrow['apellido']; ?></h3>
            <p>usuario</p>
            <a href='../seguridad/salir.php'><button type='button'><i class="fa-solid fa-right-from-bracket"></i></button></a>
          </div>
          <h3>Cursos Inscritos</h3>
          <!-- Portfolio Gallery Grid -->
        </div>
         

<!-- Cursos Disponible -->

 
      <?php
      $cursos=[];
            //$sql = "SELECT * FROM tb_cursos WHERE status='por confirmar' OR status='pendiente' OR status='confirmado' OR status='Realizado'";
            $sql1 = "SELECT * FROM tb_misCursos ";
            $result1 = $connect->query($sql1);
            if($result1->num_rows > 0) {
                while($row = $result1->fetch_assoc()) 
                   { 
                       $val_temp=$row['nombre_curso'];
                       ?> 
                       <script type="text/javascript">
                           estadistica.push(<?php echo json_encode($val_temp);?>);
                       </script>
                       <?php 
                 
                   }
               } else {echo "<tr><td colspan='5'><center>No se encontraron Datos</center></td></tr>";
           }
                  ?>

<div class="plot"><div id="myPlot" style="width:90%;max-width:900px"></div>

</div>
<script>
  let var1 =[]
  let varr2=[]
  var counts = {};
  estadistica.forEach(function(element) {
    counts[element] = (counts[element] || 0) + 1;
  });
  for (var element in counts) {
    var1.push(element);
    varr2.push(counts[element]);
  } 

  const xArray = [...var1];
  const yArray = [...varr2];

  const data = [{
    x:xArray,
    y:yArray,
    type:"bar",
    
    //orientation: "v"
  }];
  const layout = {title:"Cantidad de Personas registrada en los cursos"};
  Plotly.newPlot("myPlot", data, layout);
</script>



</body>














</html>