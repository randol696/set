<?php
    //include('../seguridad/seguridad.php'); como el usuario no esta logueado
	include('conexion/conexion.php');
	//$userid=$_SESSION['id'];
	//$userq=mysqli_query($connect,"select * from `tb_usuario` where idusuario='$userid'");
	//$userrow=mysqli_fetch_array($userq);
?>

<?php             
if (isset($_GET['idCursos'])) {
    $idCursos = $_GET['idCursos'];  
    $sql = " SELECT * FROM tb_cursos where id = $idCursos ";    
        $result = $connect->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {
                    echo "<tr>
                        <td><img src='img/".$row['foto']." 'style='width:20%'><br></td>
                        <td>Curso : ".$row['nombre']."<br></td>
                        <td>Codigo del Curso : ".$row['codigo']."<br></td>
                        <td>Total de Horas : ".$row['horas']. "<br></td>
                        <td>Estatus del curso: ".$row['activo']."<br></td>
                        <td><br>
                           <!-- <a href='ver.php?id=".$row['id_calendario']."'><button type='button'>Editar</button></a> -->
                           <!-- <a href='admin_cambiar_status.php?status=".$row['id_calendario']."'><button type='button'>Cambiar Status Manual</button></a> --> 
                           <!-- <a href='cancelar_cita.php?id=".$row['id_calendario']."'><button type='button'>Cancelar Cita</button></a> -->
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'><center>Error el curso no existe</center></td></tr>";
            }
     }?>