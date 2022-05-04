<?php 
    $host = 'db';
    $dbname = 'gym'; // database name loginapp or 7
    $dbuser = 'root'; //db username
    $dbpassword = 'lionPass'; // db pass
    $port = '8005'; //8064

    //Two ways 1. PDO and 2.MySQLI

    $connection = new mysqli($host, $dbuser, $dbpassword, $dbname);

    if($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
     }

    // else{
    //     echo "Connected to MySQL server success";
    // }

    ?>