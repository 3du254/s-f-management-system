<!--post new seminar-->
<?php
    require "dbConnect.php";
    if(isset($_POST['submit'])){
        $seminar_topic=$_POST['seminar_topic'];
        $seminar_venue=$_POST['seminar_venue'];
        $date=$_POST['date'];
        $t_from=$_POST['t_from'];
        $t_to=$_POST['t_to'];
        $seminar_speaker=$_POST['seminar_speaker'];
      $sql="INSERT INTO seminar(seminar_topic,seminar_venue,date,t_from,t_to,seminar_speaker) VALUES('$seminar_topic','$seminar_venue','$date','$t_from','$t_to','$seminar_speaker')";
        mysqli_query($con,$sql);
        echo "<div id='alert'><p><strong>Success!!</strong> Event post successful<span class='close'>x</span></div>";
    }
?>
<!--active event-->
<?php
    require "dbConnect.php";
    $sql2="SELECT * from seminar WHERE status='0'";
    $result1=mysqli_query($con,$sql2);
    
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link href="css/css/font-awesome.css" rel="stylesheet" />
    <script src="js/jquery-1.8.0.min.js"></script>
    <script src="css/common.js"></script>
    <title></title>
</head>
<style>
    #content{
        margin: 7vh auto auto 2.5vw;
        font-size: 14px;
        background-color: #fff;
        width: 20%;
        height: auto;
        padding: 2vw;
        display: inline-block;
    }
    #content td{
        font-size: 14px;
    }
    .td_bold{
        font-weight: bold;
    }
    /*wrapper right*******************************************************************************/
    .view_all{
        text-decoration: none;
        border: none;
        background-color: #FFF;
        color: blue;
        margin-left: 2px;
        outline: none;
    }
    .view_all:hover{
        color: cornflowerblue;
    }
    #attendance{
        width: 100%;
        margin-top: 10px;
        border-top: 1px solid #999;
        padding: 10px 0 0 0;
    }
    #attendance label{
        font-size: 14px;
        margin-right: 5px;
    }
    #wrapperR{
        background-color: #e6eaee;
    }
    
    /*modal*************************************************************************************/
    #modal_bg{
        cursor:pointer;
        display:none;
        position:fixed;
        width:100vw;
        height:100vh;
        background-color:rgba(0,0,0,.6);
        top:0;
        left:0;
    }
    #post_event_modal{
        position: absolute;
        display: none;
        width: 26vw;
        height: auto;
        background-color: #FFF;
        left: 35vw;
        top: 20vh;
        padding: 2vw;
    }
    #modal_top{
        width: 25.5vw;
        padding-bottom: 2vh;
    }
    #modal_top span{
        cursor: pointer;
        float: right;
        font-weight: bold;
    }
    #modal_top span:hover{
        color: #999;
    }
    #post_event_modal input[type=text],[type=date]{
        width: 25vw;
        padding: 10px;
        border: 1px #ccc solid;
        margin-bottom: 1.5vh;
        border-radius: 4px;
    }
    #post_event_modal input[type=time]{
        float: right;
        border: 1px #ccc solid;
        border-radius: 4px;
        width: 70%;
        padding: 5px;
        margin-bottom: 1.5vh;
    }
    #post_event_modal label{
        position: absolute;
        margin-top: 10px;
        font-size: 14px;
        color: #666;
    }
    #post_event_modal input[type=submit]{
        width: 100%;
        padding: 15px;
        background-color: cornflowerblue;
        color: beige;
        border: none;
        border-radius: 4px;
        font-size: 14px;
    }
    .post_event{
        position: absolute;
        padding: 8px;
        background-color: dodgerblue;
        color: beige;
        border: none;
        border-radius: 3px;
        margin-left: 2.5vw;
        cursor: pointer;
    }
    #alert{
        width: 30vw;
        background-color: #13d286;
        position: absolute;
        color:cornsilk;
        padding: 1px 10px;
        left: 16.5vw;
        top: 20vh;
        font-size: 14px;
        border-radius: 3px;
        z-index: 1;
        
    }
    #alert span{
        float: right;
        cursor: pointer;
        font-size: 14px;
        font-weight: bolder;
        cursor: pointer;
    }
    /*view attendance*/
    #view_modal{
        display: none;
        padding: 15px 30px;
        position: absolute;
        background-color: #FFF;
        width: 40vw;
        height: auto;
        left: 30vw;
        top: 20vh;
    }
    #modal_view_top{
        width: 40vw;
    }
    #modal_view_top span{
        float: right;
    }
    
    </style>
