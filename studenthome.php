<?php

session_start();

    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='admin')
    {
        header("location:login.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Admin dashbord</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container">
    <a class="navbar-brand" href="#">Student Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto">
    <li class="nav-item active btn btn-danger">
    <a class="nav-link" href="logout.php">Logout </a>
    </li>
    
    </ul>
     
    </div>
    </div>
    </nav>
<?php
    include("student_sidebar.php");
?>
    <div class='content'>
        <h1>Sidebar Accordion</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae magnam, unde cumque cum vitae delectus placeat reiciendis aut. Tempore minus, ea quaerat quae nobis numquam beatae voluptatum esse nihil voluptatem.</p>
        <input type="text" name="" id="">
    </div>
</body>
</html>