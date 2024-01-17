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
    include_once('config.php');

    if(isset($_POST['add_teacher']))
    {
        $t_name=$_POST['name'];
        $t_description=$_POST['description'];
        $file=$_FILES['image']['name'];  
        $dst="./images/".$file;
        $dst_db="images/".$file;

        move_uploaded_file($_FILES['image']['tmp_name'],$dst);

        $sql="INSERT INTO teacher (name,description,image) VALUES('$t_name','$t_description','$dst_db')";

        $result=mysqli_query($data,$sql);

        if($result)
        {
            header('location:admin_add_teacher.php');
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
        <h1>Add Teacher</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text"
                class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <input type="text"
                class="form-control" name="description" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Image</label>
              <input type="file"
                class="form-control" name="image" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="">
              <input type="submit"
                class="mt-2 btn btn-primary" name="add_teacher" id="" aria-describedby="helpId" placeholder="" value="Add Teacher">
            </div>
        </form>
    </div>
</body>
</html>