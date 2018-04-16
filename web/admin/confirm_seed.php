<?php
include "shout.php";
require "dbConnect.php";
$farmerID=$_GET['id'];
mysqli_query($con,"UPDATE seed SET active='1' WHERE farmerID='$farmerID'");
shout("Confirmation successful");
echo "<meta http-equiv='refresh' content='0;url=seed_applications.php'>";
?>