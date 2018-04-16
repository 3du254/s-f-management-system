<?php
    session_start();
    $farmerID_S=$_SESSION['farmerID'];
    //get max
    require "../admin/dbConnect.php";
    $sql="SELECT MAX(seminarID) from seminar";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
    $maxID=$row[0];
    
    //select active seminar
        $sql2="SELECT * FROM seminar where status='0'";
        $result2=mysqli_query($con,$sql2);
    
?>
<!--attendance confirm codes-->
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
    
    <style type="text/css">
        #right{
            background-color: #f1eeee;
        }
        #event_wrapper{
            background-color: #fff;
            margin: 0 auto 2vw 3vw;
            width: 20vw;
            height: auto;
            padding: 2vw;
            font-size: 14px;
            display: inline-block;
        }
        #event_wrapper .td_left_title{
            font-weight: bold;
            padding-right: 15px;
        }
        .btn_confirm{
            background-color: #6795da;
            margin: 1.5vw auto auto 4.5vw;
            border: none;
            border-radius: 3px;
            font-size: 12px;
        }
        .btn_confirm a{
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
        }
        
    </style>
    
</head>

<body>
    <?php include "common_menu.php"; ?>
    <div id="right">
     <h2 style="color:#6f9ee6;margin:2vh auto 2vh 3vw;">Seminar</h2>
          <?php
            
        while($row2=mysqli_fetch_array($result2)){
                    
                    echo "<div id='event_wrapper'>";
                    echo "<table>";
                    echo "<tr><td class='td_left_title'>seminar</td><td>".$row2['seminarID']."</td></tr>";
                    echo "<tr><td class='td_left_title'>seminar topic</td><td>".$row2['seminar_topic']."</td></tr>";
                    echo "<tr><td class='td_left_title'>seminar venue</td><td>".$row2['seminar_venue']."</td></tr>";
                    echo "<tr><td class='td_left_title'>Date</td><td>".$row2['date']."</td></tr>";
                    echo "<tr><td class='td_left_title'>Time from</td><td>".$row2['t_from']."</td></tr>";
                    echo "<tr><td class='td_left_title'>Time to</td><td>".$row2['t_to']."</td></tr>";
                    echo "<tr><td class='td_left_title'>Speaker</td><td>".$row2['seminar_speaker']."</td></tr>";
                    echo "</table>";
            
                    $sql3="SELECT * FROM sminar_attendance WHERE seminarID=$row2[seminarID] AND farmerID='$farmerID_S'";
                    $result3=mysqli_query($con,$sql3);
                    if(mysqli_num_rows($result3)>0){
                        echo "<div style='background-color:#f69e21; padding:10px;color:white;margin-top:15px;'><strong>INFO!</strong> attendance confirmed</div>";
                    }else{
                        echo "<button class='btn_confirm'><a href='confirm.php?id=$row2[0]'>confirm attendance</a></button>";
                    }
            
                    
                
            
                    echo "</div>";
            }
          ?>
      </div>
    </div>
</body>
</html>
