
<!--show stock code-->
<?php
include "shout.php";
require "dbConnect.php";
$stock_res=mysqli_query($con,"select * FROM seed WHERE seedID='4'");
$stock_row=mysqli_fetch_array($stock_res);
?>

<!--add stock codes-->
<?php
if(isset($_POST['submit'])){
    $maizeQTY=$_POST['maizeQTY'];
    $maizeQTY1=$_POST['maizeQTY1'];
    $soghumQTY=$_POST['soghumQTY'];
    $wheatQTY=$_POST['wheatQTY'];
    $sql1=mysqli_query($con,"UPDATE seed SET maizeQTY='$maizeQTY',maizeQTY1='$maizeQTY1',soghumQTY='$soghumQTY',wheatQTY='$wheatQTY' WHERE seedID='4'");
    if($sql1){
    shout("stock added");
    }
}

?>
<!--Show applicants-->
<?php
$applic_res=mysqli_query($con,"SELECT * FROM seed,user WHERE user.farmerID=seed.farmerID AND seed.farmerID!=0");
$applic_count=mysqli_num_rows($applic_res);
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
        <style>
            #content td{
                padding: 10px 10px;
                border-top: 1px #b9c9c9 solid;
                color: #535e5e;
                font-size: 14px;
            }
            #content th{
                padding: 6px 10px;
                
            }
            #content td a{
                padding: 6px;
                color: #fff;
                text-decoration: none;
                border-radius: 3px;
                font-size: 12px;
            }
            label{
                font-size: 14px;
            }
        </style>
    </head>

    <body>
        <?php include "common_menu.php";?>
        <div id="wrapperR" style="background-color:#e5eaea">
            <div id="content" style="background-color:#fff;padding:2vw;margin:5vh 2vw auto 2vw;">
                <form method="post">
                    <label>maize HB-213</label><input type="text" name="maizeQTY" value="<?php echo $stock_row['maizeQTY'];?>" style="padding:5px; margin-bottom:2vh" required/>
                    <label>maize B-218</label><input type="text" name="maizeQTY1" value="<?php echo $stock_row['maizeQTY1'];?>" style="padding:5px; margin-bottom:2vh" required/>
                    <label>soghum</label><input type="text" name="soghumQTY" value="<?php echo $stock_row['soghumQTY'];?>" style="padding:5px; margin-bottom:2vh" required/>
                    <label>wheat</label><input type="text" name="wheatQTY" value="<?php echo $stock_row['wheatQTY'];?>" style="padding:5px; margin-bottom:2vh" required/>
                    <input type="submit" name="submit" value="add stock" style="padding:7px 15px; margin-left:1vw;color:#fff; background-color:#0d6be7;border:none; border-radius:2px;"/>
                </form>


                <?php
                if($applic_count>0){
                    echo "<table style='border-collapse: collapse'>";

                    echo "<tr>  <th>#</th> <th>farmer Name</th> <th>Quantity(<i>50 kg bags</v>)</th> <th style='column-span:2;text-align:right;'>Action</th>   </tr>";
                
                    while($applic_row=mysqli_fetch_array($applic_res)){

                        echo "<tr>  <td>$applic_row[farmerID]</td> <td>".$applic_row['firstName']." ".$applic_row['secondName']."</td>";
                        echo "<td>";
                            $qry=mysqli_query($con,"SELECT * FROM farm WHERE farmerID=$applic_row[farmerID] AND farmNo!='0'");
                            $row=mysqli_fetch_array($qry);
                            if($row['crop']=='maize'){
                                if($applic_row['maizeQTY1']==0){
                                    echo $applic_row['maizeQTY']." bags of maize(HB-213)";
                                }else{
                                    echo $applic_row['maizeQTY1']." bags of maize(B-218)";
                                }
                                
                            }elseif($row['crop']=='soghum'){
                                    echo $applic_row['soghumQTY']." bag of soghum";
                            }elseif($row['crop']=='wheat'){
                                        echo $applic_row['wheatQTY']." bag of wheat";
                            }
                        echo "</td>";
                            
                        echo "<td style='text-align:center'>";
                        if($applic_row['active']==0&&$applic_row['cancel']==0){
                        echo "<a href='confirm_seed.php?id=$applic_row[farmerID]' style='background-color:#0bba80;'>confirm</a></td> <td style='text-align:center'>";
                        echo "<a href='cancel_seed.php?id=$applic_row[farmerID]' style='background-color:#c13838'>cancel</a></td></tr>";
                        }
                            elseif($applic_row['cancel']==1){
                                echo "canceled";}
                            elseif($applic_row['active']==1){
                                echo "confirmed";}

                    }
                    echo "</table>";
                }else{
                    echo "no applicants";
                }
                
                ?>

            </div>
        </div>

    </body>
</html>
