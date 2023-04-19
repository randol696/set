<?php
include('../conexion/conexion.php');
?>
    <script type="text/javascript">
      var estadistica = [];
    </script>
 <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
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

<div class="plotc">
  <div id="myPlot"style="width:90%;max-width:900px"></div>

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