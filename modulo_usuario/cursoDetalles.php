<?php
  require('../seguridad/seguridad.php');
	include('../conexion/conexion.php');
	$userid=$_SESSION['id'];
	$userq=mysqli_query($connect,"select * from `tb_usuario` where id='$userid'");
	$userrow=mysqli_fetch_array($userq);
  /*----------------------------*/
  $id_curso = $_GET['idCurso'];  
  $cursos=mysqli_query($connect,"select * from `tb_cursos` where id='$id_curso'");
	$cursosRow=mysqli_fetch_array($cursos);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/detalleCursos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Boxicons CDN Link -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>


<div class="home-section">
    
  
    <div class="info">
          
          <h3><?php echo $cursosRow['nombre']; ?></h3>
          <a href="dashboard.php"><i class="material-icons">navigate_before</i></a>
          <img src="../img/<?php echo $cursosRow['foto']; ?>" height="90" width="120">
            
      </div>
        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                <table>
                  <tr>
                      <th width=200>Fecha</th>
                      <th width=175>Categoria</th>
                      <th width=300>Detalle</th>
                  </tr>
                  <?php
                    $id_curso = $_GET['idCurso'];  
                    $sql = " SELECT * FROM tb_detalleCursos where id_curso = $id_curso ORDER BY timestamp DESC";    
                    $result = $connect->query($sql);
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) 
                            {
                              echo "
                          <tr>
                              <td>".$row['timestamp']."</td>
                              <td>";
                              switch ($row['categoria']){
                                case 1:
                              
                                  ?><a><i class="material-icons">list</i> Material de Clase</a><?php 
                                  break;
                                case 2:
                            
                                  ?><a><i class="material-icons">import_contacts</i> Tarea</a><?php
                                  break;
                                case 3:
                      
                                  ?><a><i class='material-icons'>flag</i> Evaluación</a><?php
                                  break;
                                default:

                              }
                              echo "</td>
                              <td>".$row['detalle_categoria']."</td>
                            
                          </tr>"  ;
                            }
                          } else {
                              echo "<tr><td colspan='5'><center>Aun no se ha publicado</center></td></tr>";
                          }
                          ?>
                </table>
                </div>
        </div>
    </div>
</div>
<?php 
  if($_POST) {
    
    if($_POST['submit'] == 'adding'){
      $id_curso = $_POST['txt_id_curso']; 
      date_default_timezone_set('America/Panama'); 
      $timestamp = date('m-d-Y h:i:s a', time());  
      $categoria = $_POST['cbxCategoria'];
      $detalleCategoria = $_POST['txtdetalleCategoria'];
      $sql = "INSERT INTO tb_detalleCursos (id_curso, timestamp, categoria , detalle_categoria ) VALUES ('$id_curso', '$timestamp','$categoria','$detalleCategoria')";
      if($connect->query($sql) === TRUE) {
        echo '<script>alert("Anadirdo")</script>';
        header("Location: cursoDetalles.php?id_curso=$id_curso");

      } else {
          echo "Error " . $sql . ' ' . $connect->connect_error;
      }
      //process form1
    }
    }else if($_POST['submit'] == 'delete'){
      echo '<script>alert("Borrar")</script>';
        //process form2
    }

    //header("Location: success.php");
  

    /*
      $nombre = $_POST['txtnombre'];
      $apellido = $_POST['txtapellido'];
      $correo = $_POST['txtcorreo'];
      $password = $_POST['txtpassword'];
      $roll_id = $_POST['cbxroll_id']; 
    // $fecha_solicitud=strftime( "%Y-%m-%d-%H-%M-%S", time() );//capturar la fecha actual
    $sql = "UPDATE tb_usuario SET nombre= '$nombre', apellido='$apellido',correo='$correo',roll_id='$roll_id' WHERE id= $idUsuario";
     
      if($connect->query($sql) === TRUE) {
        echo '<script>alert("Los cambios se han realizado con exito")</script>';
        

      } else {
          echo "Error " . $sql . ' ' . $connect->connect_error;
      }
  
      $connect->close();
  }
*/
?>

</body>
</html>