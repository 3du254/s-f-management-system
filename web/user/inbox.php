<?php
session_start();
$farmerID_S=$_SESSION['farmerID'];
$firstName_S=$_SESSION['f_fname'];
$secondName_S=$_SESSION['f_sname'];
?>
<!--collect msg from msg-->
<?php
//get() msg
require "../admin/dbConnect.php";
$sql="SELECT * FROM user,message WHERE user.farmerID=message.farmerID AND message.adminMSG!='' AND message.farmerID='$farmerID_S' AND read_stat='0'";
$result=mysqli_query($con,$sql);


$result1=mysqli_query($con,$sql);
$row1=mysqli_fetch_array($result1);
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
                $(".btn_view").click(function(){
                    var msgID=$(this).attr('rel');
                    $.post('ajax.php', {'msgID' : msgID}, function(data){
                        alert(msgID);
                    });
                    $("#view_msg").show();
                });

                $(".close").click(function(){
                    $("#modal_bg").fadeOut();
                    $("#msg_modal").fadeOut();
                });
            });
        </script>
    </head>

    <body>
        <?php include "common_menu.php";?>
        <div id="right" style="background-color:#c4ccd3">
            <h3 style="margin:5px auto 5px 2.5%;">Support</h3>
            <div id="content" style="background-color:#fff;width:92%;margin:auto;padding:20px;">
                <?php
                while($row=mysqli_fetch_array($result)){
                    echo "<div style='background-color:#f7f6f6;border:1px #CCC solid;padding:10px;border-radius:3px;font-size:14px;margin-bottom:10px;'>message<br />";
                    
                    echo "<p>".$row['farmerMSG'];
                    echo "<a href='view_reply.php?msgID=$row[msgID]' rel='$row[msgID]' class='btn_view' style='text-decoration:none;border:none;background-color:#03729a;color:#fff;padding:3px 10px;border-radius:3px;margin-left:10px;'>view relpy</a></div>";
                    
                    $sql3="select * from message WHERE msgID=$row[msgID] AND adminMSG!=''";
                    $result3=mysqli_query($con,$sql3);
                    $row3=mysqli_fetch_array($result3);
                    
        

                        
                    
                }
                ?>
            </div>
        </div>
    </body>
</html>
