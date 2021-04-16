<?php
$dbname = "registro";
$dbuser = "registro-user";
$dbpassword = "admin123";

try{
    $dsn = "mysql:host=localhost;dbname=$dbname";
    return new PDO($dsn,$dbuser,$dbpassword);
} catch(PDOException $e){
     echo $e->getMessage();
}
