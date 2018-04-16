<!--collect msg from msg-->
<?php
    //get name
    require "dbConnect.php";
    $sql="SELECT * FROM user,message WHERE user.farmerID=message.farmerID AND message.adminMSG=''";
    $result=mysqli_query($con,$sql);

    //show new msg
    $sql1="SELECT DISTINCT farmerID FROM message WHERE adminMSG=''";
    $result1=mysqli_query($con,$sql1);
    $row=mysqli_fetch_array($result);
    ?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link href="css/css/font-awesome.css" rel="stylesheet" />
    <script src="js/jquery-1.8.0.min.js"></script>
    <script src="css/common.js"></script>
    <script>
      var ajaxxhttp;
          
        function show_old(){
            ajaxxhttp = new XMLHttpRequest();
            ajaxxhttp.onreadystatechange= function(){
                if (this.readyState == 4 && this.status==200){
                    document.getElementById("old_msg").innerHTML= this.responseText;
                }
            }
            ajaxxhttp.open("GET", "old_msg.php", true);
            ajaxxhttp.send();
        }
    </script>
</head>

<body>
    <?php include "common_menu.php";?>
    <div id="wrapperR" style="background-color:#c4ccd3">
       <h3 style="margin:5px auto 5px 2.5%;">support</h3>
        <div id="content" style="background-color:#fff;width:92%;margin:auto;padding:20px;">
           <?php
            while($row1=mysqli_fetch_array($result1)){
                $sql2="select * from message,user WHERE message.farmerID=user.farmerID AND message.farmerID=$row1[farmerID] AND message.adminMSG=''";
                $result2=mysqli_query($con,$sql2);
                $count=mysqli_num_rows($result2);
                $row2=mysqli_fetch_array($result2);
                echo "<p style='background-color:#f7f6f6;border:1px #CCC solid;padding:10px;border-radius:3px'>message from $row2[firstName] $row2[secondName]";
                
                echo "<span style='background-color:#fff;;margin:0 5px 0 5px;padding:3px;display:inline;border:1px #f4f443 solid;font-size:14px'> <i>".$count." new</i></span>";
                echo "<a href='view_msg.php?id=$row1[farmerID]' style='text-decoration:none;background-color:#03729a;color:#fff;padding:3px 10px;border-radius:3px;'>view</a></p>";
            }
            ?>
            <button style="border:none;background:none;color:blue" onclick="show_old()">show old message</button>
            <div id="old_msg"></div>
            
        </div>
    </div>
</body>
</html>
