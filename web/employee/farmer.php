<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/common_emp.css" />
        <link href="../admin/css/css/font-awesome.css" rel="stylesheet" />
        <script src="../admin/js/jquery-1.8.0.min.js"></script>
        <script src="../admin/css/common.js"></script>
        <title></title>
        </script>
        <style>
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
                width:96%;
                margin:auto;
                border:solid 1.5px #D2D2D2;
            }
            #innerWrapper table td{
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
                <h2>farmers</h2>
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
                <?php
                echo "<table>";
                echo "<tr> <th class='th_alignLeft'>User ID</th> <th class='th_alignLeft'>Fisrt Name</th> <th class='th_alignLeft'>Second Name</th> <th class='th_alignLeft'>Username</th> <th class='th_alignLeft'>Location</th> <th class='th_alignLeft'>Farm number</th> <th class='th_alignLeft'>mobile number</th> </tr> ";
                while($row=mysqli_fetch_array($result)){

                    echo "<tr>  <td>$row[farmerID]</td> <td>$row[firstName]</td> <td>$row[secondName]</td> <td>$row[username]</td> <td>$row[Location]</td> <td>";
                    $sql1="select * from farm where farmerID=$row[farmerID]";
                    $result3=mysqli_query($con,$sql1);
                    $row1=mysqli_fetch_array($result3);
                    if(mysqli_num_rows($result3)>0){
                        if($row1['farmNo']==0){
                            echo "farm not inspected";
                        }else{
                        echo $row1['farmNo'];
                        }
                    }else{
                        echo "farm not registed";
                    }

                    echo "</td> <td>$row[mobileNo]</td> </tr>";
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
                </div>
                </body>
            </html>