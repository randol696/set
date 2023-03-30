<?php
    require('../seguridad/seguridad.php');
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
        <a href='../seguridad/salir.php'><button type='button'>Salir</button></a>

        <!-- Portfolio Gallery Grid -->

  
  <?php
        //$sql = "SELECT * FROM tb_cursos WHERE status='por confirmar' OR status='pendiente' OR status='confirmado' OR status='Realizado'";
            $sql = "SELECT * FROM tb_misCursos where id_usuario = $userid ";
            $result = $connect->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {
                echo "<div class='column'>
                      <div class='content'>
                        <h5>".$row['nombre_curso']."</h5>
                        <h5>".$row['codigo_curso']."</h5>
                          <div class='btn-cursos'>
                            <a href='borrarCurso.php?idMisCursos=".$row['id']."'><button type='button'>X</button></a>
                          </div>

                      </div>
                      </div> ";
                  }
                  } else {
                      echo "<tr><td colspan='5'><center>No estas inscrito a ningun curso!</center></td></tr>";
                  }
              ?>
    <section>Cursos Disponibles</section>

<!-- Cursos Disponible -->
<div class="row">
  
      <?php
            //$sql = "SELECT * FROM tb_cursos WHERE status='por confirmar' OR status='pendiente' OR status='confirmado' OR status='Realizado'";
                $sql1 = "SELECT * FROM tb_cursos ";
                $result1 = $connect->query($sql1);
                if($result1->num_rows > 0) {
                    while($row = $result1->fetch_assoc()) 
                    {
                    echo "<div class='column'>
                          <div class='content'>
                            <img src='../img/".$row['foto']." 'style='width:10%'>
                            <h5>".$row['nombre']."</h5>
                            <p>".$row['codigo']."</p><p>Horas: ".$row['horas']."</p>
                              <div class='btn-cursos'>
                                <a href='../verCursosDetalle.php?idCursos=".$row['id']."'><button type='button'>Detalle</button></a>
                              </div>

                              <div class='btn-adwishlist'>
                              <a href='accionInscripcion.php?idCursos=".$row['id']."'><button type='submit' name='paso1'>Inscribirse</button></a>
                              </div>

                              <div class='btn-adwishlist'>
                              <button>Añadir a Lista de Deseos</button>
                              </div>

                          </div>
                          </div> ";
                      }
                      } else {
                          echo "<tr><td colspan='5'><center>!</center></td></tr>";
                      }
                  ?>
</div>

    </body>














</html>