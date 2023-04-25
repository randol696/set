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
    <head>
        <script type ="text/javascript" src="../js/sideBar.js"></script>
        <title>Mis Cursos - Sistema de Estimacion de Tendnecias / Inadeh</title>
    </head>
    <body>

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
            <img src="../img/perfil.png" alt="profile_picture">
            <h3><?php echo $userrow['nombre'],$userrow['apellido']; ?></h3>
            <p>usuario</p>
            <a href='../seguridad/salir.php'><button type='button'>Salir</button></a>
          </div>
          <h3>Cursos Inscritos</h3>
          <!-- Portfolio Gallery Grid -->
          <?php
        //$sql = "SELECT * FROM tb_cursos WHERE status='por confirmar' OR status='pendiente' OR status='confirmado' OR status='Realizado'";
            $sql = "SELECT * FROM tb_misCursos where id_usuario = $userid ";
            $result = $connect->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "<ul>
                        <li>
                          <p>".$row['nombre_curso']."</p> 
                          <a href='verCursos.php?idCursos=".$row['id']."'>Ver curso</a>
                          <a href='borrarCurso.php?idMisCursos=".$row['id']."'>Borrar</a>
                        </li>
                     </ul>";}
              } else {
                echo "<tr><td colspan='5'><center>No estas inscrito a ningun curso!</center></td></tr>";
              } ?>
          </div> 


 

<!-- Cursos Disponible -->
<div class="row">
    <h3>Cursos Disponibles</h3>
      <?php
            //$sql = "SELECT * FROM tb_cursos WHERE status='por confirmar' OR status='pendiente' OR status='confirmado' OR status='Realizado'";
                $sql1 = "SELECT * FROM tb_cursos ";
                $result1 = $connect->query($sql1);
                if($result1->num_rows > 0) {
                    while($row = $result1->fetch_assoc()) 
                    {
                    echo "<div class='column'>
                            <div class='content'>
                            <img src='../img/".$row['foto']." 'style='width:40%'>
                            <h5>".$row['nombre']."</h5>
                            <p>".$row['codigo']."</p><p>Horas: ".$row['horas']."</p>
                              <div class='btn-cursos'>
                                <a href='../verCursosDetalle.php?idCursos=".$row['id']."'><button type='button'>Detalle</button></a>
                              </div>

                              <div class='btn-adwishlist'>
                                <a href='accionInscripcion.php?idCursos=".$row['id']."'><button type='submit' name='paso1'>Inscribirse</button></a>
                              </div>

                              <div class='btn-adwishlist'>
                              <a href='wishList.php?idCursos=".$row['id']."'><button type='submit' name='paso1'>Añadir a Lista de Deseos</button></a>
                              </div>
                             
                              </div> 
                          </div> ";
                      }
                      } else {
                          echo "<tr><td colspan='5'><center>!</center></td></tr>";
                      }
                  ?>
            </div>
            </div> 
</div> 
</div> 
    </body>














</html>