<?php
require '../admin/dbConnect.php';
$sql="SELECT * FROM farm,user WHERE farm.farmerID=user.farmerID AND farm.farmNo!='0'";
$result=mysqli_query($con,$sql);
?>
  <!DOCTYPE html>
   <html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/common_emp.css" />
        <link href="../admin/css/css/font-awesome.css" rel="stylesheet" />
        <script src="../admin/js/jquery-1.8.0.min.js"></script>
        <script src="../admin/css/common.js"></script>
        <title>employee home</title>

        <style type="text/css">

            a{
                text-decoration:none;
                background-color:#80FF80#80FF80;
                border:solid 1px #80FF80#80FF80;
            }
            #content td{
                padding: 10px 30px;
                border-top: 1px #b9c9c9 solid;
                color: #535e5e;
                font-size: 14px;
            }
            #content th{
                padding: 6px 30px;

            }
            #content tr:hover{
                background-color: #f5f4f4;
            }
        </style>
    </head>
    <body>
        <script src="js/print.js"></script>

        <?php include "common_menu.php";?>

        <div id="wrapperR" style="background-color:#e5eaea">
            <h3 style="margin-left:5%">Farm / inspected</h3>
            
            <button style="padding:5px 15px;background-color:#08578b;color:#fff;border-radius:3px;border:none;margin:0 auto 5px 65px;" onclick="PrintDiv();">Print</button>
            
            <div id="content" style="background-color:#FFF;margin:auto;padding:20px;width:86%;border-radius:3px;">
            <table style="border-collapse: collapse;width:;margin:auto">
                <label><h4 style="margin-left:5%">List of all inspected farms</h4></label>
                <thead><tr> <th>#</th> <th>First name</th> <th>Second name</th> <th>username</th> <th>Location</th> <th>Farm number</th> <th>crop</th></tr></thead>
                <?Php
                while($row=mysqli_fetch_array($result))
                    echo "<tr> <td>$row[farmerID]</td> <td>$row[firstName]</td> <td>$row[secondName]</td> <td>$row[username]</td> <td>$row[Location]</td> <td>$row[farmNo]</td> <td>$row[crop]</td> </tr>"
                ?>
            </table>
        </div>


        </div>
    </body>
</html>