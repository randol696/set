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
