<?php
require '../admin/dbConnect.php';
$sql1="SELECT * FROM farm_numbers WHERE status='0'";
$result2=mysqli_query($con,$sql1);
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../employee/css/common_emp.css" />
        <link href="../admin/css/css/font-awesome.css" rel="stylesheet" />
        <script src="../admin/js/jquery-1.8.0.min.js"></script>
        <script src="/admin/css/common.js"></script>
        <title></title>
        <script>
            $(document).ready(function() {
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
            });
        </script>
        <style>

            a{
                text-decoration:none;
                background-color:#80FF80#80FF80;
                border:solid 1px #80FF80#80FF80;
            }

            #innerWrapper{
                font-size:14px;
            }
            #innerWrapper button{
                margin-top:1vh;
                margin-bottom:1vh;
                margin-left:2vw;
                background-color:#1c72ce;
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
            innerWrapper table{
                font-size:14px;
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
            </div>

            <?php

            include '../admin/dbConnect.php';

            $page=$_GET["page"];
            if($page=="" || $page=="1"){
                $page1=0;
            }
            else{
                $page1=($page*12)-12;
            }
            $sql="SELECT * FROM farm,user WHERE farm.farmerID=user.farmerID AND farm.farmNo='0' LIMIT $page1,12";
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){

                echo "<div id='innerTitle'>";
                echo "<h3>List of User</h3>";
                echo "</div>";
                echo "<div id='innerWrapper'>";
                //echo "<div id='innerWrapper2'>";
            ?>
            <button id="btnAddFarmer">New Farm +</button>
            <?php
                echo "<table>";
                echo "<tr> <th class='th_alignLeft'>farm ID</th> <th class='th_alignLeft'>Fisrt Name</th> <th class='th_alignLeft'>Second Name</th> <th class='th_alignLeft'>farmSize(hectures)</th> <th class='th_alignLeft'>Location</th> <th class='th_alignLeft'>Crop</th> <th>Action(confirm)</th> </tr> ";
                while($row=mysqli_fetch_array($result)){

                    echo "<tr>  <td>$row[farmID]</td> <td>$row[firstName]</td> <td>$row[secondName]</td> <td>$row[farmSize]</td> <td>$row[Location]</td> <td>$row[crop]</td> <td class='td_alignCenter'> <a href='confirm_farm.php?id=$row[0]'><i class='fa fa-edit'></i></a></td> </tr>";
                }
                echo "</table>";


            }
            //for pagination
            $result1=mysqli_query($con,"SELECT * FROM farm");
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
                            <tr><td><label>Farm number</label><select name="farmNo">
                                <?php
                                if(mysqli_num_rows($result2)>0){
                                    while($row1=mysqli_fetch_array($result2)){
                                        echo "<option value='$row1[farmNo]'>".$row1[farmNo]."</option>";
                                    }
                                }
                                else{
                                    echo "all farm number have been assigned";
                                }
                                ?>
                                </select></td></tr>
                            <tr><td><input type="text" name="moblieNo" placeholder="moble number" /></td></tr>
                            <tr><td><input type="text" name="Location" placeholder="location" /></td></tr>
                            <tr><td><input type="text" name="email" placeholder="email" /></td></tr>
                            <tr><td><input type="date" name="doR" placeholder="date of registration" /></td></tr>
                            <tr><td><input type="text" name="nationalID" placeholder="National ID" /></td></tr>
                            <tr><td><p class="close btnLeft">cancel</p></td><td><input type="submit" name="submit" value="submit" /></td></tr>

                        </form>
                    </table>	

                </div>
                <?php
                include 'dbConnect.php';

                if(isset($_POST['submit'])){
                    $firstName=$_POST['firstName'];
                    $secondName=$_POST['secondName'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $mobileNo=$_POST['mobileNo'];
                    $farmNo=$_POST['farmNo'];
                    $Location=$_POST['Location'];
                    $email=$_POST['email'];
                    $doR=$_POST['doR'];
                    $nationalID=$_POST['nationalID'];

                    $sql="INSERT INTO user (firstName,secondName,username,password,mobileNo,farmNo,Location,email,doR,nationalID) VALUE('$firstName','$secondName','$username','$password','$mobileNo','$farmNo','$Location','$email','$doR','$nationalID')";
                    mysqli_query($con,$sql);
                    $sql2="UPDATE farm_numbers SET status='1' WHERE farmNo='$farmNo'";
                    mysqli_query($con,$sql2);
                    header('location:userManagement.php?page');
                }
                ?>

            </div>
        </div>
    </body>
</html>