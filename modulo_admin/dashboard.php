<?php
  require('../seguridad/seguridad.php'); 
	include('../conexion/conexion.php');
	$userid=$_SESSION['id'];
	$userq=mysqli_query($connect,"select * from `tb_usuario` where id='$userid'");
	$userrow=mysqli_fetch_array($userq);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="../js/loader.js"></script>
<style>
  *{
    margin: 0;
    padding: 0;
   
  }
 * {box-sizing: border-box;
 margin-left: 0px; 
}
 
body {font-family: "Lato", sans-serif;}

header {
    /*background-color: #56aaef; */ 
    padding: 10px;
    text-align: center;
    font-size: 15px;
    color: white;
    
      background: rgb(34,193,195);
      background: linear-gradient(135deg, #ffbc96 23%, rgb(15, 188, 236) 100%); 
    
  }

/* top bar*/
.topnav {
    position: -webkit-sticky;
    position: sticky;
    overflow: hidden;
    background-color: #19276C;
    margin-top: -9px;
    margin-left: -9px;
   
  }
  
  .topnav a {
    float: left;
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }
  
  .topnav a:hover {
    background-color: #ddd;
    color: black;
  }
  
  .topnav a.active {
    background-color: #2196F3;
    color: white;
  }
  
  .topnav .search-container {
    float: right;
  }
  
  .topnav input[type=text] {
    padding: 6px;
    margin-top: 8px;
    font-size: 17px;
    border: none;
  }
  
  .topnav .search-container button {
    float: right;
    padding: 6px 10px;
    margin-top: 8px;
    margin-right: 16px;
    background: #ddd;
    font-size: 17px;
    border: none;
    cursor: pointer;
  }
  
  .topnav .search-container button:hover {
    background: #ccc;
  }


/* Avatar */
.sidebar-left .profile{
  margin-top: 5px;
    margin-bottom: 3px;
    text-align: center;
  }
  
  .sidebar-left .profile img{
    display: block;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin: 0 auto;
    
  }



/* Style the tab */
.tab {
  top: 1px;
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 20%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 80%;
  border-left: none;
  height: auto;
  display: none;
}


.styled-table {

    margin-top:10px;
    width: 90%; 
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px; 
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.20);
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th{
    text-align: left;
}
.styled-table th,

.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #19276c;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #19276c;
}

.nuevo_contenedor{
   
}


