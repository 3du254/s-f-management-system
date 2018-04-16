<?php
	session_start();
	$errorPassword="";
	require '../admin/dbConnect.php';
    $farmerID_S=$_SESSION["farmerID"];
    $sql="SELECT * FROM user WHERE farmerID='$farmerID_S'";
    $result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	
		require "../admin/dbConnect.php";
	$id=$_SESSION['farmerID'];
	if(isset($_POST['submit'])){
		$fname=$_POST['fname'];
		$sname=$_POST['sname'];
		$username=$_POST['username'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$mobileNo=$_POST['mobileNO'];
		$nationalID=$_POST['nationalID'];
		$sql1="UPDATE user SET firstName='$fname', secondName='$sname', username='$username', Location='$address', email='$email', mobileNo='$mobileNo',nationalID='$nationalID
		' WHERE farmerID='$farmerID_S'";
		$res=mysqli_query($con,$sql1);
		
		echo "<meta http-equiv='refresh' content='0;url=profile.php'>";
		
		
	}

if(isset($_POST['submit1'])){
	$oldPasscode=$row[4];
	$newPassword=$_POST['newPassword'];
	$oldPassword=$_POST['oldPassword'];
	$rPassword=$_POST['rPassword'];
	if($oldPassword!=$oldPasscode){
		$errorPassword="<div id='errorPassword'> invalid old password</div>";
		//$responce="invalid old password";
	}
	else{
		if($newPassword!=$rPassword){
			$errorPassword="<div id='errorPassword'> password do not match </div>";
		}
		else{
			$sql2="UPDATE user SET password='$newPassword' WHERE farmerID='$farmerID_S'";
			mysqli_query($con,$sql2);
			$errorPassword="<div id='success'> Password changed successfully</div>";
		}
	}
}
?>
<html>
<head>
<link href="../admin/css/css/font-awesome.min.css" rel="stylesheet" />
<link href="css/commonUser.css" rel="stylesheet" type="text/css"/>
<script src="../admin/js/jquery-1.8.0.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="../admin/js/jquery-1.8.0.min.js"></script>
<title>Home</title>

<script>
	$(document).ready(function() {
		$("#btnLeft").click(function(){
			$("#modal_bg").fadeIn();
			$("#modalUpdate").show();
		})
		$(".close").click(function(){
			$("#modalUpdate").fadeOut();
			$("#changePassword").fadeOut();
			$("#modal_bg").fadeOut();
		})
        
    });
	
$(document).ready(function() {
	$("#btnRight").click(function(){
		$("#changePassword").show();
		$("#modal_bg").fadeIn();
	})
    
});
</script>

<style>
#right{
	background-color:#E6E6F2;
}
#right p{
	position:absolute;
	left:1.5vw;
	top:-1vh;
	
}
#profile{
	position:absolute;
	background-color:#E4E4F1;
	margin:auto;
	margin-top:5vh;;
	width:86vw;
	height:88.5vh;
	border-top:solid 2px #CCC;
}
#profilePic{
	position:absolute;
	left:20vw;
	top:20vh;
	width:16vw;
	height:16vw;
	border:#E9E9E9 solid 1px;
}
#profilePic img{
	width:218.5px;
	height:218.5px;
}
#profileDetails{
	position:absolute;
	right:23vw;
	top:20vh;
}
#profileDetails #btnLeft{
	border:none;
	margin-top:2vh;
	margin-right:1.5vw;
	height:5.5vh;
	width:10vw;
	background-color:#32CD32;
	color:#fff;
	font-size:14px;
}
#profileDetails #btnRight{
	border:none;
	margin-top:1vh;
	height:5.5vh;
	width:10vw;
	background-color:#DC143C;
	color:#FFFFFF;
	font-size:14px;
}
#profileW{
	background-color:#fff;
	margin:auto;
	margin-top:3vh;
	width:79vw;
	height:80vh;
}
#profilew2{
	margin:auto;
	margin-top:5vh;
	width:55vw;
	height:60vh;
	border-top:#F2F2F2 solid 2px;
	border-bottom:#F2F2F2 solid 2px;
}
#profileWTop{
	background-color:#FFF;
	margin:auto;
	width:79vw;
	height:5vh;
}
table{
	border-collapse:collapse;
}
.border{
	border-bottom:solid 2px #ccc;
	padding-bottom:15px;
}
#profileDetails td{
	padding:5px;
	font-size:14px;
}

