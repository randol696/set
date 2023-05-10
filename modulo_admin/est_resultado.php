<?php
include('../conexion/conexion.php');
?>
<!doctype html>
<html>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://cdn.plot.ly/plotly-latest.min.js"></script> 
  
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <!-- Libreria de la ultima grafica --> 
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link rel="stylesheet" href="../css/est_resultado.css">
    <head>
    <title>Mis Cursos - Sistema de Estimacion de Tendnecias / Inadeh / Modulo Administrador</title>
    </head>
    <body>
    <script type="text/javascript">
        var estadisticaCurso = [];
        var estadisticaCantidad = [];
    </script>

<div class='barra_busqueda'>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
         <select class="select" name="cursoBuscar" id="busqueda">
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
        <button type="submit" class="btn" name="submit" >Buscar Tendencia</button>
    </form>
    </div>
<script>

</script>
    <?php
    if(isset($_POST["submit"]))
    {   $cursoBuscar=$_POST["cursoBuscar"];
    
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
<div class="valores">
    <h4>Ultimo Valor:</h4><div id="ultimoValor"></div>
    <h4>Maximo historico de usuarios:</h4><a><div id="max"></div></a>
    <h4>Minimo historico de usuarios:</h4><a><div id="min"></div></a>
    <h4>Resultado Estadistico:</h4><div id="resultEstadistica"></div>
   
</div>

    <div class="lidetalle" id="listax"></div>

<div class="grafica">
    <div id="myPlot" style="width:100%;max-width:700px"></div>
</div>


<script type="text/javascript">
    var num =[];
    for (let i=0; i < estadisticaCurso.length; i++){ 
        num.push(i);
        //console.log(num)
    }
 // ver el ultimo elemento 
    
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


<script type="text/javascript">
    var ultimoValor = " ";
    ultimoValor = estadisticaCantidad[estadisticaCantidad.length - 1];
    document.getElementById("ultimoValor").innerHTML+= ultimoValor; 

    var max 
    max = Math.max(...estadisticaCantidad);
    document.getElementById("max").innerHTML+= max; 

    var min 
    min = Math.min(...estadisticaCantidad);
    document.getElementById("min").innerHTML+= min; 

var text ="";
    var aum=0, dism=0, igual = 0;
    for (let x=0; x < estadisticaCurso.length; x++){ 
     //console.log("estamos en la posicion",[x],"evaluando:",estadisticaCantidad[x])
            if (parseInt(estadisticaCantidad[x])> parseInt(estadisticaCantidad[x-1])){
            aum ++;
            //document.write("Durante el periodo Num. : "+[x]+" El numero de participantes Aumento a: "+ estadisticaCantidad[x] + ", en comparación al valor periodo anterior de " + estadisticaCantidad[x-1] + "<br>");
               // text +="en Aumento"+ estadisticaCantidad[x] + "en comparacion al valor anterior de" + estadisticaCantidad[x-1] + "<br>";
            }else{
                if(parseInt(estadisticaCantidad[x]) < parseInt(estadisticaCantidad[x-1])){
                    dism ++;
                    //console.log("en disminucion",estadisticaCantidad[x],"en comparacion al valor anterior de",estadisticaCantidad[x-1])
               //     document.write("Durante el periodo Num. : "+[x]+" El numero de participantes disminuyo a: "+ estadisticaCantidad[x] + ", en comparación al valor periodo anterior de " + estadisticaCantidad[x-1] + "<br>");
                
                    }else{
                    if(parseInt(estadisticaCantidad[x])=== parseInt(estadisticaCantidad[x-1])){
                        igual ++;
                       // console.log("se mantiene igual",estadisticaCantidad[x],"en comparacion al valor anterior de",estadisticaCantidad[x-1])
                     //   document.write("Durante el periodo Num. : "+[x]+" El numero de participantes se mantiene de: "+ estadisticaCantidad[x] + ", en comparación al valor periodo anterior de " + estadisticaCantidad[x-1] + "<br>");
                        

                    }
                }
            }
            
            //document.getElementById("lista").innerHTML += text; 
            
    }

    if ((aum > dism)&&(aum > igual)){
        console.log("El curso tiene como tendencia promedio al alza")
        text="El curso tiene como tendencia promedio al alza";
    }
    if ((dism > aum)&&(dism > igual)){
        console.log("El curso tiene como tendencia promedio a la baja")
        text="El curso tiene como tendencia promedio a la baja";
    }
    if ((igual > dism)&&(igual > aum)){
        console.log("la tendencia de curso se promedio mantiene ")
        text="la tendencia de curso se promedio mantiene";
    }
    
    document.getElementById("resultEstadistica").innerHTML += text; 
    

</script>


    </body>
    </html>