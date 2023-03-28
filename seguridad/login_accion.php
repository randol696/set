<?php
	session_start();
	include('../conexion/conexion.php');
	$email=$_POST['email'];
	$password=$_POST['password'];
 //se modifica tb_usuario para colocar la tabla donde esta guardado el usuario y la contraseña
	$query=mysqli_query($connect,"select * from `tb_usuario` where correo='$email' && password='$password'");
	$numrows=mysqli_num_rows($query);
 
	if ($numrows==0){
		$_SESSION['message']="Usuario o contraseña invalida";
		header('location:../index.php');
	}
	else{
		$row=mysqli_fetch_array($query);
		$_SESSION['id']=$row['id'];
       // $_SESSION['email']=$row['email'];
        
        //session_start(); 
        $_SESSION["autentica"] = "SIP"; //verificar la session asignandole sip
        
//verifica el roll de usuario y redirecciona a la pagina q corresponde
   switch ($row['roll_id']) {
    case 1:
        session_start(); 
        $_SESSION["autentica"] = "SIP";
        header('location:../modulo_admin/dashboard.php'); //al confirmar se redirecciona la pagina de usuario cliente
        break;
    case 2:
        session_start(); 
        $_SESSION["autentica"] = "SIP";
        header('location:../modulo_usuario/dashboard.php'); //al confirmar se redirecciona la pagina accesada
        break;
     case 3:
        session_start(); 
        $_SESSION["autentica"] = "SIP";
        header('location:../usuario_administrador/admin_dashboard.php'); //al confirmar se redirecciona la pagina accesada

        break;                
}
    
	}
?>