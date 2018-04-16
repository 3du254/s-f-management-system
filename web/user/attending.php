<?php
    session_start();
    $farmerID=$_SESSION['farmerID'];
    require "../admin/dbConnect.php";
    $sql="SELECT * FROM sminar_attendance,seminar WHERE sminar_attendance.seminarID=seminar.seminarID AND seminar.status='0' AND sminar_attendance.farmerID='$farmerID'";
    $result=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
    <link href="css/commonUser.css" rel="stylesheet" type="text/css"/>
    <link href="../admin/css/css/font-awesome.min.css" rel="stylesheet" />
    <script src="../admin/js/jquery-1.8.0.min.js"></script>
    <script src="../admin/css/common.js"></script>
    <style>
        #right{
            background-color: #f1eeee;
        }
        #event_wrapper{
            background-color: #fff;
            margin: 0 auto 2vw 3vw;
            width: 17vw;
            height: auto;
            padding: 1.5vw;
            font-size: 14px;
            display: inline-block;
        }
        #event_wrapper .td_left_title{
            font-weight: bold;
            padding-right: 10px;
        }
        .btn_confirm{
            background-color: #6795da;
            margin: 1vw auto auto auto;
            width: 100%;
            border: none;
            border-radius: 3px;
            font-size: 12px;
        }
        .btn_confirm a{
            display: block;
            padding: 7px;
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
    <?php include "common_menu.php"; ?>
    
    <div id="right">
      <h2 style="margin-left:3vw;">Events confirmed for attendance</h2>
       <?php
            while($row=mysqli_fetch_array($result)){
                echo "<div id='event_wrapper'>";
                    echo "<table>";
                        echo "<tr><td class='td_left_title'>seminar</td><td>".$row['seminarID']."</td></tr>";
                        echo "<tr><td class='td_left_title'>seminar topic</td><td>".$row['seminar_topic']."</td></tr>";
                        echo "<tr><td class='td_left_title'>seminar venue</td><td>".$row['seminar_venue']."</td></tr>";
                        echo "<tr><td class='td_left_title'>Date</td><td>".$row['date']."</td></tr>";
                        echo "<tr><td class='td_left_title'>Time from</td><td>".$row['t_from']."</td></tr>";
                        echo "<tr><td class='td_left_title'>Time to</td><td>".$row['t_to']."</td></tr>";
                        echo "<tr><td class='td_left_title'>Speaker</td><td>".$row['seminar_speaker']."</td></tr>";
                    echo "</table>";
                    
                echo "<button class='btn_confirm''><a href='cancel.php?id=$row[2]'>cancel attendance</a></button>";
                echo "</div>";
                
            }
        ?>
    </div>
<body>
</body>
</html>
