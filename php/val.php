 echo count($cursos);
                  for ($i=0; $i< count($cursos); $i++){
                      echo "cursos: ",$cursos[$i][0],"<br>";
                  }

                  $estadistica=[];
                  echo count($cursos),"<br>";
                  for ($i=0; $i< count($cursos); $i++){
                   
                    //echo "entro al primer for",count($estadistica);
                    if(count($estadistica) == 0){
                      //echo "entro al if porque estadistica es igual a 0";
                      $estadistica[0][0]= $cursos[$i][0];
                      $estadistica[0][1]=1;
                      echo "se indtrodujo",$estadistica[0][0],$estadistica[0][1],"<br>";
                    }else {

                      for($j=0; $j< count($estadistica); $j++){
                        if($cursos[$i][1] == $estadistica[$j]){ //si existe en  
                          $estadistica[$j][1]= $estadistica[$j][1]+ 1;
                         // echo "entonces existe aqui";
          
                        }else{ // si no 
                          $estadistica[$j][0]= $cursos[$i][0];
                          $estadistica[$j][1]= 1;
                        }// fin del if
                      }//fin del for estadistica

                    }// fin de comparar estadisitica
                    
                    echo "x"; 
                  }//fin del for cursos




RECICLANDO CODIGO



                  for ($w=0; $w< count($cursos);){
        $temp = $cursos[$w][0];
   
        if(count($est)==0){
            $est[$w][0]=$cursos[$w][0];
            $est[$w][1]=1;
            echo "Creando", $est[$w][0],"ADD",$est[$w][1],"<br>";

        }else{

        
            for($i=0; $i<count($est);){
                echo"COMPARANDO>", $est[$i][0], "=>", $cursos[$w][0],"<br>";
                if($est[$i][0] == $cursos[$w][0]){
                    $temp_val=$est[$i][1];
                    $est[$i][1]=$temp_val + 1;
                    echo "Se Encontro y se añade > ",  $est[$i][1], "A =>", $est[$i][0],"<br>";
                
                    // si no existe

                } else {
                    for($h=0; $h<count($est);){
                        if($est[$i][0] == $cursos[$w][0]){
                            
                        }else {

                        }
                    $h++;
                    }
                }
            $i++;
              
                    $val_=$i<count($est);
                    $var_=$val_1 +1;
                $est[$var][0]=$cursos[$w][0];
                $est[$var][1]=1;
                echo "Creando", $est[$var][0],"ADD",$est[$var][1],"<br>";
                
            }
        }
    $w++;
    }