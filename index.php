<?php

    error_reporting(0);
    session_start();
    session_destroy();

    if($_SESSION['message'])
    {
        $message=$_SESSION['message'];
        echo "<script type='text/javascript'>
        alert('$message')
        </script>";
    }
    
    require_once('config.php');
    $sql="SELECT * FROM teacher";
    $result=mysqli_query($data,$sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Student Management System</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">
    <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto">
    <li class="nav-item active">
    <a class="nav-link" href="#">Home </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#">Contact</a>
    </li>
    
    <li class="nav-item">
    <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Admission</a>
    </li>
    <li class="nav-item">
    <a class="nav-link btn btn-success " href="login.php" tabindex="-1" aria-disabled="true" >Login</a>
    </li>
    </ul>
    
    </div>
    </div>
    </nav>
    
    <div class="section1">
        <label for="" class="img_text">We teach with care</label>
        <img src="images/banner1.jpg" class='main_img' alt="">
    </div>

    <!-- <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="images/banner.jpg" alt="">
            </div>
            <div class="col-md-6">
                <h1>Welcome to school</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, mollitia, similique perspiciatis est facilis ullam quam repudiandae odit non officia vero minus officiis itaque sint nisi delectus possimus cum atque quae necessitatibus. Omnis corporis, ullam laborum quaerat ipsum, quasi blanditiis cumque tempore optio ad consequatur maiores exercitationem a illo nesciunt!</p>
            </div>
        </div>
    </div> -->

    <div class="container">
        <div class="row">
            <?php

            while($info=$result->fetch_assoc())
            {
            ?>

            <div class="col-sm-4">
                <img src="<?php echo "{$info['image']}" ?>" alt="" style="height:200px;width:200px;">
                <h3><?php echo "{$info['name']}" ?></h3>

                <h5><?php echo "{$info['description']}" ?></h5>
            </div>

            <?php
            }
            ?>
        </div>
    </div>

    <div class="container mt-5">
        <form action="data_check.php" method="POST">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text"
                class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="text"
                class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Phone</label>
              <input type="text"
                class="form-control" name="phone" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
                <label for="my-textarea">Message</label>
                <textarea id="my-textarea" class="form-control" name="message" rows="3"></textarea>
            </div>
            <input type="submit" value="Apply" class='btn btn-primary' name='apply'>
        </form>
    </div>
    

</body>
</html>