.button {
  background-color: #3383ff;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
input[type=text], .form-search {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;

}
.googlegraph{
  width: 100%;
  height: 100%;
}

/* Clear floats after the tab */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>

<body>
         
  <header>
  <h2>Sistema de Estimacion de Tendencias</h2>
<img src="../img/logo.png"  height="50px" alt="logo"><br>
    </header>

 <!-- side Barr -->
<div class="tab">
<div class="sidebar-left">
    <div class="profile">
      <img src="../img/perfil.png" alt="profile_picture"><p><?php echo $userrow['nombre'], $userrow['apellido']; ?></p>
        <a href='../seguridad/salir.php'><button type='button'><i class="Tiny material-icons">clear</i></button></a>
    </div>
  </div>

  
  <button class="tablinks" onmouseover="openCity(event, 'usuarios')"><i class='Tiny material-icons'>people</i> Usuarios</button>
  <button class="tablinks" onmouseover="openCity(event, 'Cursos')"><i class='Tiny material-icons'>playlist_add_check</i> Cursos</button>
  <button class="tablinks" onmouseover="openCity(event, '3listaCursosUsuarios')"><i class='Tiny material-icons'>donut_small</i>Usuarios Inscritos</button>
  <button class="tablinks" onmouseover="openCity(event, '4cantUsuariosxCursos')"><i class='Tiny material-icons'>view_headline</i>Usuarios por Cursos</button>
  
  <button class="tablinks" onmouseover="openCity(event, '6tendenciaCursos')"><i class='Tiny material-icons'>school</i> Crear Certificacion</button>
  <button class="tablinks" onmouseover="openCity(event, 'modEstadistica')"><i class='Tiny material-icons'>show_chart</i> Historial</button>
  <button class="tablinks" onmouseover="openCity(event, '8configuracion')"><i class='Tiny material-icons'>tune</i> Configuración</button>
</div>

<!-- 1-----------------------------------------Modulo Usuarios  ------------------------------------------->
<div id="usuarios" class="tabcontent">
  <h3>Usuarios Registrados</h3>
  <p>Selecione alguna de las opciones Disponibles para los usuarios.</p>
  <a href="../registroUsuario.php"  target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=950,top=5,left=5,toolbar=yes,location=no,status=no,menubar=yes');return false;" class="button"><i class="Tiny material-icons">person_add</i> Crear Usuario</a>
  <a href="reporteUsuarios.php" target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=950,top=5,left=5,toolbar=yes,location=no,status=no,menubar=yes');return false;" class="button"><i class="Tiny material-icons">print</i> Reporte de Usuarios</a>
  <a href="reporteUsuariosAdmin.php" target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=950,top=5,left=5,toolbar=yes,location=no,status=no,menubar=yes');return false;" class="button"><i class="Tiny material-icons">print</i> Usuarios Administrativos</a>


  <form class="form-horizontal" action="#" method="post">
    <div class="row">
        <div class="form-group">
            
            <label class="control-label col-sm-4" for="email"><b>Busqueda por Usuarios</b>:</label>
              <input type="text" class="form-search" name="search" placeholder="Introduzca nombre o apellido a buscar">
              <button type="submit" name="save" class="button"><i class="Tiny material-icons">csearch</i> Buscar</button>
        </div>
        <div class="form-group">
            <span class="error" style="color:red;">* <?php echo $searchErr;?></span>
        </div>
        </div>
        </form>
  
 <!-- side Barr -->
  <table class="styled-table">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Opciones</th>
            </tr>
           

<?php if(!empty($_POST['search']))
{
    $search = $_POST['search'];
            //$sql = "SELECT * FROM tb_cursos WHERE status='por confirmar' OR status='pendiente' OR status='confirmado' OR status='Realizado'";
                $sql1 = "SELECT * FROM tb_usuario where nombre like '%$search%' or apellido like '%$search%'";
                $result1 = $connect->query($sql1);
                if($result1->num_rows > 0) {
                    while($row = $result1->fetch_assoc()) 
                    { echo "
                        <tr>
                            <td>".$row['nombre']."</td>
                            <td>".$row['apellido']."</td>
                            <td>".$row['correo']."</td>
                            <td>    
                            <a href='editar.php?id_calendario=".$row['id']."'><i class='Tiny material-icons'>csearch</i>Editar</a>
                            <a href='remove.php?id=".$row['id']."'><button type='button'>Eliminar</button></a>
                            </td>
                        </tr>"  ;
                      }
                      } else {
                        $searchErr = "Ningun resultado";
                      }
    }else {   

            $sql1 = "SELECT * FROM tb_usuario ";
            $result1 = $connect->query($sql1);
            if($result1->num_rows > 0) {
                while($row = $result1->fetch_assoc()) 
                {
                echo "
                    <tr>
                        <td>".$row['nombre']."</td>
                        <td>".$row['apellido']."</td>
                        <td>".$row['correo']."</td>
                        <td>    
                        "?> <a href='editarUsuario.php?id_usuario=<?php echo $row['id'] ?>'  target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=950,top=5,left=5,toolbar=no,location=no,status=no,menubar=no'); return false;" ><i class='Tiny material-icons'>edit</i>Editar</a>
                        <?php echo"
                        <a href='remove.php?id=".$row['id_calendario']."'><i class='Tiny material-icons'>delete</i>Eliminar</a>
                        </td>
                    </tr>"  ;
                  }


                  }else {
                    $searchErr = "Ningun resultado";
                  }
            
               
        }
    ?>
    </table>
</div>

<!-- 2-----------------------------------------Modulo Cursos  ------------------------------------------->
<div id="Cursos" class="tabcontent">
  <h3>Cursos</h3>
  <p>Selecione alguna operacion para realizar con cursos.</p> 

  <a href="registroCursos.php"  target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=950,top=5,left=5,toolbar=yes,location=no,status=no,menubar=yes');return false;" class="button"><i class="Tiny material-icons">control_point</i> Crear Un Nuevo Curso</a>
  <a href="reporteCursos.php" target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=950,top=5,left=5,toolbar=yes,location=no,status=no,menubar=yes');return false;" class="button"><i class="Tiny material-icons">print</i> Reporte Completo de Cursos</a>
   
  <table class="styled-table">
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Horas</th>
                <th>Activo</th>
                <th>Generales</th>
           
            </tr>
            <?php
            //$sql = "SELECT * FROM tb_cursos WHERE status='por confirmar' OR status='pendiente' OR status='confirmado' OR status='Realizado'";
                $sqlc = "SELECT * FROM tb_cursos ";
                $resultc = $connect->query($sqlc);
                if($resultc->num_rows > 0) {
                    while($row = $resultc->fetch_assoc()) 
                    {
                    echo "
                        <tr>
                            <td>".$row['codigo']."</td>
                            <td>".$row['nombre']."</td>
                            <td>".$row['horas']."</td>
                            <td>".$row['activo']."</td>
                            <td>    
                            "?> 
                            <a href='modCursos.php?id_curso=<?php echo $row['id'] ?>'  target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=950,top=5,left=5,toolbar=no,location=no,status=no,menubar=no'); return false;" ><i class='Tiny material-icons'>extension</i></a>
                            <a href='modCursosImagen.php?id_curso=<?php echo $row['id'] ?>'  target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=950,top=5,left=5,toolbar=no,location=no,status=no,menubar=no'); return false;" ><i class='Tiny material-icons'>panorama</i></a>
                            <a href='cursoDetalles.php?id_curso=<?php echo $row['id'] ?>'  target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=950,top=5,left=5,toolbar=no,location=no,status=no,menubar=no'); return false;" ><i class='Tiny material-icons'>local_library</i></a>
                            <?php echo"
                                
                            </td>
                        </tr>"  ;
                      }
                      } else {
                          echo "<tr><td colspan='5'><center>!</center></td></tr>";
                      }
    ?>
    </table>
</div>

<!-- 3-----------------------------------------Modulo Cursos por usuarios  ------------------------------------------->

<div id="3listaCursosUsuarios" class="tabcontent">
  <h3>Cantidad de Usuarios Inscritas a los cursos</h3>
  <p>Cantidad de usuarios por curso.</p>
  <script type="text/javascript">
      var estadistica = [];
    </script>
 <!-- <script src="https://cdn.plot.ly/plotly-latest.min.js"></script> -->
 <script type="text/javascript" src="../js/plotly-lates.min.js"></script>
 <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
 <script type="text/javascript" src="../js/loader.js"></script>
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
<div id="myChart"></div>
<div class="plotc">
    
   
<div id="myPlot"style="width:50%;max-width:900px"></div>

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
    orientation: "v"
  }];
  const layout = {title:"Cantidad de Personas registrada en los cursos"};
  Plotly.newPlot("myPlot", data, layout);
