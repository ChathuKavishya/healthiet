<?php

     $serverName = "healthiet.mysql.database.azure.com";
     $dBUserName = "healthiet@healthiet";
     $dBPassword = "Sltc_123";
     $dBName = "mysqldb";

    

    $conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName );

    if (!$conn){
        die("connection failed: ". mysqli_connect_error());
        
    }
?>