<body>
    <?php include "common_menu.php"; ?>
<script>
    $(document).ready(function(){
        $(".post_event").click(function(){
            $("#modal_bg").fadeIn();
            $("#post_event_modal").show();
        });
        $(".close").click(function(){
            $("#modal_bg").fadeOut();
            $("#post_event_modal").fadeOut();
            $("#alert").hide();
            $("#view_modal").fadeOut();
        });
        $(".view_all").click(function(){
            $("#modal_bg").fadeIn();
            $("#view_modal").show();
        });
    });
    </script>
    
 <div id="wrapperR">
 	
 	<div id="innerHeader">
    	<h3>Agricultural seminar</h3>
    </div>
       <button class="post_event">post event</button>
        <?php
        while($row1=mysqli_fetch_array($result1)){
        echo "<div id='content'>";
           
                echo "<table>";
                echo "<tr><td class='td_bold'>seminar</td><td>".$row1['seminarID']."</td></tr>";
                echo "<tr><td class='td_bold'>seminar topic</td><td>".$row1['seminar_topic']."</td></tr>";
                echo "<tr><td class='td_bold'>Date</td><td>".$row1['date']."</td></tr>";
                echo "<tr><td class='td_bold'>Time from</td><td>".$row1['t_from']."</td></tr>";
                echo "<tr><td class='td_bold'>Time to</td><td>".$row1['t_to']."</td></tr>";
                echo "<tr><td class='td_bold'>Speaker</td><td>".$row1['seminar_speaker']."</td></tr>";
                echo "</table>";
            
            echo "<div id='attendance'>";
                //count farmers attending
                $view_all="";
                require "dbConnect.php";
                $sql3="SELECT * from sminar_attendance WHERE seminarID=$row1[seminarID]";
                $result3=mysqli_query($con,$sql3);
                $count=mysqli_num_rows($result3);
            
                if($count>0){
                    $view_all="<a  href='view.php?id=$row1[seminarID]' class='view_all'>View</a>";
                }
                echo "<label>Farmers attending</label>";echo $count; echo $view_all;
            echo " <br><a href='end_seminar.php?id=$row1[seminarID]' style='background-color:#b43131;padding:5px;color:#fff;font-size:12px;border-radius:3px;text-decoration:none;float:right'>end seminar</a>";
            echo "</div>";
       echo "</div>";
        }
        ?>
</div>

<!--post event modal-->
<div id="modal_bg" class="close"></div>
<div id="post_event_modal">
  <div id="modal_top"><strong>Post event</strong><span class="close">x</span></div>
   <table>
       <form action="seminar.php" method="post">
           <tr><td><input type="text" name="seminar_topic" placeholder="Seminar topic" /></td></tr>
           <tr><td><input type="text" name="seminar_venue" placeholder="Seminar venue" /></td></tr>
           <tr><td><input type="date" name="date" /></td></tr>
           <tr><td><label>Time From</label><input type="time" name="t_from"/></td></tr>
           <tr><td><label>Time To</label><input type="time" name="t_to"  /></td></tr>
           <tr><td><input type="text" name="seminar_speaker" placeholder="Seminar speaker"/></td></tr>
           <tr><td><input type="submit" name="submit" value="submit" /></td></tr>
       </form>
   </table>
</div>


</body>
</html>