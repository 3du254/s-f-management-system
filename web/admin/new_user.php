<?php
require 'dbConnect.php';
$sql="SELECT * FROM user WHERE confirmation='0'";
$result=mysqli_query($con,$sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/common.css" />
<link href="css/css/font-awesome.css" rel="stylesheet" />
<script src="js/jquery-1.8.0.min.js"></script>
<script src="css/common.js"></script>
<title>Untitled Document</title>
</head>
<style>
    #content td{
        border-top: 1px #CCC solid;
        padding: 10px 15px;
        font-size: 14px;
    }
    #content th{
        border-bottom: 1px #CCC solid; 
        padding: 10px 15px;
        font-size: 14px;
        color: #666;
        text-align: left;
        
    }
</style>

<body>

<?php include "common_menu.php";?>
 
    <div id="wrapperR" style="background-color:#c4ccd3">

    	<div id="content" style="margin:25px auto auto auto; width:95%;background-color:#fff;padding:15px 0 15px 0;">
            <?php if(mysqli_num_rows($result)<1){}else{echo "<h3 style='margin:0px auto 0 60px;'>New user</h3>"; }?>
			<?php
                
                if(mysqli_num_rows($result)<1){
                    echo "<i style='color:#159d32;margin:20px auto 0 60px;'><strong>INFO!! </strong>No new user</i>";}else{
                    echo "<table style='margin:auto;border-collapse: collapse'>";
                    echo "<tr> <th>ID</th> <th>First Name</th> <th>Second Name</th> <th>Username</th> <th>mobile number</th> <th>Date of registration</th> <th>Location</th> <th>national ID</th> <th>action(confirm)</th></tr>";
                            while($row=mysqli_fetch_array($result)){
                                echo "<tr> <td>".$row['farmerID']."</td> <td>".$row['firstName']."</td> <td>".$row['secondName']."</td> <td>".$row['username']."</td> <td>".$row['mobileNo']."</td> <td>".$row['doR']."</td><td>".$row['Location']."</td> <td>".$row['nationalID']."</td> <td><a href='confirm.php?id=$row[farmerID]' style='text-decoration:none;border:none;background-color:#03729a;color:#fff;padding:5px 10px;border-radius:3px;font-size:14px;'>confirm</a></td> </tr>";
                            }
                            echo "</table>";
                        }
            ?>
        </div>
</div>
</body>
</html>