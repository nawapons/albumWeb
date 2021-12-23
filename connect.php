<?php 
    $HOST = "localhost";
    $DBNAME = "dbalbum";
    $USER = "root";
    $PASS = "";

    try{
        $conn = new PDO("mysql:host=$HOST;dbname=$DBNAME",$USER,$PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        die(print_r($e->getMessage()));
    }
?>