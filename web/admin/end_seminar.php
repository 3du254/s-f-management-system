<?php
require 'dbConnect.php';
$id=$_GET['id'];

$sql="UPDATE seminar SET status='1' WHERE seminarID='$id'";
mysqli_query($con,$sql);
header('location:seminar.php?page');
?>