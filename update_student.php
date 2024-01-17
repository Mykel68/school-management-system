<?php

session_start();


$host="localhost";
$user="root";
$password="";
$db="school";

$data=mysqli_connect($host,$user,$password,$db);

    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='student')
    {
        header("location:login.php");
    }


    $id=$_GET['student_id'];
    $sql="SELECT * FROM user WHERE id='$id' ";
    $result = mysqli_query($data, $sql);

    $info=$result->fetch_assoc();

    if(isset($_POST['update']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];

        $query="UPDATE user SET username='$name', email='$email', phone='$phone', password='$password' WHERE id='$id' ";

        $result2=mysqli_query($data, $query);

        if($result2)
        {   
            header("location: view_student.php");
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
    <title>Student Update Page</title>
</head>
<body>
<?php
    include 'admin_sidebar.php'
?>
    <div class='content'>
        <h1>Update Student</h1>

        <form action="#" method="POST">
            <div class="form-group">
              <label for="">Username</label>
              <input type="text"
                class="form-control" name="name" id="" aria-describedby="helpId" placeholder=""
                value="<?php echo "{$info['username']}"; ?>">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email"
                class="form-control" name="email" id="" aria-describedby="helpId" placeholder=""
                value="<?php echo "{$info['email']}"; ?>">
            </div>
            <div class="form-group">
              <label for="">Phone</label>
              <input type="number"
                class="form-control" name="phone" id="" aria-describedby="helpId" placeholder=""
                value="<?php echo "{$info['phone']}"; ?>">
            </div>
            <div class="form-group">
              <label for="">password</label>
              <input type="password"
                class="form-control" name="password" id="" aria-describedby="helpId" placeholder=""
                value="<?php echo "{$info['password']}"; ?>">
            </div>
         
            <input type="submit" value="update" class='mt-2 btn btn-success' name='update'>
        </form>
    </div>
</body>
</html>