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
  <div></div>
  
  <script type="text/javascript">
    const counts ={}
    arr2 = [...estadistica];
    console.log(estadistica.length);
    arr2.forEach(function (x) { counts[x]=(counts[x] || 0) +1 });
    console.log(counts)
    
   // for (var i =0; i < .length; i++){
    //    console.log("x");
    //}
   
    //document.getElementById("demo").value=arr2; 
    //console.log(counts.lengths)
    var arr3 ={
        "marca":"motorola",
        "modelo":"jdf"
    }
    document.querySelector("div").innerHTML = JSON.stringify(arr2)
  
</script>


</body>
</html>