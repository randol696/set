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
  <div class="sidebar">
    <div class="logo-details">
     
      <img src="../img/logo.png" width="200" alt="">
      <span class="logo_name"> </span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
  
        <li>
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Mis Certificados</span>
          </a>
        </li>
        <li>
        <a href="contactos.php" target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=950,top=5,left=5,toolbar=no,location=no,status=no,menubar=no'); return false;">
            <i class='bx bx-user' ></i>
            <span class="links_name">Equipo</span>
            
          </a>
        </li>
        <li>
        <a href="bandejaMensaje.php" target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=950,top=5,left=5,toolbar=no,location=no,status=no,menubar=no'); return false;">
            <i class='bx bx-message' ></i>
            <span class="links_name">Mensajes</span>
          </a>
        </li>
        <li>
        <a href="listaDeseos.php" target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=950,top=5,left=5,toolbar=no,location=no,status=no,menubar=no'); return false;">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Favoritos</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Configuraciones</span>
          </a>
        </li>
        <li class="log_out" >
          <a href='../seguridad/salir.php'>
            <i class='bx bx-log-out' ></i>
            <span class="links_name" >Salir</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="buscar...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <img src="../img/perfil.png" alt="profile_picture">
      
        <span class="admin_name"><?php echo $userrow['nombre'], " ",$userrow['apellido']; ?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Cursos Inscritos</div>
            <?php $sql = "SELECT COUNT(id_usuario) From tb_misCursos where id_usuario = $userid ";
            $result = $connect->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                $temp_cantidad=$row['COUNT(id_usuario)'];
              }
              } else {
              } ?>
            <div class="number"><?php echo $temp_cantidad;?></div>
            <div class="indicator">
            <i class='material-icons'>school</i>
              <span class="text"> </span>
            </div>
          </div>
          
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Cursos Ofertados</div>
            <?php $sql = "SELECT COUNT(id) From tb_cursos  ";
            $result = $connect->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                $temp_cantidad=$row['COUNT(id)'];
              }
              } else {
              } ?>
            <div class="number"><?php echo $temp_cantidad;?></div>
            <div class="indicator">
            <i class='material-icons'>school</i>
             
            </div>
          </div>
        
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Certificaciones</div>
            <div class="number">0</div>
            <div class="indicator">
            <i class='material-icons'>school</i>
            </div>
          </div>
      
        </div>
        
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Lista de Deseos</div>
            <?php $sql = "SELECT COUNT(id) From tb_wishlist where id_usuario = $userid ";
            $result = $connect->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                $temp_cantidad=$row['COUNT(id)'];
              }
              } else {
              } ?>
            <div class="number"><?php echo $temp_cantidad;?></div>
            <div class="indicator">
            <i class='material-icons'>favorite</i>
              <span class="text"></span>
            </div>
          </div>
         
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Cursos Inscritos</div>
          <div class="sales-details">
          <ul class="details">
            <li class="topic">Cursos</li>
          <?php
        //$sql = "SELECT * FROM tb_cursos WHERE status='por confirmar' OR status='pendiente' OR status='confirmado' OR status='Realizado'";
            $sql = "SELECT * FROM tb_misCursos where id_usuario = $userid ";
            $result = $connect->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "
                      <li><a>".$row['nombre_curso']."</a> <a href='cursoDetalles.php?idCurso=".$row['id_curso']."'><i class='material-icons'>local_library</i></a> <a href='borrarCurso.php?idMisCursos=".$row['id']."'><i class='material-icons'>clear</i></a></li>
                    
                     ";}
              } else {
                echo "<li><a>No estas inscrito a ningun curso</a></li>";
              } ?>
              </ul>
            
    
      
          </div>
          <div class="button">
            <a href="#">See All</a>
          </div>
        </div>
        <div class="top-sales box">
          <div class="title">Cursos Ofertados</div>
          <ul class="top-sales-details">
            <li>

            <?php
            //$sql = "SELECT * FROM tb_cursos WHERE status='por confirmar' OR status='pendiente' OR status='confirmado' OR status='Realizado'";
                $sql1 = "SELECT * FROM tb_cursos ";
                $result1 = $connect->query($sql1);
                if($result1->num_rows > 0) {
                    while($row = $result1->fetch_assoc()) 
                    {
                    echo "<a href='#'>
                    <img src='../img/".$row['foto']." 'style='width:40%'>
                    
                    <span class='product'>".$row['nombre']."</span> 
                    
                  </a>
                  <span class='product'>
                  <a href='../verCursosDetalle.php?idCursos=".$row['id']."'><i class='material-icons'>open_in_browser</i></a>
                  <a href='accionInscripcion.php?idCursos=".$row['id']."'><i class='material-icons'>school</i></a>
                  <a href='wishList.php?idCursos=".$row['id']."'><i class='material-icons'>favorite</i></a>
                  </span> 
                  </li>
                <li>
                ";
              }
              } else {
                  echo "<tr><td colspan='5'><center>!</center></td></tr>";
              }
          ?>
 
   
          </ul>
        </div>
      </div>
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

