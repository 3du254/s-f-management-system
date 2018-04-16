<?php
session_start();
$farmerID_S=$_SESSION['farmerID'];
$firstName_S=$_SESSION['f_fname'];
$secondName_S=$_SESSION['f_sname'];
?>
<!--send message codes-->
<?php
require "../admin/dbConnect.php";
if(isset($_POST['submit'])){
    $farmerID_S=$_SESSION['farmerID'];
    $farmerMSG=$_POST['farmerMSG'];

    $sql="INSERT INTO message(farmerID,farmerMSG) VALUE ('$farmerID_S','$farmerMSG')";
    mysqli_query($con,$sql);
}
?>

<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>farmer support</title>
        <link href="../admin/css/css/font-awesome.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="../user/css/commonUser.css">
        <script src="../admin/js/jquery-1.8.0.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".btn_msg").click(function(){
                    $("#modal_bg").fadeIn();
                    $("#msg_modal").slideDown("fast");
                });
                
                $(".close").click(function(){
                    $("#modal_bg").fadeOut();
                    $("#msg_modal").fadeOut();
                });
            });
            
            
        </script>
        <style>
            #content p{
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        
        <?php include "../user/common_menu.php"; ?>
        <div id="right" style="background-color:#c4ccd3">
            <h3 style="color:blue;margin-left:20px;">support</h3>
            <div id="content" style="background-color:#fff;padding:20px;">
                <h4>need assistance? contant us</h4>
                <p><strong>email</strong> ksc@support.co.ke</p>
                <p><strong>Tel</strong> +254700121212</p>
                <p><i class="fa fa-facebook-official" style="color:blue"> </i> kenya seed support</p>
                <p><i class="fa fa-twitter" style="color:#2bc7d8"> </i> @kenya_seed_support</p>
                <p>or</p>
                <button class="btn_msg" style="padding:7px 20px; background-color:#0666a6;color:#fff;border:none;">send us a message</button>
            </div>
            <div id="msg"></div>
            
        </div>
        
        <!--modal code-->
        <div id="modal_bg" class="close" style="background-color:rgba(0,0,0,.9);position:absolute;top:0;bottom:0;right:0;left:0;display:none">    
            </div>
        
        <div id="msg_modal" style="display:none;z-index:1;position:absolute;left:34vw">
        <form method="post" style="background-color:#fff; width:30vw;height:auto;margin:100px auto auto auto;padding:20px;">
            <div style="background-color:#56b3c2;padding:10px;"><i style="color:#fff;padding:10px;width:120%;margin:0 auto 5px auto"><strong>INFO!! </strong>we will get back at you within 24hrs</i></div>

            <h3 style="margin:10px">need assistance? contact us</h3>
            <input type="text" name="username" value="<?php echo $firstName_S." ".$secondName_S;?>" readonly="readonly" style="display:block; width:95%; padding:10px;border-radius:3px; border:1px #CCC solid;margin-bottom:10px"/>
            <textarea name="farmerMSG" placeholder="Message" style="display:block;width:95%;padding:10px;height:20vh;border-radius:3px; border:1px #CCC solid;margin-bottom:10px"></textarea>
            <input type="submit" name="submit" style="padding:8px 15px"/>
        </form>
        </div>
    </body>
</html>