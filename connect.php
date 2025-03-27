<?php

    $servername = "db";
    $username = "user";
    $password = "password";

    try{
        $connect = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);
        echo "verbinding is gemaakt.";
    }
    catch (PDOException $e){
        echo $e->getMessage();
        die("Sorry, Database probleem");
    }

?>