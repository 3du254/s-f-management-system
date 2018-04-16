<!--select from user and farm code-->
   <?php
    session_start();
    $farmerID_S=$_SESSION['farmerID'];
    require "../admin/dbConnect.php";
$sql="SELECT * FROM farm,user WHERE farm.farmerID=user.farmerID AND farm.farmerID='$farmerID_S'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
?>
<?php
$farmerID_S=$_SESSION['farmerID'];
require "../admin/dbConnect.php";
$sql_c="SELECT * FROM crop WHERE farmerID='$farmerID_S' AND active='0'";
$result_c=mysqli_query($con,$sql_c);
$row_c=mysqli_fetch_array($result_c);
?>
<!--maize phase1 codes planting-->
<?php
    require "../admin/dbConnect.php";
    if(isset($_POST['submit'])){
        //insert to archive
        $plant_date=$_POST['plant_date'];
        $breed=$_POST['breed'];
        $planting_fertilizer=$_POST['planting_fertilizer'];
        

        $sql2="INSERT INTO crop (farmerID,plant_date,breed,planting_fertilizer) Values('$farmerID_S','$plant_date', '$breed', '$planting_fertilizer')";
        mysqli_query($con,$sql2);
        echo "<meta http-equiv='refresh' content='0;url=crop.php'>";
    }

    
?>
<!--maize phase2 codes weeding1-->
<?php
require "../admin/dbConnect.php";
if(isset($_POST['submit1'])){
    $weeding1_date=$_POST['weeding1_date'];
    $weeding1_how=$_POST['weeding1_how'];


    $sql4="UPDATE crop SET weeding1_date='$weeding1_date',weeding1_how='$weeding1_how' WHERE cropID='$row_c[cropID]'";
    mysqli_query($con,$sql4);
    echo "<meta http-equiv='refresh' content='0;url=crop.php'>";
}
?>

<!--maize phase3 codes topdressing-->
<?php
require "../admin/dbConnect.php";
if(isset($_POST['submit2'])){
    $top_dressing_date=$_POST['top_dressing_date'];
    $top_dressing_fertilizer=$_POST['top_dressing_fertilizer'];


    $sql5="UPDATE crop SET top_dressing_date='$top_dressing_date',top_dressing_fertilizer='$top_dressing_fertilizer' WHERE cropID='$row_c[cropID]'";
    mysqli_query($con,$sql5);
    echo "<meta http-equiv='refresh' content='0;url=crop.php'>";
}
?>

<!--maize phase4 codes weeding2-->
<?php
require "../admin/dbConnect.php";
if(isset($_POST['submit3'])){
    $weeding2_date=$_POST['weeding2_date'];
    $weeding2_how=$_POST['weeding2_how'];


    $sql6="UPDATE crop SET weeding2_date='$weeding2_date',weeding2_how='$weeding2_how' WHERE cropID='$row_c[cropID]'";
    mysqli_query($con,$sql6);
    echo "<meta http-equiv='refresh' content='0;url=crop.php'>";
}
?>

<!--maize phase 5 harvesting codes-->
<?php
    require "../admin/dbConnect.php";
    if(isset($_POST['submit4'])){
        $harvesting_date=$_POST['harvesting_date'];
        $harvested_bags=$_POST['harvested_bags'];


        $sql7="UPDATE crop SET harvesting_date='$harvesting_date',harvested_bags='$harvested_bags' WHERE cropID='$row_c[cropID]'";
        mysqli_query($con,$sql7);
        echo "<meta http-equiv='refresh' content='0;url=crop.php'>";
}
?>
<!--select from crop code-->
<?php
 $farmerID_S=$_SESSION['farmerID'];
    require "../admin/dbConnect.php";
$sqll="SELECT * FROM crop WHERE farmerID='$farmerID_S' AND active='0'";
    $result3=mysqli_query($con,$sqll);
    $row3=mysqli_fetch_array($result3);
?>

