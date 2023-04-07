<!DOCTYPE html>
<html> 
<head>
</head>
<body>
<script type="text/javascript">
var estadistica = [];
</script>
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

var counts = {};

arr2.forEach(function(element) {
  counts[element] = (counts[element] || 0) + 1;
});

for (var element in counts) {
  console.log(element + ' = ' + counts[element]);
  document.write(element + '  ' + counts[element]+'<br>');
  //document.getElementById("elemento").innerHTML +=element;
  //document.getElementById("count").innerHTML += counts[element];
} 

</script>


</body>
</html>