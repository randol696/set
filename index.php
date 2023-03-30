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
        <div class="btn-group">
          <button id="submit" type="submit">Apple</button>
        </div>
                <p><a href="nuevo_usuario.php">Registrate</a></p>
       
      </form>
    </nav>

    <article>
    <h2>Cursos </h2>
    <p>Estos son los cursos ofertados en el Inadeh Guarare.</p>
<!-- Busqueda -->
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i>Busqueda</button>
    </form>
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
                            <img src='img/".$row['foto']." 'style='width:100%'>
                            <h5>".$row['nombre']."</h5>
                            <p>".$row['codigo']."</p><p>Horas: ".$row['horas']."</p>
                              <div class='btn-cursos'>
                                <a href='verCursosDetalle.php?idCursos=".$row['id']."'><button type='button'>Detalle</button></a>
                              </div>

                              <div class='btn-adwishlist'>
                              <button>Añadir a Lista de Deseos</button>
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
</footer>

</body>
</html>