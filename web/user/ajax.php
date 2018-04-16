<?php
require "../admin/dbConnect.php";
$msgID=$_POST['msgID'];
$sql1="UPDATE message SET read_stat='1' WHERE adminMSG!='' AND msgID='$msgID'";
mysqli_query($con,$sql1);
?>