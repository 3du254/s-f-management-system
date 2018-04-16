<!--view farmers attending-->
<?php
require "dbConnect.php";
$seminarID=$_GET['id'];
$sql="SELECT * FROM sminar_attendance,user WHERE sminar_attendance.farmerID=user.farmerID AND sminar_attendance.seminarID='$seminarID'";
$result=mysqli_query($con,$sql);

//get seminar name
$sql1="SELECT * FROM seminar WHERE seminarID='$seminarID'";
$result1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($result1);
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link href="css/css/font-awesome.css" rel="stylesheet" />
    <script src="js/jquery-1.8.0.min.js"></script>
    <script src="css/common.js"></script>
    <style>
        #wrapperR{
            background-color: #e6eaee;
        }
        #content{
            background-color: #FFF;
            width: 47%;
            margin: auto auto auto 2vw;
            padding: 30px;
        }
        #content table{
            border-collapse: collapse;
            width: 100%;
        }
        #content th,td{
            padding: 10px;
        }
        #content th{
            font-size: 16px;
            color: #666;
            border-bottom: 2px solid #ccc;
        }
        #content td{
            font-size: 14px;
            color: #000;
            border-top: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <script src="../employee/js/print.js"></script>
    <?php include "common_menu.php"; ?>
    <div id="wrapperR" style="background-color:">
       
        <button style="padding:5px 15px;background-color:#08578b;color:#fff;border-radius:3px;border:none;margin:30px auto auto 27px;" onclick="PrintDiv();">Print</button>
        
       <h3 style="margin-left:2vw;">View attendance</h3>
        <div id="content">
           <h3 style="margin:0px;border-bottom:2px solid #ccc; padding:10px; color:#999"><?php echo $row1['seminar_topic'] ?> <small>farmers attending</small></h3>
            <table>
               
                <thead><tr><th>Farmer ID</th> <th>First name</th> <th>Second name</th> <th>Location</th> <th>mobile number</th> </tr></thead>
                <?Php
                while($row=mysqli_fetch_array($result))
                    echo "<tr> <td>$row[farmerID]</td> <td>$row[firstName]</td> <td>$row[secondName]</td> <td>$row[Location]</td> <td>$row[mobileNo]</td></tr>"
                ?>
            </table>
        </div>
    </div>
</body>
</html>
