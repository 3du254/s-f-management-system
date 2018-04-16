<?php
include "shout.php";
require "dbConnect.php";
$farmerID=$_GET['id'];
mysqli_query($con,"UPDATE seed SET cancel='1' WHERE farmerID='$farmerID'");
shout("Cancel successful");
echo "<meta http-equiv='refresh' content='0;url=seed_applications.php'>";
?>