<!--soghum codes--------------------------------------------------------------------------------------->
<!--soghum phase1 codes planting-->
<?php
require "../admin/dbConnect.php";
if(isset($_POST['submit_s'])){
    //insert to archive
    $plant_date=$_POST['plant_date'];
    $planting_fertilizer=$_POST['planting_fertilizer'];


    $sql2="INSERT INTO crop (farmerID,plant_date,planting_fertilizer) Values('$farmerID_S','$plant_date', '$planting_fertilizer')";
    mysqli_query($con,$sql2);
    echo "<meta http-equiv='refresh' content='0;url=crop.php'>";
}
?>
<!--sogum phase 2 harvesting codes-->
<?php
require "../admin/dbConnect.php";
if(isset($_POST['submit_s2'])){
    $harvesting_date=$_POST['harvesting_date'];
    $harvested_bags=$_POST['harvested_bags'];


    $sql7="UPDATE crop SET harvesting_date='$harvesting_date',harvested_bags='$harvested_bags' WHERE cropID='$row_c[cropID]'";
    mysqli_query($con,$sql7);
    echo "<meta http-equiv='refresh' content='0;url=crop.php'>";
}
?>
<!--wheat codes--------------------------------------------------------------------------------------->
<!--wheat phase1 codes planting-->
<?php
require "../admin/dbConnect.php";
if(isset($_POST['submit_w'])){
    //insert to archive
    $plant_date=$_POST['plant_date'];
    $planting_fertilizer=$_POST['planting_fertilizer'];


    $sql2="INSERT INTO crop (farmerID,plant_date,planting_fertilizer) Values('$farmerID_S','$plant_date', '$planting_fertilizer')";
    mysqli_query($con,$sql2);
    echo "<meta http-equiv='refresh' content='0;url=crop.php'>";
}
?>
<!--wheat phase 2 harvesting codes-->
<?php
require "../admin/dbConnect.php";
if(isset($_POST['submit_w2'])){
    $harvesting_date=$_POST['harvesting_date'];
    $harvested_bags=$_POST['harvested_bags'];


    $sql7="UPDATE crop SET harvesting_date='$harvesting_date',harvested_bags='$harvested_bags' WHERE cropID='$row_c[cropID]'";
    mysqli_query($con,$sql7);
    echo "<meta http-equiv='refresh' content='0;url=crop.php'>";
}
?>
<!--end season codes-->
<?php
require "../admin/dbConnect.php";
if(isset($_POST['submit_end'])){
    $sql7="UPDATE crop SET active='1' WHERE cropID='$row_c[cropID]'";
    mysqli_query($con,$sql7);
    echo "<meta http-equiv='refresh' content='0;url=crop.php'>";
}
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
    <link href="../admin/css/css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/commonUser.css">
    <script src="../admin/js/jquery-1.8.0.min.js"></script>
    <style>
        .i_info{
            border-radius: 3px;
            color: #fff;
            margin: auto;
            width: 95%;
            display: block;
            background-color:#12a545 ;
            padding: 10px;
            font-size: 14px;
        }
        form{
            width: 95%;
            margin: auto;
            padding: 10px;
            display: block;
            background-color: #fff;
            font-size: 14px;
            border-radius: 3px;
        }
        #crop_wrapper input[type=text],input[type=date],select{
            padding: 5px;
            width: 150%;
            margin: auto auto 5px 10px;
            border: solid 1px #ccc;
            border-radius: 3px;
        }
        #crop_wrapper input[type=submit]{
            margin-left: 10px;
            padding: 7px 15px;
            background-color:#03729a;
            color: #fff;
            border: none;
            border-radius: 3px;
        }
    </style>
</head>
    <?php  include "common_menu.php" ?>
    <div id="right" style="background-color:#c4ccd3">
       <h2 style="margin-left:2vw;"><?php echo $row['crop'] ?> progress</h2>
      <div id="crop_wrapper">
          <!--show completed phases codes-->
          <?php
    
          ?>
        <!--maize codes-------------------------------------------------------------------------------->
        
         <?php 
        if($row['crop']=="maize"){ 
            
            
            if($row3['plant_date']!=0000-00-00){
                echo "<i class='i_info'><strong>NOTE!! </strong>Planting phase completed on ".$row3['plant_date']."</i>,<br/>";
            }
            if($row3['weeding1_date']!=0000-00-00){
                echo "<i class='i_info'><strong>NOTE!! </strong>first weeding phase completed on ".$row3['weeding1_date']."</i> <br/>";
            }
            if($row3['top_dressing_date']!=0000-00-00){
                echo "<i class='i_info'><strong>NOTE!! </strong>top dressing phase completed on ".$row3['top_dressing_date']."</i> <br/>";
            }
            if($row3['weeding2_date']!=0000-00-00){
                echo "<i class='i_info'><strong>NOTE!! </strong>second weeding phase completed on ".$row3['weeding2_date']."</i> <br/>";
            }
            if($row3['harvesting_date']!=0000-00-00){
                echo "<i class='i_info'><strong>NOTE!! </strong>harvesting phase completed on ".$row3['harvesting_date']."</i> <br/>";
            }

            
            
            include "maize_codes.php";?>
                       
          
          
          <!--wheat codes------------------------------------------------------------------------------------>
          <?php }elseif($row['crop']=="wheat"){
            
            if($row3['plant_date']!=0000-00-00){
                echo "<i class='i_info'><strong>NOTE!! </strong>Planting phase completed on ".$row3['plant_date']."</i>,<br/>";
            }if($row3['harvesting_date']!=0000-00-00){
                echo "<i class='i_info'><strong>NOTE!! </strong>harvesting phase completed on ".$row3['harvesting_date']."</i> <br/>";
            }

            
            include "wheat_codes.php"?>
          
          
          
          <!--soghum codes------------------------------------------------------------------------------>
          <?php }else{ 
            
            if($row3['plant_date']!=0000-00-00){
                echo "<i class='i_info'><strong>NOTE!! </strong>Planting phase completed on ".$row3['plant_date']."</i>,<br/>";
            }if($row3['harvesting_date']!=0000-00-00){
                echo "<i class='i_info'><strong>NOTE!! </strong>harvesting phase completed on ".$row3['harvesting_date']."</i> <br/>";
            }
            include "soghum_codes.php";?>
                    <?php }?>
      </div>  
    </div>
<body>
</body>
</html>
