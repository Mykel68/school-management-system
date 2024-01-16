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
    include_once('config.php');
    $data=mysqli_connect($host,$user,$password,$db);

    $name=$_SESSION['username'];
    $sql="SELECT * FROM user WHERE username='$name' ";
    $result = mysqli_query($data, $sql);
    $info=mysqli_fetch_assoc($result);

    if(isset($_POST['update_profile']))
    {
        $email = mysqli_real_escape_string($data, $_POST['email']);
        $phone = mysqli_real_escape_string($data, $_POST['phone']);
        $password = mysqli_real_escape_string($data, $_POST['password']);
    

        $sql2="UPDATE user SET email='$email', phone='$phone', password='$password' WHERE username='$name' ";

        $result2 = mysqli_query($data, $sql2);

        if($result2)
        {
            header("location:student_profile.php");
        }
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
    <h1>Student Profile</h1>
    <p>Username: <?php echo $info['username']; ?></p>
    <form action="" method="POST">
        <div class="form-group">
          <label for="">Name</label>
          <input type="text"
            class="form-control" name="" id="" aria-describedby="helpId" placeholder=""
            value="<?php echo "{$info['username']}"; ?>">
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="email"
            class="form-control" name="" id="" aria-describedby="helpId" placeholder=""
            value="<?php echo "{$info['email']}"; ?>">
        </div>
        <div class="form-group">
          <label for="">Phone</label>
          <input type="number"
            class="form-control" name="" id="" aria-describedby="helpId" placeholder=""
            value="<?php echo "{$info['phone']}"; ?>">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="text"
            class="form-control" name="" id="" aria-describedby="helpId" placeholder=""
            value="<?php echo "{$info['password']}"; ?>">
        </div>
        <div class="mt-2">
          <input type="submit"
            class="btn btn-primary" name="update_profile" id="" aria-describedby="helpId" placeholder="" 
            value="Update Profile">
        </div>
    </form>
    </div>
</body>
</html>