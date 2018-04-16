<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
<link href="css/css/font-awesome.css" rel="stylesheet" />
<script src="js/jquery-1.8.0.min.js"></script>
<script src="css/common.js"></script>
<title></title>
<script>
	$(document).ready(function() {
        //farmer modal
		$("#btnAddFarmer").click(function(){
			$("#modal_bg").fadeIn()
			$("#addFarmerModal").show()
		});
		
		$(".close").click(function(){
			$("#modal_bg").fadeOut()
			$("#addFarmerModal").fadeOut()
		});
		
		$(".btnOpenUpdate").click(function(){
			$("#updateModal").show();
		});
        
        
        //employee modal
        $("#btnAdd_emp").click(function(){
            $("#modal_bg").fadeIn()
            $("#add_empModal").fadeIn('slow')
        });
        $(".close").click(function(){
            $("#modal_bg").fadeOut()
            $("#add_empModal").fadeOut()
        });

    });
</script>
<style>

a{
	text-decoration:none;
	background-color:#80FF80#80FF80;
	border:solid 1px #80FF80#80FF80;
}
    .tab_content{
        display: none;
    }
    ul.tab{
        list-style-type: none;
        width:30%;
        margin:;
        padding: 0;
        overflow: hidden;
    }
    ul.tab li{
        background-color: #1b60a6;
        float: left;
    }
    ul.tab a{
        display: inline-block;
        padding: 10px;
        width: 5.5vw;
        text-align: center;
        color: #fff;
        transition: 0.3s;
    }
    ul.tab li a:hover{
        background-color: #1175d9;
        color: #fff;
    }
    ul.tab li a:focus,.active{
        background-color: #ccc;
        color: #000;
    }
    
#innerWrapper{
	font-size:14px;
}
#innerWrapper button{
	margin-top:1vh;
	margin-bottom:1vh;
	margin-left:2vw;
	background-color:#1358e1;
	color:#fff;
	border-radius:3px;
	padding:7px;
	border:none;
}
#innerWrapper table{
	width:95%;
	margin:auto;
	border:solid 1.5px #D2D2D2;
}
#innerWrapper table td{
	/*border-top:solid 1.5px #D2D2D2;*/
	padding:3px;
	font-size:14px;
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
.page{
	width:95%;
	border:hidden 1px #CCCCCC;
	margin:auto;
	margin-bottom:10px;
	margin-top:5px;
}
.page a{
	border:solid 1px #004221;
	border-radius:2px;
	background:#004221;
	margin-right:5px;
	padding-left:2px;
	padding-right:5px;
	color:#FFF;
}
/*employee css code************************************************************************************/
    #wrapper_emp{
        font-size:14px;
    }
    #wrapper_emp button{
        margin-top:1vh;
        margin-bottom:1vh;
        margin-left:2vw;
        background-color:#1358e1;
        color:#fff;
        border-radius:3px;
        padding:7px;
        border:none;
    }
    #wrapper_emp table{
        width:95%;
        margin:auto;
        border:solid 1.5px #D2D2D2;
    }
    #wrapper_emp table td{
        /*border-top:solid 1.5px #D2D2D2;*/
        padding:3px;
        font-size:14px;
    }
    #wrapper_emp img{
        width:20px;
        height:20px;
    }
    /*modal employee css code***************************************************************************************/
    #add_empModal{
        display:none;
        position:fixed;
        background-color:#fff;
        height:90vh;
        width:40vw;
        left:30vw;
        top:6vh;
    }
    #add_empModal span{
        color:#999;
        cursor:pointer;
        float:right;
        font-size:20px;
        margin-right:1.5vw;
        margin-top:2vh;
    }
    #add_empModal span:hover {
        color:#666;
    }
    
/*modal farmer css code***************************************************************************************/
#addFarmerModal{
	display:none;
	position:fixed;
	background-color:#fff;
	height:90vh;
	width:40vw;
	left:30vw;
	top:6vh;
}
#addFarmerModal span{
	color:#999;
	cursor:pointer;
	float:right;
	font-size:20px;
	margin-right:1.5vw;
	margin-top:2vh;
}
#addFarmerModal span:hover {
	color:#666;
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

#modalContent, #modalTop{
	margin:auto;
	width:80%;
}

#modalContent input[type=text],[type=password]{
	font-size:14px;
	position:relative;
	width:31vw;
	height:5vh;
	padding-left:0.5vw;
	margin-bottom:2vh;
	border-radius:3px;
	border:#F1F1F1 2px solid;
	
}

