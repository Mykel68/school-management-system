<?php
session_start();

require_once('config.php');

if(isset($_GET['student_id']))
{
    $user_id = $_GET['student_id'];
    $sql = "DELETE FROM `user` WHERE id = '$user_id' ";
    $result = mysqli_query($data,$sql);
    if($result)
    {
        $_SESSION['message'] = "Student Record deleted successfully";
        header('location: view_student.php');
    }
}


?>