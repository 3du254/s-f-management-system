<!--farmer log in codes-->
<?php
session_start();
include 'dbConnect.php';
if(isset($_POST['login_farmer'])){
	
$username=$_POST['username'];
$password=$_POST['password'];
$sql ="SELECT * FROM user WHERE username='$username' AND password='$password'";
$result =mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$id=$row[0];
$fname=$row[1];
$sname=$row[2];
$farmNo=$row[5];
$username_S=$row['username'];
if(mysqli_num_rows($result)>0){
    if($row['confirmation']==1){
        header('location:../user/home.php'); 
        $_SESSION['farmerID']=$id;
        $_SESSION['f_fname']=$fname;
        $_SESSION['f_sname']=$sname;
    }else{
        header('location:../temporary/temp_home.php'); 
        $_SESSION['farmerID']=$id;
        $_SESSION['f_fname']=$fname;
        $_SESSION['f_sname']=$sname;
        $_SESSION['username']=$username_S;
    }
		
}
else{
	echo "<div id='loginError_bg' class='btnErrorClose'>";
	echo "<div class='loginError'>";
	echo "<h5>Login Error!</h5>
			<p>invalid details</p>";
	echo "<i class='fa fa-warning'></i>";
	echo "<button class='btnErrorClose'>Dismiss</button>";
	echo "</div>";
	echo "</div>";
}}
if(isset($_GET['logout'])){
	session_unregister('username');	
}
?>

<!--inspector login codes-->
<?php
if(isset($_POST['login_inspector'])){

    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql1 ="SELECT * FROM employee WHERE username='$username' AND password='$password'";
    $result1 =mysqli_query($con,$sql1);
    $row1=mysqli_fetch_array($result1);
    $employeeID=$row1[0];
    $i_fname=$row1[1];
    $i_sname=$row1[2];
    if(mysqli_num_rows($result1)>0){
        header('location:../employee/home_employee.php'); 
        $_SESSION['employeeID']=$employeeID;
        $_SESSION['i_fname']=$i_fname;
        $_SESSION['i_sname']=$i_sname;

    }
    else{
        echo "<div id='loginError_bg' class='btnErrorClose'>";
        echo "<div class='loginError'>";
        echo "<h5>Login Error!</h5>
			<p>invalid details</p>";
        echo "<i class='fa fa-warning'></i>";
        echo "<button class='btnErrorClose'>Dismiss</button>";
        echo "</div>";
        echo "</div>";
    }}
if(isset($_GET['logout'])){
    session_unregister('username');	
}
?>

<!--admin login codes-->
<?php
    require "dbConnect.php";
if(isset($_POST['login_admin'])){

    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql2 ="SELECT * FROM admin WHERE adminUsername='$username' AND password='$password'";
    $result2 =mysqli_query($con,$sql2);
    $row2=mysqli_fetch_array($result2);
    $adminID=$row2[0];
    $a_fname=$row2[1];
    $a_sname=$row2[2];
    $a_username=$row2[3];
    if(mysqli_num_rows($result2)>0){
        header('location:index.php'); 
        $_SESSION['adminID']=$adminID;
        $_SESSION['a_fname']=$a_fname;
        $_SESSION['a_sname']=$a_sname;

    }
    else{
        echo "<div id='loginError_bg' class='btnErrorClose'>";
        echo "<div class='loginError'>";
        echo "<h5>Login Error!</h5>
			<p>invalid details</p>";
        echo "<i class='fa fa-warning'></i>";
        echo "<button class='btnErrorClose'>Dismiss</button>";
        echo "</div>";
        echo "</div>";
    }}
if(isset($_GET['logout'])){
    session_unregister('username');	
}
?>

<!--farmer registration-->
<?php
            include 'dbConnect.php';
			$alert="";
            
            if(isset($_POST['register'])){
				$firstName=$_POST['firstName'];
				$secondName=$_POST['secondName'];
				$username=$_POST['username'];
				$password=$_POST['password'];
				$rPassword=$_POST['rPassword'];
				$mobileNo=$_POST['mobileNo'];
				$Location=$_POST['Location'];
				$email=$_POST['email'];
				$doR=$_POST['doR'];
				$nationalID=$_POST['nationalID'];
				
				if($password!==$rPassword){
					$alert="<div style='color:red;font-style:italic'>password do not match!!!</div>";
				}
				else{
				
				$sql="INSERT INTO user (firstName,secondName,username,password,mobileNo,Location,email,doR,nationalID) VALUE('$firstName','$secondName','$username','$password','$mobileNo','$Location','$email','$doR','$nationalID')";
				mysqli_query($con,$sql);
				$alert="<div style='color:#fff;font-style:italic'>Registration Successful :)</div>";
				}
            }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../user/css/login.css">