#modalContent input[type=date]{
	position:relative;
	width:15vw;
	height:5vh;
	padding:0.5vw;
	margin-top:0.3vh;
	border-radius:3px;
	border:#F1F1F1 1px solid;
}
#modalContent input[type=submit]{
	position:absolute;
	bottom:3vh;
	right:5vw;
	border:none;
	width:7vw;
	height:5vh;
	background:#409FFF;
	border-radius:2px;
	color:#FFF;
}
#modalContent select{
    width: 15vw;
    padding: 0.5vw;
    border: #F1F1F1 solid 1px;
    margin-left:vw;
    float: right;
    color: dimgray
}
#modalContent label{
    float: left;
    color: dimgray;
    font-size: 14px;
}
    }
.btnLeft{
	color:#409FFF;
	font-size:14px;
	cursor:pointer;
}
.btnLeft:hover{
	color:#0080FF;
}
#updateModal{
	background-color:#F00;
	position:absolute;
	height:50vh;
	width:40vw;
	top:0;
	display:none;
}
</style>
</head>
<body>

 <?php include "common_menu.php";?>
 
 <div id="wrapperR">
 	<div id='logout'>
		<a href='login.php?action=logout'> <i class='fa fa-power-off'></i> Logout</a>
        <p>Settings</p>
	</div>
 	<div id="innerHeader">
    	<h2>User Management</h2>
        <ul class="tab">
            <li><a href="javascript:void(0)" id="open_default" class="tab_links" onclick="show_user(event, 'innerWrapper')">farmers</a></li>
            <li><a href="javascript:void(0)" id="oload" class="tab_links" onclick="show_user(event, 'wrapper_emp')">Employees</a></li>
        </ul>
    </div>
 	
<?php

include 'dbConnect.php';

$page=$_GET["page"];
if($page=="" || $page=="1"){
	$page1=0;
}
else{
	$page1=($page*12)-12;
}
//select from user farmer 
$sql="SELECT * FROM user where confirmation='1' LIMIT $page1,12";
$result=mysqli_query($con,$sql);
     
//select from employee
$sql2="SELECT * FROM employee LIMIT $page1,12";
$result2=mysqli_query($con,$sql2);
     
if(mysqli_num_rows($result)>0){
	
	echo "<div id='innerTitle'>";
	echo "<h3>List of User</h3>";
	echo "</div>";
?>
  
  
   <!--show farmers codes--------------------------------------------------------->
    <div id="innerWrapper" class="tab_content">
	<button id="btnAddFarmer">Add Farmer <i class="fa fa-plus-circle"></i></button>
<?php
	echo "<table>";
	echo "<tr> <th class='th_alignLeft'>User ID</th> <th class='th_alignLeft'>Fisrt Name</th> <th class='th_alignLeft'>Second Name</th> <th class='th_alignLeft'>Username</th> <th class='th_alignLeft'>Password</th> <th class='th_alignLeft'>Farm number</th> <th>Action(edit)</th> <th>Action(delete)</th> </tr> ";
	while($row=mysqli_fetch_array($result)){
		
		echo "<tr>  <td>$row[farmerID]</td> <td>$row[firstName]</td> <td>$row[secondName]</td> <td>$row[username]</td> <td>$row[password]</td> <td>";
            $sql1="select * from farm where farmerID=$row[farmerID]";
            $result3=mysqli_query($con,$sql1);
            $row1=mysqli_fetch_array($result3);
            if(mysqli_num_rows($result3)>0){
                echo $row1['farmNo'];
            }else{
                echo "Not assigned";
            }
            
        echo "</td> <td class='td_alignCenter'> <a href='edit.php?edit=$row[0]'><i class='fa fa-edit'></i></a></td> <td class='td_alignCenter'> <a href='delete.php?del=$row[0]&fno=$row1[farmNo]'><i class='fa fa-trash'></i></a></td> </tr>";
	}
	echo "</table>";
	
	
}
//for pagination
$result1=mysqli_query($con,"SELECT * FROM user");
$count=mysqli_num_rows($result1);
$j=$count/12;
$j=ceil($j);

echo "<div class='page'>Pages ";
for($i=1;$i<=$j;$i++){
	echo "<a href='userManagement.php?page=$i'>$i</a>";
	}
echo "</div>";
//end pagination
	//echo "</div>";
	echo "</div>";

?>


