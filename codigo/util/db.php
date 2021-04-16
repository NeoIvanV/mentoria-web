<?php
$dbname = "registro";
$dbuser = "registro-user";
$dbpassword = "admin123";

try{
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $db = new PDO($dsn,$dbuser,$dbpassword);
} catch(PDOException $e){
     echo $e->getMessage();
}
