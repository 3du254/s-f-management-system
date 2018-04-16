<!--check stock-->
<?php
require "../admin/dbConnect.php";
$stock_res=mysqli_query($con,"select * FROM seed WHERE seedID='4'");
$stock_row=mysqli_fetch_array($stock_res);
?>

<!--seed application-->
<?php
session_start();
$farmerID_S=$_SESSION['farmerID'];
include "../admin/shout.php";
require "../admin/dbConnect.php";
if(isset($_POST['submit'])){
    $maizeQTY=$_POST['maizeQTY'];
    $breed=$_POST['breed'];
    $stock_remQTY=$stock_row['maizeQTY']-$maizeQTY;
    $stock_remQTY1=$stock_row['maizeQTY1']-$maizeQTY;

    if($breed==0){
        if($maizeQTY<=$stock_row['maizeQTY']){
            $sql="INSERT INTO seed(farmerID,maizeQTY) VALUES('$farmerID_S','$maizeQTY')";
            mysqli_query($con,$sql);
            mysqli_query($con,"UPDATE seed SET maizeQTY='$stock_remQTY' WHERE seedID='4'");

            shout("application successfull");
        }else{
            shout("application fails!! exceed quantity of HB-213 in stock");
        }   
    }else{
        if($maizeQTY<=$stock_row['maizeQTY1']){
            $sql="INSERT INTO seed(farmerID,maizeQTY1) VALUES('$farmerID_S','$maizeQTY')";
            mysqli_query($con,$sql);
            mysqli_query($con,"UPDATE seed SET maizeQTY1='$stock_remQTY1' WHERE seedID='4'");
            shout("application successfull");
        }else{
            shout("application fails!! exceed quantity of HB-213 in stock");
        }
    }
    }
    
?>

<!--check if application is active-->
<?php
require "../admin/dbConnect.php";
$application_res=mysqli_query($con,"select * FROM seed WHERE farmerID='$farmerID_S'");
$application_count=mysqli_num_rows($application_res);
$application_row=mysqli_fetch_array($application_res);
?>

<!--seed reapplication-->
<?php
if(isset($_POST['submit1'])){
$maizeQTY=$_POST['maizeQTY'];
$breed=$_POST['breed'];
$stock_remQTY=$stock_row['maizeQTY']-$maizeQTY;
$stock_remQTY1=$stock_row['maizeQTY1']-$maizeQTY;

if($breed==0){
if($maizeQTY<=$stock_row['maizeQTY']){
                        
    $sql="UPDATE seed SET maizeQTY='$maizeQTY', cancel='0', maizeQTY1='0' WHERE seedID='$application_row[seedID]'";
                         mysqli_query($con,$sql);
                         mysqli_query($con,"UPDATE seed SET maizeQTY='$stock_remQTY' WHERE seedID='4'");

                         shout("application successfull");
                         }else{
                         shout("application fails!! exceed quantity of HB-213 in stock");
                         }   
                         }else{
                         if($maizeQTY<=$stock_row['maizeQTY1']){
$sql="UPDATE seed SET maizeQTY1='$maizeQTY1',cancel='0', maizeQTY='0' WHERE seedID='$application_row[seedID]'";
mysqli_query($con,$sql);
mysqli_query($con,"UPDATE seed SET maizeQTY1='$stock_remQTY1' WHERE seedID='4'");
shout("application successfull");
}else{
shout("application fails!! exceed quantity of HB-213 in stock");
}
}
}
?>

<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>farmer home</title>
        <link href="../admin/css/css/font-awesome.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="css/commonUser.css">
        <script src="../admin/js/jquery-1.8.0.min.js"></script>
    </head>
    <style>
        
    </style>
    <body>

        <?php include "common_menu.php"; ?>

        <div id="right" style="background-color:#c4ccd3">
            <h2 style="color:blue;margin-left:2.5%;">Crop / Seed application</h2>
            <div id="content" style="background-color:#fff;width:91%;margin:auto;padding:2%">
                <?php if($application_count<1){ 
                ?>
                <table>
                    <form method="post">
                        <tr> <td>Crop</td> <td><input type="text" name="progress" value="maize" readonly="readonly"/> </td> </tr>

                        <tr> <td>maize breed</td> <td><select name="breed">
                            <option value="0">HB-213</option>
                            <option value="1">B-218</option>
                            </select> </td> </tr>
                        <tr> <td>HB-213 In stock(50kg bags)</td> <td><input type="text" name="stock" value="<?php echo $stock_row['maizeQTY'] ?>" readonly="readonly"/> </td> </tr>
                        <tr> <td>B-218 In stock(50kg bags)</td> <td><input type="text" name="stock" value="<?php echo $stock_row['maizeQTY1'] ?>" readonly="readonly"/> </td> </tr>
                        <tr> <td>Quantity(50kg bags)</td> <td><input type="text" name="maizeQTY" placeholder="number of bags" required/> </td> </tr>
                        <tr> <td></td><td><input type="submit" name="submit" value="submit" /> </td> </tr> 
                    </form>

                </table>
                <?php } else{
                        if($application_row['active']==1){
                            echo "application confirmed, ready for collection";
                        }elseif($application_row['cancel']==1){
                            echo "application not successful reapply";
                            ?>
                <table>
                    <form method="post">
                        <tr> <td>Crop</td> <td><input type="text" name="progress" value="maize" readonly="readonly"/> </td> </tr>

                        <tr> <td>maize breed</td> <td><select name="breed">
                            <option value="0">HB-213</option>
                            <option value="1">B-218</option>
                            </select> </td> </tr>
                        <tr> <td>HB-213 In stock(50kg bags)</td> <td><input type="text" name="stock" value="<?php echo $stock_row['maizeQTY'] ?>" readonly="readonly"/> </td> </tr>
                        <tr> <td>B-218 In stock(50kg bags)</td> <td><input type="text" name="stock" value="<?php echo $stock_row['maizeQTY1'] ?>" readonly="readonly"/> </td> </tr>
                        <tr> <td>Quantity(50kg bags)</td> <td><input type="text" name="maizeQTY" placeholder="number of bags" required/> </td> </tr>
                        <tr> <td></td><td><input type="submit" name="submit1" value="submit" /> </td> </tr> 
                    </form>

                </table>
                            <?php
                        }else{
                            echo "seed application pending... confirmation to be done within 24hrs";
                        }
                        
                    
                } ?>
            </div>
        </div>


    </body>
</html>