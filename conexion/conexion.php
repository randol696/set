<?php 
    $localhost = "127.0.0.1:8889"; 
    $username = "root"; 
    $password = "root"; 
    $dbname = "db_set"; 
    // crear la conexion 
    $connect = new mysqli($localhost, $username, $password, $dbname); 
    // probar la conexion 
    if($connect->connect_error) {
        die("connection failed : " . $connect->connect_error);
    } else {
        //echo "Successfully Connected";
    }
?>