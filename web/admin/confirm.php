<!--select all new on new_user table codes-->
<?php
	require 'dbConnect.php';
	$id=$_GET['id'];

	$sql="UPDATE user SET confirmation='1' WHERE farmerID='$id'";
	mysqli_query($con,$sql);
    header('location:new_user.php?page');
?>