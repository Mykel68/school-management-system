<?php

session_start();
error_reporting(0);
    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='student')
    {
        header("location:login.php");
    }

    require_once('config.php');

    if($_GET['teacher_id'])
    {
        $t_id=$_GET['teacher_id'];
        $sql="SELECT * FROM teacher WHERE id='$t_id' ";
        $result = mysqli_query($data, $sql);
        $info=$result->fetch_assoc(); 
    
    }
    if(isset($_POST['update_teacher']))
    {
        $id=$_POST['id'];
        $t_name=$_POST['name'];
        $t_des=$_POST['description'];
        $file=$_FILES['image']['name'];
        $dst="./images/".$file;
        $dst_db="images/".$file;

        move_uploaded_file($_FILES['image']['tmp_name'],$dst);

        if($file)
        {
            
        $sql2="UPDATE teacher SET name='$t_name', description='$t_des',image='$dst_db' WHERE id='$id' ";
        }
        else
        {
            $sql2="UPDATE teacher SET name='$t_name', description='$t_des',WHERE id='$id' ";
        }


        $result2=mysqli_query($data,$sql2);

        if($result2)
        {
            header('location: view_teacher.php');
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
        <h1>Update Teacher</h1>
        <form action="update_teacher.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id"  value="<?php echo "{$info['id']}"; ?>" >

            <div class="form-group">
              <label for="">Teacher Name</label>
              <input type="text"
                class="form-control" name="name" id="" aria-describedby="helpId" placeholder=""
                value="<?php echo "{$info['name']}"; ?>">
            </div>
            
            <div class="form-group">
                <label for="my-textarea">About Teacher</label>
                <textarea id="my-textarea" class="form-control" name="description" rows="3">
                <?php echo "{$info['description']}"; ?>
                </textarea>
            </div>
            <div class="form-group">
              <label for="">Teacher old Image</label> <br>
              <img src="<?php echo "{$info['image']}" ?>" alt="" style="height:200px;width:200px;">
            </div>
            <div class="form-group">
              <label for="">Teacher New Image</label>
              <input type="file"
                class="form-control" name="image" id="" aria-describedby="helpId" placeholder=""
                value="<?php echo "{$info['image']}"; ?>">
            </div>
         
            <input type="submit" value="update" class='mt-2 btn btn-success' name='update_teacher'>
        </form>
    </div>
</body>
</html>