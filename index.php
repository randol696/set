<?php
	include('conexion/conexion.php');
?>
<!DOCTYPE html>
  <html lang="ES">
    <head>
      <title>CSS Template</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
      <!-- Add icon library -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/style.css">
    <header>
     <img src="img/logo.png" alt="logo"> 
    </header>
<body>

<ul>
  <li><a href="#home">Inicio</a></li>
  <li><a href="#news">Informacion</a></li>
  <li><a href="#contact">Contactanos</a></li>
  <li style="float:right"><a href="#" class="fa fa-instagram"></a></li>
  <li style="float:right"><a href="#" class="fa fa-facebook"></a></li>
  <li style="float:right"><a href="#" class="fa fa-twitter"></a></li>

</ul>


<section>
  <!-- Barra Lateral -->
  <nav>
  <div id="form">
      <form method="POST" action="seguridad/login_accion.php">
     
        <a>Usuario:</a>
        <input type="text" name="email" class="textbox" >
        <a>Contraseña:</a>
        <input type="password" name="password" class="textbox">
        <div class="btn-group">
          <button id="submit" type="submit">Entrar</button>
        </div>
        <p><a href="registroUsuario.php">Registrate</a></p>
      </form>
    </nav>

    <article>
    <h3>Cursos </h3>
    <p>Estos son los cursos ofertados en el Inadeh Guarare.</p>
<!-- Busqueda -->
      <div id="search">
        <form action="/action_page.php">
       
        </form>
      </div>
<!-- Listado de Cursos 'style='width:100%' -->

<!-- Portfolio Gallery Grid -->
<div class="row">
      <?php
            //$sql = "SELECT * FROM tb_cursos WHERE status='por confirmar' OR status='pendiente' OR status='confirmado' OR status='Realizado'";
                $sql = "SELECT * FROM tb_cursos WHERE activo ='Activo'";
                $result = $connect->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) 
                    {
                    echo "<div class='column'>
                          <div class='content'>
                            <img src='img/".$row['foto']."'>
                            <p>".$row['nombre']."</p>
                            <p>Horas: ".$row['horas']."</p>
                              <div class='btn-cursos'>
                                <a href='verCursosDetalle.php?idCursos=".$row['id']."'><button type='button'>Detalle</button></a>
                              </div>
                          </div>
                          </div> ";
                      }
                      } else {
                          echo "<tr><td colspan='5'><center>No hay Cursos!</center></td></tr>";
                      }
                  ?>
</div>

</article>
</section>
<!-- Footer -->
<footer>
  <p>Trabajo final de Graduacion UTP Azuero Estudiantes: Ariel Gonzalez / Randol H Gonzalez</p>
  <p><a href=https://github.com/randol696/set>Github</a></p>
</footer>

</body>
</html>