<link href="css/css/font-awesome.css" rel="stylesheet" />
<title>Untitled Document</title>
<link href="css/css/font-awesome.css" rel="stylesheet" />
<script src="js/jquery-1.8.0.min.js"></script>

</head>
    
<script>
$(document).ready(function() {
	$(".btnErrorClose").click(function(){
		$(".loginError").fadeOut();
		$("#loginError_bg").fadeOut();
	});
	
	$(".showModal").click(function(){
		$("#modal_bg").fadeIn()
		$("#addFarmerModal").show()
	});
	$(".close").click(function(){
			$("#modal_bg").fadeOut()
			$("#addFarmerModal").fadeOut()
		});
    
});
</script>
<style>
    
</style>
<body onload="load(open_default)">
    
<div id="alertMsg"><?php echo $alert;?></div>
    <ul class="tab">
        <li><a href="javascript:void(0)" id="open_default" class="tab_links" onclick="show_login(event, 'wrapper_admin')">Admin</a></li>
        <li><a href="javascript:void(0)" class="tab_links" onclick="show_login(event, 'wrapper_inspector')">Employee</a></li>
        <li><a href="javascript:void(0)" class="tab_links" onclick="show_login(event, 'wrapper_farmer')">Farmer</a></li>
    </ul>
<div id="titleLP">
<h3>Login</h3>
</div>

<!--farmer login..........................................................................................................................-->	
<div id="wrapper_farmer" class="login_wrapper">
	<form method="post" action="login.php">
        <div class="form-input"><input type="text" name="username" placeholder="username" required /></div>
        <div class="form-input2"><input type="password" name="password" placeholder="password" required /></div>
        <input type="submit" name="login_farmer" value="LOGIN"/>

	</form>
    <div id="signUp">New User <button class="showModal">SIGN UP</button></div>
    
</div>


<!--farm inspector login................................................................................................................-->
<div id="wrapper_inspector" class="login_wrapper">
    <form method="post" action="login.php">
        <div class="form-input"><input type="text" name="username" placeholder="username" required/></div>
        <div class="form-input2"><input type="password" name="password" placeholder="password" required/></div>
        <input type="submit" name="login_inspector" value="LOGIN"/>

    </form>
    <div id="signUp">New User <button class="showModal">SIGN UP</button></div>

</div>


<!--admin login..........................................................................................................................-->
<div id="wrapper_admin" class="login_wrapper">
    <form method="post" action="login.php">
        <div class="form-input"><input type="text" name="username" placeholder="username" required/></div>
        <div class="form-input2"><input type="password" name="password" placeholder="password" required/></div>
        <input type="submit" name="login_admin" value="LOGIN"/>

    </form>
    <div id="signUp">New User <button class="showModal">SIGN UP</button></div>

</div>
    <p>Developed By <a href="../project/www.3dTech.co.ke">3d tech co. ltd</a></p>
    <p><strong>contact us</strong></p>
    <p>Tel: 00478890</p>
    <p>email: support@kenyaseed.com</p>



<div id="modal_bg" class="close">
    </div>
        <div id="addFarmerModal">
            <span class="close"><i class="fa fa-close"></i></span>
                <div id="modalTop">
                    <h3>Add New Farmer</h3>
                </div>
            <div id="modalContent">
            	<table>
                    <form method="post">
                        <tr><td><input type="text"  name="firstName" placeholder="First name"  class="input_half" required/>
                            <input type="text" name="secondName" placeholder="Second name" class="input_half" required/></td></tr>
                        <tr><td><input type="text" name="username" placeholder="username" class="input_full" required/></td></tr>
                        <tr><td><input type="password" name="password" placeholder="password" class="input_full" required minlength="3;"/></td></tr>
                        <tr><td><input type="password" name="rPassword" placeholder="repeat password" class="input_full" required minlength="3;"/></td></tr>
                        <tr><td><input type="text" name="mobileNo" placeholder="moble number" class="input_full" pattern="[0-9]{}" required maxlength="12;" minlength="12;"/></td></tr>
                        <tr><td><input type="text" name="Location" placeholder="location" class="input_full" required/></td></tr>
                        <tr><td><input type="text" name="email" placeholder="email" class="input_full" required/></td></tr>
                        <tr><td><input type="date" name="doR" placeholder="date of registration" class="input_full" required/></td></tr>
                        <tr><td><input type="text" name="nationalID" placeholder="National ID" class="input_full" required/></td></tr>
                        <tr><td class="close btnLeft">cancel</td><td><input type="submit" name="register" value="Create account" /></td></tr>
            
                    </form>
                </table>	
            
            </div>
    </div>
    <script src="../user/js/login.js"></script>
</body>
</html>
