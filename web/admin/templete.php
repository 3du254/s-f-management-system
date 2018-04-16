<html>
<head>
<title></title>
<style>
body{
	font-family:"Arial Narrow";
}
a{
	text-decoration:none;
	background-color:#80FF80#80FF80;
	border:solid 1px #80FF80#80FF80;
}
#wrapper{
	height:95%;
	width:80%;
	float:right;
	margin-top:0px;
	border-left:solid 1.6px #D2D2D2;
	padding:15px 0 0 15px;
	
}
#innerWrapper{
	width:95%;
	height:auto;
	margin:0px auto auto auto;
	padding-top:2px;
	border:solid 1.5px #D2D2D2;
	border-top:hidden;
	border-bottom-left-radius:3px;
	border-bottom-right-radius:3px;
	
}
#innerWrapper p a{
	margin:1px auto 1px 25px;
	border:solid 1px #00E874;
	background:#C1FFE0;
	color:#000;
	border-radius:3px;
	padding:5px;
}
#innerWrapper table{
	width:95%;
	margin:0 auto 15px auto;
	border:solid 1.5px #D2D2D2;
}
#innerWrapper table th{
	text-align:left;
}
#innerWrapper table tr{
	border-top:solid 1.5px #D2D2D2;
	padding:40px;
}
#header{
	height:50px;
	width:100%;
	float:right;
	margin-top:0;
	border-bottom:solid 1.6px #D2D2D2;
	padding-left:15px;
}
#innerHeader{
	width:95%;
	margin:auto;
}
#header h2{
	margin:6px;
	color:#666;
}

#innerTitle{
	background-color:#F9F9F9;
	margin:auto;
	width:95%;
	height:35px;
	border:solid 1px #D2D2D2;
	border-top-left-radius:3px;
	border-top-right-radius:3px;
	font-size:14px;
	text-height:50px;
	
}
#innerTitle h3{
	margin:8px auto auto 20px;
		
}
</style>
</head>
<body>
 <div id="header">
 <h2>Admin Panel</h2>
 </div>
 <div id="wrapper">
 	<div id="innerHeader">
    	<h2>User Management</h2>
    </div>
 	
<?php

include 'dbConnect.php';
?>	
<div id="innerTitle">
	<h3>Edit User</h3>
	</div>
	<div id="innerWrapper">
		
	
	</div>