</script>

<script>
      google.charts.load("current", { packages: ["corechart"] });
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        const wArray = [];
        wArray.push(["Curso", "Num de Usuarios Inscritos"]);
        for (let i = 0; i < xArray.length; i++) {
          wArray.push([xArray[i], yArray[i]]);
        }
        console.log(wArray);
        const data = google.visualization.arrayToDataTable(wArray);


        const options = {
          //title: "Porcentaje de Numero de Usuarios inscritos a Cursos"
          'title':'Porcentaje de Numero de Usuarios inscritos a Cursos','width':950, 'height':500
        };

        const chart = new google.visualization.PieChart(document.getElementById("myChart"));
        chart.draw(data, options);
      }
    </script>
</div>
</div>
<!--4 -----------------------------------------Estadistica  ------------------------------------------->
<div id="4cantUsuariosxCursos" class="tabcontent">
  <h3>Usuarios Inscritos a Cursos</h3>
  <p>Seleccione una opcion.</p>
  <table class="styled-table">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Curso</th>
                <th>Codigo</th>
               
            </tr>
      <?php 
       $sqlc = "SELECT * FROM tb_misCursos ";
       $resultc = $connect->query($sqlc);
       if($resultc->num_rows > 0) {
           while($row = $resultc->fetch_assoc()) 
           {
           echo "
               <tr>
               <td>".$row['nombre_usuario']."</td>
               <td>".$row['apellido_usuario']."</td>
               <td>".$row['nombre_curso']."</td>
               <td>".$row['codigo_curso']."</td>
                   "?> 
                   <?php  ;
             }
             } else {
                 echo "<tr><td colspan='5'><center>!</center></td></tr>";
             }
    ?>