/*>>modal<<.............................................................................................................................*/
/*>>details update<<*/
#modalUpdate{
	z-index:1;
	top:20vh;
	left:30vw;
	position:fixed;
	width:40vw;
	height:62vh;
	background-color:#FFF;
	overflow:auto;
	display:none;
	
}
#M_updateContent{
	width:35vw;
	margin:auto;
}
#modalTop{
	width:35vw;
	margin:auto;
}
#modal_bg{
	cursor:pointer;
	display:none;
	position:fixed;
	width:100vw;
	height:100vh;
	background-color:rgba(0,0,0,.6);
	top:0;
	left:0;
}
#right span{
	color:#999;
	cursor:pointer;
	float:right;
	font-size:20px;
	margin-right:2vw;
	margin-top:2vh;
}
.input_full{
	font-size:14px;
	position:relative;
	width:25.5vw;
	height:5vh;
	padding-left:0.5vw;
	margin-bottom:2vh;
	border-radius:3px;
	border:#F1F1F1 1px solid;
	
}
.input_half{
	margin-right:1vw;
	width:12vw;
	font-size:14px;
	position:relative;
	height:5vh;
	padding-left:0.5vw;
	margin-bottom:2vh;
	border-radius:3px;
	border:#F1F1F1 1px solid;
}
#M_updateContent input[type=submit]{
	position:absolute;
	bottom:3vh;
	right:4vw;
	border:none;
	width:7vw;
	height:5vh;
	background:#409FFF;
	border-radius:2px;
	color:#FFF;
}
.btn_left{
	position:absolute;
	top:55vh;
	color:#409FFF;
	font-size:14px;
	cursor:pointer;
}
.btn_left:hover{
	color:#0080FF;
}
#right span:hover {
	color:#666;
}
/*>>details update end<<*/

/*>>password update<<*/
#changePassword{
	width:30vw;
	height:40vh;
	z-index:1;
	position:fixed;
	background-color:#FFF;
	top:30vh;
	left:35vw;
	display:none;
}
#modalTopPassword{
	width:24vw;
	margin:auto;
}
#passwordContent{
	width:24vw;
	margin:auto;
	
}
#changePassword input[type=password]{
	font-size:14px;
	position:relative;
	width:20vw;
	height:5vh;
	padding-left:0.5vw;
	margin-bottom:2vh;
	border-radius:3px;
	border:#F1F1F1 2px solid;
}
#changePassword input[type=submit]{
	position:absolute;
	bottom:3vh;
	right:3vw;
	border:none;
	width:7vw;
	height:5vh;
	background:#409FFF;
	border-radius:2px;
	color:#FFF;
}

/*>>password update end<<*/
/*>>modal end<<................................................................................................................*/
#footer{
	position:absolute;
	top:76vh;
	font-size:10px;
	width:40vw;
	left:35vw;
}
/*>>alert<<.....................................................................................................................*/
#errorPassword{
	background-color:#FF8282;
	margin:auto;
	width:55vw;
	color:#FFF;
	padding:15px;
}
#success{
	background-color:#00AE57;
	margin:auto;
	width:55vw;
	color:#FFF;
	padding:15px;
}
/*>>end of alert<<................................................................................................................*/
</style>

</head>


<body>

    <?php include "common_menu.php"; ?>


