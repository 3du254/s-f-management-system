<!--collect msg from msg-->
<?php
$farmerID=$_GET['id'];
//get name
require "dbConnect.php";
$sql="SELECT * FROM user,message WHERE user.farmerID=message.farmerID AND message.adminMSG='' AND message.farmerID='$farmerID'";
$result=mysqli_query($con,$sql);
$result1=mysqli_query($con,$sql);
$row1=mysqli_fetch_array($result1);

?>
<!--reply message code-->
<?php

require "dbConnect.php";
if(isset($_POST['submit'])){
    $msgID=$_POST['msgID'];
    $adminMSG=$_POST['adminMSG'];
    $sql1="update message set adminMSG='$adminMSG' WHERE msgID='$msgID'";
    mysqli_query($con,$sql1);
    ?>
    <script>y34alert('reply send');</script>
    <?php
}
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
    </head>

    <body>
        <?php include "common_menu.php";?>
        <div id="wrapperR" style="background-color:#c4ccd3">
            <h3 style="margin:5px auto 5px 2.5%;">view message</h3>
            <div id="content" style="background-color:#fff;width:92%;margin:auto;padding:20px;">
                <?php
                        echo "<input type='text' name='username' value='$row1[username]' />";
                            while($row=mysqli_fetch_array($result)){
                            echo "<form method='post'>";
                            echo "<input type='hidden' name='msgID' value='$row[msgID]' />";
                            echo "<textarea style='display:block;'>$row[farmerMSG]</textarea>";
                            echo "<select name='adminMSG'>
                                    <option>you can update your personal detail once your account is confirmed</option>
                                    <option>your account will be activated within 48hrs</option>
                                    <option>you can visit our offices open monday to friday 8am to 4pm</option>
                                </select>";
                            echo "<input type='submit' name='submit' value='reply' />";
                            echo "</form>";
    }                      
                   
                ?>
            </div>
        </div>
    </body>
</html>
