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
/*
//insert
//preparar consulta
$sql = "INSERT into users
       (full_name, email, user_name, password)
values
   (:full_name, :email, :user_name, :password)";

   //statement

   $stmt = $db->prepare($sql);

  $full_name ='Ivan Vejar';
  $email='ivan.vejar@segic.usach.cl'; 
  $user_name='ivan.vejar';
  $password='ivan123';

  $stmt->bindParam(':full_name', $full_name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':user_name', $user_name);
  $stmt->bindParam(':password', $password);

  $stmt->execute();
  */

  //Delete
  $id = 2;
  $stmt = $db->prepare("DELETE FROM users WHERE id=:id");
  $stmt->bindParam(':id', $id);
  $stmt->execute(); 


