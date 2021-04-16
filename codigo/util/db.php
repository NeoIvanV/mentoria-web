<?php

function connectDB(){

    $db_name = "registro";
    $db_user = "registro-user";
    $db_pass = "admin123";

    try  { 
        $dsn = "mysql:host=localhost;dbname=$db_name";
        $db = new PDO($dsn, $db_pass, $db_user);
        return $db;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
//ss