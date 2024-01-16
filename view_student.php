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

    $host="localhost";
    $user="root";
    $password="";
    $db="school";

    $data=mysqli_connect($host,$user,$password,$db);
    $sql="SELECT * from user WHERE usertype='student'";
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
    <title>Admin dashbord</title>
</head>
<body>
<?php
    include 'admin_sidebar.php'
?>
    <div class='content'>
        <h1>Student Data</h1>

        <?php
        if(isset($_SESSION['message']))
        {
            echo "<h5>{$_SESSION['message']}</h5>";
        }
        unset($_SESSION['message']);
        ?>

        <table class="table border">
        <tr>
            <th class='table_td'>Username</th>
            <th class='table_td'>Email</th>
            <th class='table_td'>Phone</th>
            <th class='table_td'>Password</th>
            <th class='table_td'> Delete</th>
            <th class='table_td'>Update</th>
        </tr>

        <?php
        while($info=$result->fetch_assoc())
        {
        ?>
        <tr>
        <td class='table_td'><?php echo  "{$info['username']}" ?></td>
        <td class='table_td'><?php echo  "{$info['email']}" ?></td>
        <td class='table_td'><?php echo  "{$info['phone']}" ?></td>
        <td class='table_td'><?php echo  "{$info['password']}" ?></td>
        <td class='table_td'>
            <?php echo  "<a class='btn btn-danger' onclick='return confirm(\"Are you sure to delete this?\")' href='delete.php?student_id={$info['id']}'>Delete</a>"
            ?></td> 

            <td class='table_td'><?php echo  "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'>Update</a>" ?></td>
        </tr>
        <?php
        }
        ?>

        </table>
    </div>

</body>
</html>