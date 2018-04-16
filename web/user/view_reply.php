<?php
session_start();
$farmerID_S=$_SESSION['farmerID'];
$firstName_S=$_SESSION['f_fname'];
$secondName_S=$_SESSION['f_sname'];
?>

<?php
//view msg
$msgID=$_GET['msgID'];
require "../admin/dbConnect.php";
$sql="SELECT * FROM message WHERE adminMSG!='' AND farmerID='$farmerID_S' AND read_stat='0' AND msgID='$msgID'";
$result=mysqli_query($con,$sql);

$row=mysqli_fetch_array($result);
?>

<!--view msg-->


<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link href="../admin/css/css/font-awesome.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="../user/css/commonUser.css">
        <script src="../admin/js/jquery-1.8.0.min.js"></script>
        <script>
            $(document).ready(function(){
                
            });
        </script>
    </head>

    <body>
        <?php include "common_menu.php";?>
        <div id="right" style="background-color:#c4ccd3">
            <h3 style="margin:5px auto 5px 2.5%;">Reply</h3>
            <div id="content" style="background-color:#fff;width:92%;margin:auto;padding:20px;">
                <?php
                echo "<textarea style='width:100%;border:1px #CCC solid;border-radius:3px;font-size:14px;'>$row[adminMSG]</textarea>";
                ?>
            </div>
        </div>
    </body>
</html>