<div id="right">
		<p>Profile || Edit</p>
	<div id="profile">
    	<div id="profileW">
    	<div id="profileWTop">
    	</div>
        <?php echo $errorPassword; ?>
        <div id="profileW2">
    	<div id="profilePic">
        	<img src="img/20170313222652.jpg"/>
    	</div>
    	<div id="profileDetails">
			<?php
                echo "<table>";
                echo "<tr><td>Name:</td><td>".$row['firstName'];
                echo  " ".$row['secondName']."</td></tr>";
                echo "<tr><td>National ID: </td><td>".$row['nationalID']."</td></tr>";
                echo "<tr><td class='border'>Username: </td><td class='border'>".$row['username']."</td></tr>";
                echo "<tr><td>Farm number:</td><td>";
                        $sql1="select * from farm where farmerID=$row[farmerID]";
                        $result3=mysqli_query($con,$sql1);
                        $row1=mysqli_fetch_array($result3);
                        if(mysqli_num_rows($result3)>0){
                            echo $row1['farmNo'];
                        }else{
                            echo "Not assigned";
                        }
                echo "</td></tr>";
                echo "<tr><td class='border'>Date of Registration:</td><td class='border'>".$row['doR']."</td></tr>";
                echo "<tr><td>Address:</td><td>".$row['Location']."</td></tr>";
                echo "<tr><td>Email:</td><td>".$row['email']."</td></tr>";
                echo "<tr><td>Mobile number:</td><td>".$row['mobileNo']."</td></tr>";
                echo "</table>";
            ?>
        <button id="btnLeft">Update</button>
        <button id="btnRight">Change password</button>
    </div><!--end profileDetails-->
    </div><!--end of profileW2-->
    <?php include "footer.php"; ?>
</div><!--end profile.................................................-->


   <div id="modal_bg" class="close">
    </div>
        <div id="modalUpdate">
            <span class="close"><i class="fa fa-close"></i></span>
                <div id="modalTop">
                    <h3>Edit details</h3>
                </div>
            <div id="M_updateContent">
        	<table>
                <form method="post">
                    <tr> <td>Name</td>  <td><input type="text" name="fname" value="<?php echo $row['firstName']; ?>" class="input_half"/>
                         <input type="text" name="sname" value="<?php echo $row['secondName']; ?>" class="input_half"/></td></tr>
                    <tr> <td>Username</td>  <td><input type="text" name="username" value="<?php echo $row['username']; ?>" class="input_full"/></td></tr>
                    <tr> <td>National ID</td>  <td><input type="text" name="nationalID" value="<?php echo $row['nationalID']; ?>" class="input_full"/></td></tr>
                    <tr> <td>Location</td>  <td><input type="text" name="address" value="<?php echo $row['Location']; ?>" class="input_full"/></td></tr>
                    <tr> <td>Email</td>  <td><input type="text" name="email" value="<?php echo $row['email']; ?>" class="input_full"/></td></tr>
                    <tr> <td>Mobile number</td>  <td><input type="text" name="mobileNO" value="<?php echo $row['mobileNo']; ?>"class="input_full"/></td></tr>
                    <tr> <td class="btn_left close">cancel</td> <td><input type="submit" name="submit" value="update" /></td></tr>
    
                    
                </form>
            </table>
            </div><!--updateContent--> 
            </div>
</div>
    <div id="modal_bg" class="close">
    </div>
    <div id="changePassword">
    <span class="close"><i class="fa fa-close"></i></span>
    	<div id="modalTopPassword">
             <h3>Change password</h3>
        </div>
    	<div id="passwordContent">
        <table>
        	<form method="post">
        	<tr><td>Old</td>  <td><input type="password" name="oldPassword" placeholder="password"/>
            <tr><td>New</td>  <td><input type="password" name="newPassword" placeholder="password"/>
            <tr><td>Repeat</td>  <td><input type="password"t" name="rPassword" placeholder="password"/>
            <tr><td><input type="submit" name="submit1" value="submit" /></td></tr>
            </form>
          </table>
        </div><!--end password content-->
    </div><!--end change password-->
</div><!--end right-->



</body>
</html>


