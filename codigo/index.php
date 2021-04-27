<?php
require "util/db.php";
//cargar pagina
$db = connectDB();
//print_r($_POST);
//print_r($_GET);
$idregistro = $_GET['id'];
print_r($idregistro);
if (isset($_POST["eliminar"])) {
  
 echo"paso por aqui";
    $sql = "DELETE 
    FROM users where id= :id";

    //statement
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $message = "Se procedio a Eliminar";

   // users = $stmt->fetch();
}

$valido = null;
$db = connectDB();
$sql = "SELECT * FROM users";
//statement
$stmt = $db->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <title>List of User</title>
   
  </head>
  <body class="d-flex flex-column h-100">    
    <div class="container pt-4 pb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <a class="navbar-brand" href="#">HTML CRUD Template</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.html">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://pisyek.com/contact">Help</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form>  
            </div>
        </nav>
    </div>
   <!-- <form class="form-inline my-2 my-md-0" method="POST" action="index.php">       -->
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1>List of User</h1>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Nombre de Usuario</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user):?> 
                    <tr>
                       <td><?= $user['id']?></td>
                       <td><?= $user['full_name']?></td>
                       <td><?= $user['user_name']?></td>
                       <td><?= $user['email'] ?? 'Sin correo' ?></td>
                    <!-- <form class="form-inline my-2 my-md-0" method="POST" action="index.php">      -->
                    <td> 
                        <a href="view.php?id=<?=$user['id']?>"><button class="btn btn-primary btn-sm">View</button></a>
                        <a href="edit.php?id=<?=$user['id']?>"><button class="btn btn-primary btn-sm">Modificar</button></a>    
                        </td>
                        <td>        
                     <form method="POST" action="index.php">                         
                       <input type="hidden" name="eliminar" value=<?=$users['id']?>>
                       <button class="btn btn-danger">Eliminar Registro</button>
                    </form>
                    </td>
               <?php endforeach;?>        
               </tr>
                </tbody>
            </table>
        </div>
    </main>
<!-- </form> -->
    <footer class="footer mt-auto py-3">
        <div class="container pb-5">
            <hr>
            <span class="text-muted">
                    Copyright &copy; 2021 | <a href="https://pisyek.com">Pisyek.com</a>
            </span>
        </div>
    </footer>

    
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>