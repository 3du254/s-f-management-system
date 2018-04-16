<?php
session_start();
$farmerID_S=$_SESSION['farmerID'];
require "../admin/dbConnect.php";
$sql="SELECT * FROM user,farm WHERE user.farmerID=farm.farmerID AND farm.farmerID='$farmerID_S'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

//update farm detail code
    if(isset($_POST['submit'])){
        //insert to archive
        $dateCollectionA=$row['dateCollection'];
        $farmerIDA=$row['farmerID'];
        $farmHumidityA=$row['farmHumidity'];
        $farmTemperatureA=$row['farmTemperature'];
        $farmpHA=$row['farmpH'];
        $farmRainA=$row['farmRain'];

        //update
        $dateCollection=$_POST['dateCollection'];
        $farmTemperature=$_POST['farmTemperature'];
        $farmHumidity=$_POST['farmHumidity'];
        $farmpH=$_POST['farmpH'];
        $farmRain=$_POST['farmRain'];

        $sql2="INSERT INTO farmarchive (dateCollection,farmerID,farmTemperature,farmHumidity,farmpH,farmRain) Values('$dateCollectionA', '$farmerIDA', '$farmTemperatureA', '$farmHumidityA', '$farmpHA', '$farmRainA')";
        mysqli_query($con,$sql2);

        $sql1="UPDATE farm SET farmTemperature='$farmTemperature', farmHumidity='$farmHumidity', farmpH='$farmpH', farmRain='$farmRain',dateCollection='$dateCollection' WHERE farmerID='$farmerID_S'";
        mysqli_query($con,$sql1);
        echo "<meta http-equiv='refresh' content='0;url=farm.php'>";
    }
    
?>

<!--farm registration code-->
<?php
if(isset($_POST['submit_farmreg'])){
    $farmSize=$_POST['farmSize'];
    $crop=$_POST['crop'];

    $sql3="INSERT INTO farm (farmerID,farmSize,crop) Values('$farmerID_S','$farmSize','$crop')";
    mysqli_query($con,$sql3);
    echo "<meta http-equiv='refresh' content='0;url=farm.php'>";
}
?>
<!--check if farm is registered-->
<?php
require "../admin/dbConnect.php";
$sql_farm="SELECT * FROM farm WHERE farmerID='$farmerID_S' AND farmNo!='0'";
$res_farm=mysqli_query($con,$sql_farm);
$count_farm=mysqli_num_rows($res_farm);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="../admin/js/jquery-1.8.0.min.js"></script>
<link href="../admin/css/css/font-awesome.min.css" rel="stylesheet" />
<link href="css/commonUser.css" rel="stylesheet" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="../admin/js/jquery-1.8.0.min.js"></script>
<title>Home</title>
<script>
//$(document).ready(function() {
		$("#defaultOpen").click();
	//});
</script>
	
<script>

	$(document).ready(function() {
		$("#btnLeftTab").css({"background-color":"#1E90FF", "color":"#FFFFFF"});
		$("#farmContent").css("display","block");
		//tab button jquery
		$("#btnLeftTab").click(function(){
			$("#btnLeftTab").css({"background-color":"#1E90FF", "color":"#FFFFFF"});
			$("#btnRightTab").css({"background-color":"#f1f1f1", "color":"#000"});
		});
		$("#btnRightTab").click(function(){
			$("#btnRightTab").css({"background-color":"#1E90FF", "color":"#FFFFFF"});
			$("#btnLeftTab").css({"background-color":"#f1f1f1", "color":"#000"});
		});
		
		//farm detail modal codes
		$(".btnUpdate").click(function(){
			$("#modalUpdate").show();
			$("#modal_bg").fadeIn();
		});
		$(".close").click(function(){
		$("#modalUpdate").fadeOut();
		$("#modal_bg").fadeOut();
		});
        
        //reg farm codes
        $(".btn_open_regfarm").click(function(){
            $("#modal_regfarm").show();
            $("#modal_bg").fadeIn();
        });
        $(".close").click(function(){
            $("#modal_regfarm").fadeOut();
            $("#modal_bg").fadeOut();
        });
    });
	function openDetails(evt, detail){
		var i, tabContent, tablink ;
		tabContent= document.getElementsByClassName("tabContent");
		for(i=0;i<tabContent.length;i++){
			tabContent[i].style.display="none";
		}
		tablink=document.getElementsByClassName("tabLink");
		for(i=0;i<tablink.length;i++){
			tablink[i].className=tablink[i].className.replace( "focus", "");
		}
		
		document.getElementById(detail).style.display="block";
		evt.currentTarget.className+= "focus";
	}
	
</script>



