<?php
	include('conexion/conexion.php');
?>
<!DOCTYPE html>
  <html lang="ES">
    <head>
      <title>CSS Template</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/style.css">
    <header>
  <h2>Inadeh</h2>
</header>
<body>

<ul>
  <li><a href="#home">Inicio</a></li>
  <li><a href="#news">Informacion</a></li>
  <li><a href="#contact">Contactanos</a></li>
  <li style="float:right"><a class="active" href="#about">Transparencia</a></li>
</ul>


<section>
  <!-- Barra Lateral -->
  <nav>
  <div id="form">
      <form method="POST" action="seguridad/login_accion.php">
        <a>Acceso al sistema<br></a>
        <a>Usuario:</a>
        <input type="text" name="email" class="textbox" >
        <a>Contraseña:</a>
        <input type="password" name="password" class="textbox">
        <input id="submit" type="submit" name="Entrar">
            <footer class="clearfix">
                <p><span class="info">? </span><a href="nuevo_usuario.php">Registrate</a></p>
            </footer>
      </form>
    </nav>

    <article>
    <h1>Cursos </h1>
    <p>Estos son los cursos ofertados en el Inadeh Guarare.</p>
<!-- Listado de Cursos -->

<!-- Portfolio Gallery Grid -->
<div class="row">
  
      <?php
            //$sql = "SELECT * FROM tb_cursos WHERE status='por confirmar' OR status='pendiente' OR status='confirmado' OR status='Realizado'";
                $sql = "SELECT * FROM tb_cursos ";
                $result = $connect->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) 
                    {
                    echo "<div class='column'>
                          <div class='content'>
                            <img src='img/".$row['foto']." 'style='width:80%'>
                            <h3>".$row['nombre']."</h3>
                            <p>".$row['codigo']. $row['horas']."</p>
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
</footer>

</body>
</html>