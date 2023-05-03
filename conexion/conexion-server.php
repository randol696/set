<?php 
    $localhost = "195.179.236.103"; 
    $username = "u679862942_dbsetadmin"; 
    $password = "=6QlATivcqy"; 
    $dbname = "u679862942_dbset"; 
    // crear la conexion 
    $connect = new mysqli($localhost, $username, $password, $dbname); 
    // probar la conexion 
    if($connect->connect_error) {
        die("connection failed : " . $connect->connect_error);
    } else {
        //echo "Successfully Connected";
    }
?>