<!--show employees codes-->
       
        <div id="wrapper_emp" class="tab_content">
            <button id="btnAdd_emp">Add employee <i class="fa fa-plus-circle"></i></button>
            <?php
            echo "<table>";
            echo "<tr> <th class='th_alignLeft'>employee ID</th> <th class='th_alignLeft'>Fisrt Name</th> <th class='th_alignLeft'>Second Name</th> <th class='th_alignLeft'>Username</th> <th class='th_alignLeft'>position</th> <th class='th_alignLeft'>Farm number</th> <th>Action(edit)</th> <th>Action(delete)</th> </tr> ";
            while($row2=mysqli_fetch_array($result2)){

                echo "<tr>  <td>$row2[employeeID]</td> <td>$row2[first_name]</td> <td>$row2[second_name]</td> <td>$row2[username]</td> <td>$row2[position]</td> <td>$row2[department]</td> <td class='td_alignCenter'> <a href='edit.php?edit=$row2[0]'><i class='fa fa-edit'></i></a></td> <td class='td_alignCenter'> <a href='delete.php?del=$row2[0]'><i class='fa fa-trash'></i></a></td> </tr>";
            }
            echo "</table>";


            //for pagination
            $result1=mysqli_query($con,"SELECT * FROM user");
            $count=mysqli_num_rows($result1);
            $j=$count/12;
            $j=ceil($j);

            echo "<div class='page'>Pages ";
            for($i=1;$i<=$j;$i++){
                echo "<a href='userManagement.php?page=$i'>$i</a>";
            }
            echo "</div>";
            //end pagination
            //echo "</div>";
            echo "</div>";

            ?>
            <script src="js/user.js"></script>

</div>


        <!--farmer modal---------------------------->
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
                        <tr><td><input type="text" name="firstName" placeholder="First name" /></td></tr>
                        <tr><td><input type="text" name="secondName" placeholder="Second name" /></td></tr>
                        <tr><td><input type="text" name="username" placeholder="username" /></td></tr>
                        <tr><td><input type="password" name="password" placeholder="password" /></td></tr>
                        <tr><td><input type="text" name="moblieNo" placeholder="moble number" /></td></tr>
                        <tr><td><input type="text" name="Location" placeholder="location" /></td></tr>
                        <tr><td><input type="text" name="email" placeholder="email" /></td></tr>
                        <tr><td><input type="date" name="doR" placeholder="date of registration" /></td></tr>
                        <tr><td><input type="text" name="nationalID" placeholder="National ID" /></td></tr>
                        <tr><td><p class="close btnLeft">cancel</p></td><td><input type="submit" name="submit" value="submit" /></td></tr>

                    </form>
                </table>	

            </div>
            <!--ADD NEW FARMER-->
            <?php
            include 'dbConnect.php';

            if(isset($_POST['submit'])){
                $firstName=$_POST['firstName'];
                $secondName=$_POST['secondName'];
                $username=$_POST['username'];
                $password=$_POST['password'];
                $mobileNo=$_POST['mobileNo'];
                $Location=$_POST['Location'];
                $email=$_POST['email'];
                $doR=$_POST['doR'];
                $nationalID=$_POST['nationalID'];

                $sql="INSERT INTO user (firstName,secondName,username,password,mobileNo,Location,email,doR,nationalID) VALUE('$firstName','$secondName','$username','$password','$mobileNo','$Location','$email','$doR','$nationalID')";
                mysqli_query($con,$sql);
                header('location:userManagement.php?page');
            }
            ?>

        </div>
        
<!--employee modal codes---------------------------------------------------->

        <div id="modal_bg" class="close">
        </div>
        <div id="add_empModal">
            <span class="close"><i class="fa fa-close"></i></span>
            <div id="modalTop">
                <h3>Add New Farmer</h3>
            </div>
            <div id="modalContent">
                <table>
                    <form method="post">
                        <tr><td><input type="text" name="first_name" placeholder="First name" /></td></tr>
                        <tr><td><input type="text" name="second_name" placeholder="Second name" /></td></tr>
                        <tr><td><input type="text" name="username" placeholder="username" /></td></tr>
                        <tr><td><input type="password" name="password" placeholder="password" /></td></tr>
                        <tr><td><input type="text" name="moblieNo" placeholder="moble number" /></td></tr>
                        <tr><td><input type="text" name="email" placeholder="email" /></td></tr>
                        <tr><td><input type="text" name="position" placeholder="position" /></td></tr>
                        <tr><td><input type="text" name="department" placeholder="department" /></td></tr>
                        <tr><td><p class="close btnLeft">cancel</p></td><td><input type="submit" name="submit1" value="submit" /></td></tr>

                    </form>
                </table>	

            </div>
            <!--ADD NEW emp-->
            <?php
            include 'dbConnect.php';

            if(isset($_POST['submit1'])){
                $first_name=$_POST['first_name'];
                $second_name=$_POST['second_name'];
                $username=$_POST['username'];
                $password=$_POST['password'];
                $mobileNo=$_POST['mobileNo'];
                $email=$_POST['email'];
                $position=$_POST['position'];
                $department=$_POST['department'];

                $sql1="INSERT INTO employee (first_name,second_name,username,password,mobileNo,email,position,department) VALUE('$first_name','$second_name','$username','$password','$mobileNo','$email','$position','$department')";
                mysqli_query($con,$sql1);
                echo "<meta http-equiv='refresh' content='0;url=userManagement.php?page'>";
                ?>
                <script>document.getElementById("oload").click();</script>
                <?php
            }
            ?>

        </div>
</body>
</html>