<style>
#right{
	background-color:#E6E6F2;
}
#rightTop{
	background-color:#F9F9F9;
	width:86vw;
	height:5vh;
	border-bottom:#F1F1F1 2px solid;
}
#farmW{
	margin:auto;
	width:79vw;
	height:75vh;
	background-color:#FFFFFF;
}
#farmW h4{
	position:absolute;
	left:7.5vw;
	top:13vh;
}
#farmWTop{
    padding: 5px;
	width:71vw;
    margin: auto;
	margin-top:5vh;
	background-color:#FFFFFF;
	border-bottom:2px #CCCCCC solid;
	
}
#farmContent,#farmArchive{
	position:absolute;
	font-size:13px;
	left:7.5vw;
	top:31vh;
}
#farmContent .border{
	border-bottom:#CCCCCC 1px solid;
	padding-bottom:15px;
	
}
#farmContent table{
	border-collapse:collapse;
}
#farmContent .btnUpdate{
	border:none;
	margin-top:2vh;
	height:5.5vh;
	width:10vw;
	background-color:#32CD32;
	color:#fff;
	font-size:14px;
    border-radius: 3px;
}
/*>>modal<<......................................................................................................................................*/
#modalUpdate, #modal_regfarm{
	position:fixed;
	background-color:#FFF;
	width:40vw;
	height:75vh;
	top:10vh;
	left:32vw;
	display:none;
	z-index:1;
	
}
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
#updateContent,#reg_content{
	width:35vw;
	margin:auto;
}
#modalTop{
	width:35vw;
	margin:auto;
}
#updateContent input[type=text],[type=password],[type=date]{
	font-size:14px;
	position:relative;
	width:20vw;
	padding:1.2vh;
	margin-bottom:2vh;
	border-radius:3px;
	border:#F1F1F1 1px solid;
	
}
#updateContent input[type=submit]{
	position:absolute;
	bottom:3vh;
	right:6vw;
	border:none;
	width:7vw;
	height:5vh;
	background:#409FFF;
	border-radius:2px;
	color:#FFF;
}
.btn_left{
	position:absolute;
	top:68vh;
	color:#409FFF;
	font-size:14px;
	cursor:pointer;
}
.btn_left:hover{
	color:#0080FF;
}
#modalUpdate span{
	color:#666;
	cursor:pointer;
	float:right;
	font-size:20px;
	margin-right:2vw;
	margin-top:2vh;
}

#modalUpdate span:hover {
	color:#999;
}
/*>>end modal<<.....................................................................................................................................*/
#footer{
	position:;
	margin:auto;
	margin-top:58vh;
	border-top:#E9E9E9 solid 2px;
	text-align:center;
	width:68vw;
	font-size:10px;
	text-align:center;
}

#farmArchive table{
	background:#F8F8F8;
	
	width:68vw;
	margin:auto;
	margin-top:vh;
	text-align:left;
	border-collapse:collapse;
}
#farmArchive table tr{
	padding-left:3vw;
	height:5vh;
}
#farmArchive table .tHead{
	background-color:#DC143C;
	color:#FFFFFF
}
#farmArchive table .tRow:hover{
	background-color:#EBEBEB;
}

/* >>tab css<<...........................................................................................................*/
.tabContent{
	display:none;
	
}
div.tab{
	left:6vw;
	position:absolute;
	margin-top:3.5vh;
	margin-left:1.5vw;
	height:5.5vh;
	width:20.1vw;
	list-style-type:none;
	background-color:#FFFFFF;
	border:1px #fff solid;
}
div.tab button{
	width:10vw;
	height:5.5vh;
	background-color:#f1f1f1;
	float:left;
	border:none;
	outline:none;
	cursor:pointer;
	transition:0.3;
	font-size:14px;

}

div.tab button:focus{
	color:#FFFFFF;
	background-color:#1E90FF;
}
div.tab #defaultOpen{
	margin-right:1px;
	
}


</style>
</head>

<body>

<?php include "common_menu.php"; ?>

