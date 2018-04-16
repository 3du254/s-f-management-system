<?php
    session_start();
    $username_S=$_SESSION['username'];
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
        <title>welcome!!</title>
        <link href="../admin/css/css/font-awesome.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="../user/css/commonUser.css">
        <script src="../admin/js/jquery-1.8.0.min.js"></script>
    </head>
    <body>

        <?php include "../user/common_menu.php"; ?>
        <div style="background-color:rgba(0,0,0,.9);position:absolute;top:0;bottom:0;right:0;left:0;z-index:1">
            <div id="content">
               
                <form method="post" style="background-color:#fff; width:30vw;height:auto;margin:100px auto auto auto;padding:20px">
                    <div style="background-color:#56b3c2;padding:10px;"><i style="color:#fff;padding:10px;width:120%;margin:0 auto 5px auto"><strong>INFO!! </strong>your account will confirmed within 48hrs</i></div>
                    
                    <h3 style="margin:10px">Kenya seed company</h3>
                    <input type="text" name="username" value="<?php echo $firstName_S." ".$secondName_S;?>" readonly="readonly" style="display:block; width:95%; padding:10px;border-radius:3px; border:1px #CCC solid;margin-bottom:10px"/>

                    
                </form>
                
            </div>
        </div>
        <div id="right">
            <h2 style="color:blue;margin-left:20px;">Kenya seed company</h2>
            
        </div>


    </body>
</html>