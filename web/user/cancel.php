<?php
    require "../admin/dbConnect.php";
    session_start();
    $seminarID=$_GET['id'];
    $farmNoS=$_SESSION['farmNo'];
    $sql="DELETE FROM sminar_attendance WHERE seminarID='$seminarID'";
    mysqli_query($con,$sql);
    header('location:attending.php');
?>