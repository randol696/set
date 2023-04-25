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
<style>
h3{
   padding-left: 40%;
}
table{
    width: 100%;
}
th{
    background-color: blanchedalmond;
}
table, th, td {  
    border: 1px solid black;  
    border-collapse: collapse;  
}  
th, td {  
    padding: 10px;  
}  
table#alter tr:nth-child(even) {  
    background-color: #eee;  
}  
table#alter tr:nth-child(odd) {  
    background-color: #fff;  
}  
table#alter th {  
    color: white;  
    background-color: gray;  
}

</style>
<h3>Listado de Cursos</h3>
<table >
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Activo</th>
            </tr>

            <?php
            $sql1 = "SELECT * FROM tb_cursos ";
            $result1 = $connect->query($sql1);
            if($result1->num_rows > 0) {
                while($row = $result1->fetch_assoc()) 
                {
                echo "
                    <tr>
                        <td>".$row['codigo']."</td>
                        <td>".$row['nombre']."</td>
                        <td>".$row['horas']."</td>
                        <td>".$row['activo']."</td>
                    </tr>"  ;
                  }


                  }else {
                    $searchErr = "Ningun resultado";
                  }
            
               
        
    ?>