</table>


</div>
<!--5 -----------------------------------------Certificado  ------------------------------------------->


<!--6 -----------------------------------------Estadistica  ------------------------------------------->
<div id="6tendenciaCursos" class="tabcontent">
  <h3>Certificación</h3>
  <p>Seleccione en el Icono generar certificado</p>
  <table class="styled-table">
            <tr>
                <th>Nomre Curso</th>
                <th>Integrantes</th>
                
            </tr>
            <tr>
            <?php
            //$sql = "SELECT * FROM tb_cursos WHERE status='por confirmar' OR status='pendiente' OR status='confirmado' OR status='Realizado'";
                $sqlc = "SELECT * FROM tb_cursos ";
                $resultc = $connect->query($sqlc);
                if($resultc->num_rows > 0) {
                    while($row = $resultc->fetch_assoc()) 
                    {
                    echo "
                        <tr>
                        <td>".$row['nombre']."</td>
                        <td> <ul> "?> 
                              
                              <?php $valtemp=$row['id'];
                             $sqlu = "SELECT * FROM tb_misCursos where id_curso = $valtemp";
                             $resultu = $connect->query($sqlu);
                             if($resultu->num_rows > 0) {
                                 while($row = $resultu->fetch_assoc()) 
                                 {
                                  
                                 echo "<li>";
                                 echo $row['nombre_usuario']." ".$row['apellido_usuario']?>
                                 <a href='certificado.php?idmisCursos=<?php echo $row['id'] ?>'  target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=950,top=5,left=5,toolbar=no,location=no,status=no,menubar=no'); return false;" ><i class='Tiny material-icons'>open_in_new</i> Certificado</a> 
                                 <?php "
                                  </li>";
                                }
                                } else {


                              }

                          
                      }
                      } else {
                          echo "<tr><td colspan='5'><center>!</center></td></tr>";
                      }
                      "</ul></td></tr>"
    ?>
    </table>




</div>
<!--7-----------------------------------------Estadistica  ------------------------------------------->
<div id="modEstadistica" class="tabcontent">
  <h3>Historial de Inscripciónes de usuarios por cursos</h3>
  <p>Estadistica de todos los cursos a los que los usuarios se han inscrito a lo largo del tiempo.</p>
  <a href="est_resultado.php"  target="_blank" onclick="window.open(this.href,this.target,'width=1200,height=950,top=5,left=5,toolbar=yes,location=no,status=no,menubar=yes');return false;" class="button"><i class="Tiny material-icons">assessment</i> Ver Estadistica</a>
  <!-- <iframe name="FRAMENAME" src="est_resultado.php" width="1000" height="1000"style="z-index:10000" height="40" frameborder="0" scrolling="no" allowautotransparency=true></iframe> -->
</div>
<!--8-----------------------------------------Configuracion  ------------------------------------------->
<div id="8configuracion" class="tabcontent">
  <h3>Configuracion</h3>
  <p>Selecione una opcion del Panel.</p>
  <a href="cronJobExecutable.php"  target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=950,top=5,left=5,toolbar=yes,location=no,status=no,menubar=yes');return false;" class="button"><i class="Tiny material-icons">assessment</i>Ejecutar Cron Job</a>
</div>

<div class="clearfix"></div>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
   
</body>
</html> 
