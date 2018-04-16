<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
<link href="css/css/font-awesome.css" rel="stylesheet" />
<script src="js/jquery-1.8.0.min.js"></script>
<script src="css/common.js"></script>
<title>Admin home</title>

<style type="text/css">

a{
	text-decoration:none;
	background-color:#80FF80#80FF80;
	border:solid 1px #80FF80#80FF80;
}

#innerWrapper p a{
	margin:1px auto 1px 25px;
	border:solid 1px #0C6;
	background:#0C6;
	color:#fff;
	border-radius:4px;
	padding:7px;
}
#innerWrapper table{
	width:95%;
	margin:0 auto 25px auto;
	border:solid 1.5px #D2D2D2;
}
#innerWrapper table td{
	/*border-top:solid 1.5px #D2D2D2;*/
	padding:3px;
}
#innerWrapper img{
	width:20px;
	height:20px;
}
	
.td_alignCenter{
	text-align:center;
}
.td_alignCenter a{
	color:#0C6;
	font-size:21px
}
.th_alignLeft{
	text-align:left;
}

/*dashboard--start*/

.user{
	background:#009349;
	border:solid 1px #009349;
	border-radius:4px;
	width:25%;
	height:125px;
	padding:15px;
	float:left;
}
.user i{
	float:right;
	font-size:100px;
	margin-top:10px;
	margin-right:10px;
	color:#fff;
}
.text{
	color:#fff;
	text-align:left;
	float:left;
}
.number{
	font-size:60px;
	float:left;;
	text-height:60px;
	margin-top:0px;
	color:#fff;
}
#wrapperR{
	background:#F5F5F5;
}

.notification{
	background:#FF952B;
	border:solid 1px #FF952B;
	border-radius:4px;
	margin:0px auto auto 36%;
	width:25%;
	height:125px;
	padding:15px;
	float:none;;	
}
.notification i{
	float:right;
	font-size:100px;
	margin-top:10px;
	margin-right:10px;
	color:#fff;
}
.events{
	background:#66F;
	border:solid 1px #66F;
	border-radius:4px;
	width:25%;
	height:125px;
	padding:15px;
	float:right;
	margin:-155px auto auto auto;
}
.events i{
	float:right;
	font-size:100px;
	margin-top:10px;
	margin-right:10px;
	color:#fff;
}

.news{
	margin-top:0px;
	width:100%;
	height:300px;
	background-color:#fff;
	border-bottom:solid 1px #F0F0F0;
	border-top:solid 1px #F0F0F0;
	border-right:solid 1px #F0F0F0;
	border-left:solid 1px #F0F0F0;
}
.newsTitle{
	width:100%;
	height:40px;
	margin-top:20px;
	background-color:#fff;
	border-bottom:hidden 1px #F0F0F0;
	border-top:solid 1px #F0F0F0;
	border-right:solid 1px #F0F0F0;
	border-left:solid 1px #F0F0F0;


}
.p_left{
	font-size:18px;
	margin-left:15px;
	margin-top:10px;
	font-weight:600;
}
.p_left i{
	color:#F00;
	font-size:20px
}
/*dashboard--end*/
.fa-caret-down{
	font-size:22px;
}

</style>
</head>
<body>

 <?php include "common_menu.php";?>
 
 <div id="wrapperR">
 	
 	<div id="innerHeader">
    	<h2>Dashboard</h2>
        <div class="user">
        	<?php
				echo "<p class='number'>";
				require 'dbConnect.php';
				$sql="SELECT * FROM user";
				$result=mysqli_query($con,$sql);
				$row=mysqli_num_rows($result);
				echo $row."</p>" . "<a href='userManagement.php?page'><i class='fa fa-user'></i></a>";
				echo "<br />";
				echo "<p class='text'>Total users</p>";
			?>
        </div>
        <div class="notification">
        	<?php
				require 'dbConnect.php';
				$sql="SELECT * FROM user";
				$result=mysqli_query($con,$sql);
				$row=mysqli_num_rows($result);
				echo "<p class='number'>"."0"."</p>" . "<a href='#'><i class='fa fa-inbox'></i></a>";
				echo "<br />";
				echo "<p class='text'>Notification</p>";
			?>
        </div>
        <div class="events">
        	<?php
				require 'dbConnect.php';
				$sql="SELECT * FROM user";
				$result=mysqli_query($con,$sql);
				$row=mysqli_num_rows($result);
				echo "<p class='number'>"."0"."</p>" . "<a href='#'><i class='fa fa-calendar'></i></a>";
				echo "<br />";
				echo "<p class='text'>Total Events</p>";
			?>
        </div>
        <div class="newsTitle"><p class="p_left"><i class="fa fa-newspaper-o"></i> Agricultural News</p></div>
        <div class="news"></div>
        <div class="support"></div>
    </div>
 	
<?php


?>
</div>
</body>
</html>