<div id="right">
<h2 style="margin:5px auto auto 3.5vw;">Farm</h2>
	
        <div id="farmW">
            <?php if($count_farm>0){echo "";}else{?>
        <button class="btn_open_regfarm" style="padding:7px;margin:4vh auto auto 4vw;color:#fff;background-color:#377175;border:none;border-radius:3px;">Register Farm</button>
        <?php }?>
        <?php
        if(mysqli_num_rows($res)>0){
            if($row['farmNo']!=0){
                echo "<div id='farmWTop''><h4>Farm information</h4></div>";
                echo "<div class='tab'>";
                ?>
                    <button id='btnLeftTab' class='tabLink' onclick='openDetails(event, "farmContent")'>Current</button>
                    <button id='btnRightTab'  class='tabLink' onclick='openDetails(event, "farmArchive")'>Previous</button>
                <?php
                 echo "</div>";
                echo "<div id='farmContent' class='tabContent'>";
                    if(mysqli_num_rows($res)>0){
                        echo "<table>";
                            echo "<tr> <td>Data collection date</td><td>" .$row['dateCollection']."</td> </tr>";
                            echo "<tr> <td>Farmer name</td><td>".$row['firstName']." ".$row['secondName']."</td> </tr>";
                            echo "<tr> <td class='border'>Farm number</td><td class='border'>".$row['farmNo']."</td> </tr>";
                            if($row['farmTemperature']!=0&&$row['farmHumidity']!=0&&$row['farmpH']!=0&&$row['farmRain']!=0){
                                echo "<tr> <td>Farm temperature</td><td>".$row['farmTemperature']."</td> </tr>";
                                echo "<tr> <td>Farm humidity</td><td>".$row['farmHumidity']."</td> </tr>";
                                echo "<tr> <td>Farm pH</td><td>".$row['farmpH']."</td> </tr>";
                                echo "<tr> <td class='border'>Farm Rain</td><td class='border'>".$row['farmRain']."</td></tr>";
                                }else{
                                
                                echo "<tr> <td>Farm temperature</td><td>no data</td> </tr>";
                                echo "<tr> <td>Farm humidity</td><td>no data</td> </tr>";
                                echo "<tr> <td>Farm pH</td><td>no data</td> </tr>";
                                echo "<tr> <td class='border'>Farm Rain</td><td class='border'>no data</td></tr>";
                                }
                            echo "<tr> <td>Farm size</td><td>".$row['farmSize']."</td> </tr>";
                            echo "<tr> <td>Farm Location</td><td>".$row['Location']."</td> </tr>";
                        echo "</table>";
                    }
                else{
                    echo "No Current Information<br />";
                }

                    echo "<button class='btnUpdate'>update</button>";
                echo "</div>";

                echo "<div id='farmArchive' class='tabContent'>";
                    require "../admin/dbConnect.php";
                    $sql3="SELECT * FROM farmarchive WHERE farmerID='$farmerID_S'";
                    $res1=mysqli_query($con,$sql3);
                    if(mysqli_num_rows($res1)>0){
                        echo "<table>";
                        echo "<tr  class='tHead'>";
                        echo "<th>id</th> <th>Date</th> <th>Humidity</th> <th>Temperature</th> <th>pH</th> <th>Rain</th> ";
                        echo "</tr>";

                        while($row1=mysqli_fetch_array($res1)){
                            echo "<tr class='tRow'>";
                            echo "<td>$row1[archiveID]</td> <td>$row1[dateCollection]</td> <td>$row1[farmHumidity]</td> <td>$row1[farmTemperature]</td> <td>$row1[farmpH]</td> <td>$row1[farmRain]</td> ";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                else{
                    echo "No Previous Information";
                }
                echo "</div>";
            }
                else{
                    echo "<br>farm as not been inspected";
                }
        }
            else{
                echo "<br>You have not regestered a farm";
            }
                ?>
                <?php include "footer.php"; ?>
        </div>
		
    <!--update farm details modal codes...................................................................................................-->  
    <div id="modal_bg" class="close">
    </div>
    <div id="modalUpdate">
    <span class="close"><i class="fa fa-close"></i></span>
    <div id="modalTop">
        <h3>New information</h3>
    </div>
    	<div id="updateContent">
        	<table>
            	<form method="post">
                	<tr> <td>Data collection date</td> <td><input type="date" name="dateCollection" value="<?php echo $row['dateCollection']; ?>"/> </td> </tr>
                	<tr> <td>Farm temperature</td> <td><input type="text" name="farmTemperature" value="<?php echo $row['farmTemperature']; ?>"/> </td> </tr>
                    <tr> <td>Farm humidity</td> <td><input type="text" name="farmHumidity" value="<?php echo $row['farmHumidity']; ?>" /> </td> </tr>
                    <tr> <td>Farm pH</td> <td><input type="text" name="farmpH" value="<?php echo $row['farmpH']; ?>"/> </td> </tr>
                    <tr> <td>Farm rain</td> <td><input type="text" name="farmRain" value="<?php echo $row['farmRain']; ?>"/> </td> </tr>
                    <tr> <td class="btn_left close">cancel</td><td><input type="submit" name="submit" value="update" /> </td> </tr>
                </form>
            </table>
        </div>
    </div>
    
    
    <!--modal register farm...........................................................-->
    <div id="modal_bg" class="close">
    </div>
    <div id="modal_regfarm">
        <span class="close"><i class="fa fa-close"></i></span>
        <div id="modalTop">
            <h3>New information</h3>
        </div>
        <div id="reg_content">
            <table>
                <form method="post">
                    <tr> <td><input type="text" name="farmSize" placeholder="Farm size in hectures"/> </td> </tr>
                    <tr> <td><select name="crop">
                                     <option>maize</option>
                                     <option>wheat</option>
                                     <option>soghum</option>
                        </select> </td> </tr>
                    <tr> <td class="btn_left close">cancel</td><td><input type="submit" name="submit_farmreg" value="submit" /> </td> </tr>
                </form>
            </table>
        </div>
    </div>
    
</div>


</body>
</html>