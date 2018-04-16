<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
<link href="css/css/font-awesome.css" rel="stylesheet" />
<script src="js/jquery-1.8.0.min.js"></script>
<script src="css/common.js"></script>
<title></title>
<style>
a{
	text-decoration:none;
	background-color:#80FF80#80FF80;
	border:solid 1px #80FF80#80FF80;
}

input{
	display:block;
}
input[type=text],[type=password]{
	width:40%;
	height:30px;
	padding-left:5px;
	margin-bottom:5px;
	border:solid 1px #ccc;
	border-radius:4px;
}
input[type=submit]{
	width:40%;
	height:31px;
	border-radius:4px;
	border:solid 1px #9CE79E;
	background:#0C6;
	font-size:14px;
	color:#fff;
}
table{
	width:96%;
	margin:15px auto auto auto;
	border:solid 1.5px #F2F2F2;
	border-radius:3px;
	padding:15px;
	
	
}
#td1{
	width:10%;
}
</style>
</head>
<body>
 
<?php include "common_menu.php";?>

 <div id="wrapperR">
 	<div id="innerHeader">
    	<h2>User Management</h2>
    </div>
 	
<?php

include 'dbConnect.php';
if(isset($_GET['edit'])){
	$id=$_GET['edit'];
	$sql="SELECT * FROM user WHERE farmerID='$id'";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($res);
}
	if(isset($_POST['submit'])){
		$firstName=$_POST['firstName'];
		$secondName=$_POST['secondName'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$address=$_POST['address'];
		
		$sql1="UPDATE user SET firstName='$firstName',secondName='$secondName',username='$username',password='$password',Location='$address' WHERE farmerID='$id'";
		$res=mysqli_query($con,$sql1);
		echo "<meta http-equiv='refresh' content='0;url=userManagement.php?page'>";
	}
?>	
	<div id="innerTitle">
	<h3>Edit User</h3>
	</div>
	<div id="innerWrapper">
		<form method="post">
        	<table>
                <tr> <td id="td1">First Name</td> <td><input type="text" name="firstName" value="<?php echo "$row[1]";  ?>"required /></td> </tr>
                <tr> <td id="td1">Second Name</td> <td><input type="text" name="secondName" value="<?php echo "$row[2]"; ?>" required/></td> </tr>
                <tr> <td id="td1">Username</td> <td><input type="text" name="username" value="<?php echo "$row[3]"; ?>" required/></td> </tr>
                <tr> <td id="td1">Password</td> <td><input type="password" name="password" value="<?php echo "$row[4]"; ?>" required/></td> </tr>
                <tr> <td id="td1">Address</td> <td><input type="text" name="address" value="<?php echo "$row[5]"; ?>" required/></td> </tr>
			<tr> <td></td><td><input type="submit" name="submit" value="update" /></td></tr>
			</table>
		</form>
		
	</table>
	
	</div>
