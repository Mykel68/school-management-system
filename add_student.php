<?php

session_start();

    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='student')
    {
        header("location:login.php");
    }

    $host="localhost";
    $user="root";
    $password="";
    $db="school";

    $data=mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['add_student']))
    {
        $username=$_POST['name'];
        $user_email=$_POST['email'];
        $user_phone=$_POST['phone'];
        $user_password=$_POST['password'];
        $usertype='student';

        $check = "SELECT * FROM user WHERE username = '$username'";

        $check_user=mysqli_query($data,$check);

        $row_count=mysqli_num_rows($check_user);

        if($row_count==1)
        {
            echo "<script type='text/javascript'>
                alert('username Already exist. Try another one');
                </script>";
        }
        else
        {

            $sql="INSERT INTO user(username,email,phone,usertype,password) VALUES ('$username','$user_email','$user_phone','$usertype','$user_password')";

            $result=mysqli_query($data,$sql);

            if($result)
            {
                echo "<script type='text/javascript'>
                alert('Data Upload Success');
                </script>";
            }
            else {
                echo "data failed";
            }
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
<?php
    include 'admin_sidebar.php'
?>
    <div class='content'>
        <h1>Add Student</h1>

        <form action="" method="POST">
            <div class="form-group">
              <label for="">Username</label>
              <input type="text"
                class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email"
                class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Phone</label>
              <input type="text"
                class="form-control" name="phone" id="" aria-describedby="helpId" placeholder="" type="number">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="text"
                class="form-control" name="password" id="" aria-describedby="helpId" placeholder="" type="password">
            </div>
            <div class="form-group mt-2">
              <input type="submit"
                class="btn btn-primary " name="add_student" id="" aria-describedby="helpId" placeholder="" value="Add Student">
            </div>
        </form>
    </div>
</body>
</html>