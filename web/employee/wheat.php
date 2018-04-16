<?php
require "../admin/dbConnect.php";
$sql="SELECT * from farm,user WHERE user.farmerID=farm.farmerID AND farm.crop='wheat'";
$result=mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/common_emp.css" />
        <link href="../admin/css/css/font-awesome.css" rel="stylesheet" />
        <script src="../admin/js/jquery-1.8.0.min.js"></script>
        <script src="../admin/css/common.js"></script>
        <style>
            #content td{
                border-top: 1px #ccc solid;
                padding: 7px 15px;
                font-size: 15px;
            }
            #content th{
                border-bottom: 1.7px #ccc solid;
                padding: 7px 15px;
            }
        </style>
    </head>

    <body>
        <script src="js/print.js"></script>
        <?php include "common_menu.php";?>
        <div id="wrapperR" style="background-color:#c4ccd3">
           
            <button style="padding:5px 15px;background-color:#08578b;color:#fff;border-radius:3px;border:none;margin:30px auto auto 27px;" onclick="PrintDiv();">Print</button>
           
            <div id="content" style="background-color:#fff; padding:20px; width:70%; margin:5vh auto auto 2vw;">
                <h3 style="margin:0px auto 0px 0; padding:3px;border-bottom:1px solid #e3e6e7;width:97%">Wheat farmers</h3>
                <table style="border-collapse: collapse">

                    <thead><tr> <th>#</th> <th>First name</th> <th>Second name</th> <th>Location</th> <th>Farm number</th> <th>harvested</th> <th>progress</th> </tr></thead>
                    <?php
                    $total=0;
                    while($row=mysqli_fetch_array($result)){
                        echo "<tr> <td>$row[farmerID]</td> <td>$row[firstName]</td> <td>$row[secondName]</td> <td>$row[Location]</td> <td>$row[farmNo]</td> <td>";
                    $get_b_qry=mysqli_query($con,"SELECT * FROM crop WHERE farmerID='$row[farmerID]'");
                    $get_bags_row=mysqli_fetch_array($get_b_qry);
                    if($get_bags_row['harvested_bags']==0){
                            echo "not yet harvested";
                        }else{
                            echo $get_bags_row['havested_bags'];
                        }
                    echo "</td> <td><a href='progress.php?id=$row[farmerID]' style='text-decoration:none; background-color:#03729a;color:#fff; padding:3px 15px;font-size:14px;border-radius:3px;'>view</a> </td></tr>";
                        $total=$total+$get_bags_row['harvested_bags'];
                    }
                    ?>
                    
                    <td></td><td></td><td></td><td></td><td><strong>Total</strong></td><td><?php echo $total." bags"; ?></td><td></td>
                </table>
            </div>
        </div>
    </body>
</html>
