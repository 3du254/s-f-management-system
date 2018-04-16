<?php
    require "../admin/dbConnect.php";
    if(isset($_POST['submit'])){
        $crop=$_POST['crop'];
        $Location=$_POST['Location'];
        $farm=$_POST['farm'];
        
        //sql query
        if($farm==1){
            $sql="SELECT * FROM farm,user WHERE farm.crop='$crop' AND user.Location='$Location' AND farm.farmNo!=0 AND user.farmerID=farm.farmerID";
            $result=mysqli_query($con,$sql);
        }else{
            $sql="SELECT * FROM farm,user WHERE farm.crop='$crop' AND user.Location='$Location' AND farm.farmNo=0 AND user.farmerID=farm.farmerID";
            $result=mysqli_query($con,$sql);
        }
        
    }
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employee</title>
    <link rel="stylesheet" type="text/css" href="css/common_emp.css" />
    <link href="../admin/css/css/font-awesome.css" rel="stylesheet" />
    <script src="../admin/js/jquery-1.8.0.min.js"></script>
    <script src="../admin/css/common.js"></script>
    <style>
        #content td{
            border-top: 1px #CCC solid;
            padding: 10px;
            font-size: 14px;
        }
        #content th{
            border-bottom: 1px #CCC solid; 
            padding: 10px;
            font-size: 14px;
            color: #666;
        }
        #filter select{
            padding: 4px 6px;
            width: 13vw;
            margin: auto 15px auto 5px;
        }
        #filter input[type=submit]{
            padding: 6px 8px;
            margin: auto 15px auto 10px;
            background-color: #03729a;
            color: #fff;
            border: none;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <script type="text/javascript">
        function PrintDiv() {
            var contents = document.getElementById("content").innerHTML;
            var frame1 = document.createElement('iframe');
            frame1.name = "frame1";
            frame1.style.position = "absolute";
            frame1.style.top = "-1000000px";
            document.body.appendChild(frame1);
            var frameDoc = frame1.contentWindow ? frame1.contentWindow : frame1.contentDocument.document ? frame1.contentDocument.document : frame1.contentDocument;
            frameDoc.document.open();
            frameDoc.document.write('<html><head><title>KENYA SEED COMPANY LIMITED</title>');
            frameDoc.document.write('</head><body>');
            frameDoc.document.write(contents);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            setTimeout(function () {
                window.frames["frame1"].focus();
                window.frames["frame1"].print();
                document.body.removeChild(frame1);
            }, 500);
            return false;
        }
    </script>
    <?php include "common_menu.php";?>
    <div id="wrapperR" style="background-color:#c4ccd3">
       <h3>Report</h3>
        <div id="filter" style="background-color:#fff; width:90%; margin:auto;padding:10px">
            <form method="post" style="margin:10px auto 5px 27px;">
                <label>Filter by:::::crop</label><select name="crop">
                    <option>maize</option>
                    <option>soghum</option>
                    <option>wheat</option>
                </select>
                <label>Location</label><select name="Location">
                   <?php 
                    require "../admin/dbConnect.php";
                    $sql1="SELECT DISTINCT Location FROM user";
                    $result1=mysqli_query($con,$sql1);
                
                    while($row1=mysqli_fetch_array($result1)){
                        echo "<option>$row1[Location]</option>";
                    }    
                    ?>
                </select>
                
                <label>Farm</label><select name="farm">
                    <option value="1">inspected</option>
                    <option value="0">new</option>
                </select>
                <input type="submit" name="submit" value="genarate report" />                       
            </form>
            <button style="padding:5px 15px;background-color:#08578b;color:#fff;border-radius:3px;border:none;margin-left:25px;" onclick="PrintDiv();">Print</button>
        </div>
        <div id="content" style="background-color:#fff; width:90%;margin:auto; padding:10px;">
            <?php if(isset($_POST['submit'])){ if(mysqli_num_rows($result)<1){ echo "";}else{?>
            <h3 style="margin:0px auto 10px 27px; color:#666">Farmers from <?php echo $Location;?> growing <?php echo $crop;?></h3>
            <?php }?>
            <?php
            
            
                if(mysqli_num_rows($result)<1){
                    if($farm==1){ $farm= "inspected";}else{ $farm="new";}
                    echo "<i style='margin-left:27px;color:#0d961a;'><strong>INFO!! </strong>No result for ".$farm." farm from ".$Location." growing ".$crop."</i>";
                }else{
                    echo "<table style='border-collapse: collapse;margin:auto'>";
                    echo "<tr> <th>#</th> <th>first Name</th> <th>Second name</th> <th>Location</th> <th>crop</th> <th>farm number</th> <th>mobile number</th>  <th>date of registration</th> <th>national ID</th> <th>farm size(hectures)</th></tr>";

                    while($row=mysqli_fetch_array($result)){
                        echo "<tr> <td>$row[farmerID]</td> <td>$row[firstName]</td> <td>$row[secondName]</td> <td>$row[Location]</td> <td>$row[crop]</td> <td>";
                        if($row['farmNo']==0){ echo "Not assigned";}else{ echo $row['farmNo'];}
                        echo "</td> <td>$row[mobileNo]</td>  <td>$row[doR]</td> <td>$row[nationalID]</td> <td>$row[farmSize]</td></tr>";
                    }
                }
                   
            }
            ?>
        </div>
        <br>
        <div></div>
        <br>
    </div>
    
</body>
</html>

