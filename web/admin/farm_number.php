
<!--show farm number code-->
<?php
    require "dbConnect.php";
    $sql="select * FROM farm_numbers";
    $result=mysqli_query($con,$sql);
?>

<!--new farm number codes-->
<?php
    if(isset($_POST['submit'])){
        $new_farmNo=$_POST['new_farmNo'];
        $sql2="select * FROM farm_numbers WHERE farmNo='$new_farmNo'";
        $result2=mysqli_query($con,$sql2);
        if(mysqli_num_rows($result2)<1){
            $sql1="INSERT INTO farm_numbers(farmNo) VALUES('$new_farmNo')";
            mysqli_query($con,$sql1);
        }else{
            ?>
            <script>alert('already added');</script>
            <?php
            
        }
        
    }
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
            padding: 6px;
            border-top: 1px #b9c9c9 solid;
            color: #535e5e;
        }
        #content th{
            padding: 3px;
        }
    </style>
</head>

<body>
    <?php include "common_menu.php";?>
    <div id="wrapperR" style="background-color:#e5eaea">
        <div id="content" style="background-color:#fff;padding:2vw;margin:5vh 2vw auto 2vw;">
         <form method="post">
             <input type="text" name="new_farmNo" placeholder="new farm number" style="padding:5px; margin-bottom:2vh" required/>
             <input type="submit" name="submit" value="create new" style="padding:7px 15px; margin-left:1vw;color:#fff; background-color:#0d6be7;border:none; border-radius:2px;"/>
         </form>
            
          
           <?php
            echo "<table style='border-collapse: collapse'>";

            echo "<tr>  <th>#</th> <th>farm number</th> <th>status</th>   </tr>";
            while($row=mysqli_fetch_array($result)){
                
                echo "<tr>  <td>$row[id]</td> <td>$row[farmNo]</td>";
                //status code
                echo "<td>";
                            if($row['status']==1){
                                echo "<p style='color:green;margin:0'>assigned</p>";
                            }else{
                                echo "Not assigned";
                            }
                echo "</td>";
                echo "</tr>";
                
                
            }
            echo "</table>";
            ?>
            
        </div>
    </div>

</body>
</html>
