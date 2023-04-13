<?php
include('../conexion/conexion.php');
?>
<!doctype html>
<html>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <head>
    <title>Mis Cursos - Sistema de Estimacion de Tendnecias / Inadeh / Modulo Administrador</title>
    </head>
    <body>
    <script type="text/javascript">
        var estadisticaCurso = [];
        var estadisticaCantidad = [];
    </script>


<form method="post" action="">
        <table>
         <select name="cursoBuscar">
             <option value=""> Seleccione </option> 
             <?php
                    $sql = "SELECT * FROM tb_cursos" ; 
                    $resultado = $connect->query($sql);
                    while($rows = $resultado->fetch_assoc())
                    
                    { 
                    echo "<option value='$rows[nombre]'>$rows[nombre] $rows[codigo]</option>";
                    }
             ?>
         </select>
        </table>
        <button type="submit" name="submit" >Buscar Tendencia</button>
    </form>


    <?php
    if(isset($_POST["submit"]))
    {
      $cursoBuscar=$_POST["cursoBuscar"];
    
     $sql1 = "SELECT * FROM tb_estadistica where curso='$cursoBuscar' ORDER BY fecha ASC";
     //$sql1 = "SELECT COUNT(id_est),curso, FROM tb_estadistica GROUP BY fecha";
     $result1 = $connect->query($sql1);
     if($result1->num_rows > 0) {
        
         while($row = $result1->fetch_assoc()) 
         { 
      
                 $val_temp_curso=$row['curso'];
                 $val_temp_cant=$row['cantidad'];
                ?>
                <script type="text/javascript">
                    estadisticaCurso.push(<?php echo json_encode($val_temp_curso);?>);
                    estadisticaCantidad.push(<?php echo json_encode($val_temp_cant);?>);
                </script>
                <?php 
                }
                } else {
                    echo "<tr><td colspan='5'><center>!</center></td></tr>";
                }
            }
    ?>

<div id="myPlot" style="width:100%;max-width:700px"></div>
<div id="ultimoValor"></div>

<script type="text/javascript">
    var num =[];
    for (let i=0; i < estadisticaCurso.length; i++){ 
        num.push(i);
        console.log(num)
    }
    let ultimoValor = estadisticaCantidad[estadisticaCantidad.length - 16]; // ver el ultimo elemento 
    document.getElementById("ultimoValor").innerHTML = ultimoValor; 
const xrango = num.length
const xArray = [...num];
const yArray = [...estadisticaCantidad];

// Define Data
const data = [{
  x: xArray,
  y: yArray,
  mode:"lines"
}];

// Define Layout
const layout = {
  xaxis: {range: [0, xrango], title: "Numero de Dias"},
  yaxis: {range: [0, 50], title: "Cantidad de Participantes Interesados"},  
  title: estadisticaCurso[0]
};

// Display using Plotly
Plotly.newPlot("myPlot", data, layout);
</script>

    </body>
    </html>