<?php
     
   $host = 'servidor-mysql-2021.mysql.database.azure.com';
    $username = 'user2020@servidor-mysql-2021';
    $password = 'Intecap2020.';
    $db_name = 'bd_empleados';
 
    //$host = '23.96.2.15';
   // $username = 'user20';
    //$password = '2020';
   // $db_name = 'bd_politica';


/* $host = '127.0.0.1:3307';
 $db_name='bd_empleados';
 $username = 'root';
 $password = "";*/
//include_once("connection.php");


    //variable conexion se utilizara en la otra clase
    $conexion = mysqli_init();
    
    mysqli_real_connect($conexion, $host, $username, $password, $db_name);
    if (mysqli_connect_errno($conexion)) {
        die('Failed to connect to MySQL: '.mysqli_connect_error());
    }
?>