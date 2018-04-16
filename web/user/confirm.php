<!--confirm attendance-->
<?php
session_start();
require '../admin/dbConnect.php';
$farmerID_S=$_SESSION['farmerID'];
$seminarID=$_GET['id'];

$sql2="INSERT INTO sminar_attendance(farmerID,seminarID) VALUES('$farmerID_S','$seminarID')";
mysqli_query($con,$sql2);

header('location:attending.php');
?>