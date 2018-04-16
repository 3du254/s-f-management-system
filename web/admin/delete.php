<?php
include 'dbConnect.php';
$farmNo=$_GET['fno'];

if(isset($_GET['del'])){
	$id=$_GET['del'];
	$sql="DELETE FROM user WHERE farmerID='$id'";
	mysqli_query($con,$sql);
    $sql2="UPDATE farm_numbers SET status='0' WHERE farmNo='$farmNo'";
    mysqli_query($con,$sql2);
	echo "<meta http-equiv='refresh' content='0;url=userManagement.php'>";
}
?>