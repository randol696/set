<!DOCTYPE html>
<html> 
<head>
</head>
<body>
<script type="text/javascript">
var estadistica = [];
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<?php
     include('../conexion/conexion.php');
     $sql1 = "SELECT * FROM tb_misCursos ";
     $result1 = $connect->query($sql1);
     if($result1->num_rows > 0) {
     
         while($row = $result1->fetch_assoc()) 
            { 
                      //echo $x;
                      //$cursos[]=$row['nombre_curso'].$row['codigo_curso'];
                
                $val_temp=$row['nombre_curso'];
                //$cursos[$x][1]=$row['codigo_curso'];
                      //echo $row['nombre_curso']."<br>";
                ?> 
                <script type="text/javascript">
                    estadistica.push(<?php echo json_encode($val_temp);?>);
                </script>
                <?php 
          
            }
        } else {echo "<tr><td colspan='5'><center>No se encontraron Datos</center></td></tr>";
    }

 // echo $cursos[0][1]; 

//echo "los arreglos caputrados de mysql son cantidad:",count($cursos),"<br>";


  ?>
  <p id="demo"></p>
  <div id="elemento"></div>
  <div id="count"></div>
  <div></div>
  <canvas id="myChart" style="width:100%;max-width:400px"></canvas>

  <script type="text/javascript">
    /*const counts ={} */
    arr2 = [...estadistica];
    //console.log(estadistica.length);
    //const counts ={} 
    //arr2.forEach(function (x) { counts[x]=(counts[x] || 0) +1  });
    //console.log(counts)
    let est = []
    //console.log(arr2.length)
    for (let i=0; i < arr2.length; i++){
        est.push([arr2[i],0]);
        //est['curso'] = arr2[i];
        //est['cantidad'] = 0;
        //console.log(est.curso[i])
        //est.push(arr2[i]);
    }
let var1 =[]
let varr2=[]
var counts = {};

arr2.forEach(function(element) {
  counts[element] = (counts[element] || 0) + 1;
});

for (var element in counts) {
  //console.log(element + ' = ' + counts[element]);
  //document.write(element + '  ' + counts[element]+'<br>');
  console.log(element);
  var1.push(element);
  varr2.push(counts[element]);
  //document.getElementById("elemento").innerHTML +=element;
  //document.getElementById("count").innerHTML += counts[element];
  
} 
console.log(var1)
console.log(varr2)
</script>

<script>
    
var xValues = [...var1];
var yValues = [...varr2];
console.log(yValues)
//var xValues = ["Italsy", "France", "Spain", "USA", "Argentina"];
//var yValues = [55, 49, 44, 24, 15];
//var barColors = ["red", "green","blue","orange","brown"];
var barColors = ["red", "green"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Personas Inscritas a Cursos"
    }
  }
});
</script>


</body>
</html>