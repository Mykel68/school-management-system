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
    $sql="SELECT * FROM teacher";
    $result=mysqli_query($data,$sql);

    if($_GET['teacher_id'])
    {
        $t_id=$_GET['teacher_id']; 
        $sql2="DELETE FROM teacher WHERE id='$t_id' ";
        $result2=mysqli_query($data,$sql2);

        if($result2)
        {
            header('location:view_teacher.php'); 
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
        <h1>All Teacher's Data</h1>

    <table class="table border">
        <tr>
            <td>Name</td>
            <td>Description</td>
            <td>Image</td>
            <td>Delete</td>
            <td>Update</td>
        </tr>
        <?php

        while($info=$result->fetch_assoc())
        {

        ?>
        <tr>
            <td>
                <?php
                    echo "{$info['name']}"
                ?>
            </td>
            <td>
                <?php
                    echo "{$info['description']}"
                ?>
            </td>
            <td>
                <img 
                src="
                <?php
                    echo "{$info['image']}"
                ?>"
                alt="" style="height:100px;width:100px;">
            </td>
            <td>
                <?php
                echo "
                <a onclick=\"javascript:return confirm('Are you Sure To Delete This')\"; href='view_teacher.php?teacher_id={$info['id']}' class='btn btn-danger'> Delete </a>";
                ?>
            </td>
            <td>
                <?php
                echo "
                <a href='update_teacher.php?teacher_id={$info['id']}' class='btn btn-primary'>Update</a>";
                ?>
            </td>
            
        </tr>

        <?php
        }
        ?>
    </table>
    </div>
</body>
</html>