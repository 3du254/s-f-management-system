<?php
    $farmerID=$_GET['id'];
    require "../admin/dbConnect.php";
    $sql="SELECT * FROM crop,user WHERE crop.farmerID=user.farmerID AND crop.farmerID='$farmerID'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
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
        .tb_content{
            display: block;
            font-size: 14px;
            padding: 5px;
            width: 95%;
            margin: auto auto 10px auto;
        }
        #content i{
            font-size: 14px;
            margin-left: 2.5%;
        }
        #content td{
            padding-left: 15px;
        }
    </style>
</head>

<body>
    <?php include "common_menu.php";?>
    <div id="wrapperR" style="background-color:#c4ccd3">
        <h3 style="margin-left:2.5%;">Farmer:<?php echo " ".$row['firstName'] ." ".$row['secondName'];?></h3>
        <div id="content">
            <?php
                if(mysqli_num_rows($result)<1){
                    echo "<i style='margin-left:2.5%;'><strong style='color:#a1732a'>NOTE!! </strong>farmer haven't started planting</i>";
                }else{
                    if($row['plant_date']!=0000-00-00){
                        echo "
                            <table class='tb_content' style='background-color:#fff;'>
                             <tr><td style='font-weight:bold'>Planting</td></tr>
                             <tr><td>status</td> <td style='color:#0ef024; font-style:italic'>Completed</td></tr>
                             <tr><td>date of completion</td> <td>$row[plant_date]</td></tr>
                             <tr><td>maize breed</td> <td>$row[breed]</td></tr>
                             <tr><td>fertilizer</td> <td>$row[planting_fertilizer]</td></tr>
                            </table>
                        ";
                    }else{echo "<i><strong>planting status </strong>Not started</i><br />";}
                    if($row['weeding1_date']!=0000-00-00){
                        echo "
                            <table class='tb_content' style='background-color:#fff; ;'>
                             <tr><td style='font-weight:bold'>First weeding</td></tr>
                             <tr><td>status</td> <td style='color:#0ef024; font-style:italic'>Completed</td></tr>
                             <tr><td>date of completion</td> <td>$row[weeding1_date]</td></tr>
                             <tr><td>done by</td> <td>$row[weeding1_how]</td></tr>
                            </table>
                        ";
                    }else{echo "<i><strong>First weeding status </strong>Not started</i><br />";}
                    
                    if($row['top_dressing_date']!=0000-00-00){
                        echo "
                            <table class='tb_content' style='background-color:#fff; '>
                             <tr><td style='font-weight:bold'>Top dressing</td></tr>
                             <tr><td>status</td> <td style='color:#0ef024; font-style:italic'>Completed</td></tr>
                             <tr><td>date of completion</td> <td>$row[top_dressing_date]</td></tr>
                             <tr><td>fertilizer</td> <td>$row[top_dressing_fertilizer]</td></tr>
                            </table>
                        ";
                    }else{echo "<i><strong>Top dressing status </strong>Not started</i><br />";}
                    
                    if($row['weeding2_date']!=0000-00-00){
                        echo "
                            <table class='tb_content' style='background-color:#fff; '>
                             <tr><td style='font-weight:bold'>Second weeding</td></tr>
                             <tr><td>status</td> <td style='color:#0ef024; font-style:italic'>Completed</td></tr>
                             <tr><td>date of completion</td> <td>$row[weeding2_date]</td></tr>
                             <tr><td>done by</td> <td>$row[weeding2_how]</td></tr>
                            </table>
                        ";
                    }else{echo "<i><strong>Top dressing status </strong>Not started</i><br />";}
                    
                    if($row['harvesting_date']!=0000-00-00){
                        echo "
                            <table class='tb_content' style='background-color:#fff; '>
                             <tr><td style='font-weight:bold'>Harvesting</td></tr>
                             <tr><td>status</td> <td style='color:#0ef024; font-style:italic'>Completed</td></tr>
                             <tr><td>date of completion</td> <td>$row[harvesting_date]</td></tr>
                             <tr><td>harvested bags</td> <td>$row[harvested_bags]</td></tr>
                            </table>
                        ";
                    }else{echo "<i><strong>Harvesting status </strong>Not started</i><br />";}
                }
            ?>
        </div>
    </div>
</body>
</html>
