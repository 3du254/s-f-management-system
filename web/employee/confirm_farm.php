<!--select farm and user codes-->
<?php
require '../admin/dbConnect.php';
$farmID=$_GET['id'];
$sql="SELECT * FROM farm,user WHERE farm.farmerID=user.farmerID AND farm.farmID='$farmID'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>

<!--select farm numbers-->
<?php
require '../admin/dbConnect.php';
$sql1="SELECT * FROM farm_numbers WHERE status='0'";
$result1=mysqli_query($con,$sql1);

?>

<!--assign farm number-->
<?php
require '../admin/dbConnect.php';

if(isset($_POST['submit'])){
    $id=$_POST['farmID'];
    $farmNo=$_POST['farmNo'];

    $sql2="UPDATE farm SET farmNo='$farmNo' WHERE farmID='$id'";
    mysqli_query($con,$sql2);
    
    $sql3="UPDATE farm_numbers SET status='1' WHERE farmNo='$farmNo'";
    mysqli_query($con,$sql3);

    header('location:new_farm.php?page');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../employee/css/common_emp.css" />
        <link href="css/css/font-awesome.css" rel="stylesheet" />
        <script src="../admin/js/jquery-1.8.0.min.js"></script>
        <script src="../admin/css/common.js"></script>
        <title>Untitled Document</title>
    </head>
    <style>
        #new_user_wrapper{
            width:80vw;
            margin:auto;
        }
    </style>

    <body>

        <?php include "common_menu.php";?>

        <div id="wrapperR">

            <div id="innerHeader">
                <h2>Assign Farm Number</h2>
            </div>
            <div id="new_user_wrapper">
                <div id="content" style="margin:auto; width:65vw;">
                    <table>
                        <form action="confirm_farm.php" method="post">
                            <td><input type="hidden" name="farmID" value="<?php echo $row['farmID'] ?>" readonly="readonly" /></td></tr>
                        <tr><td>name</td> <td><input type="text" name="firstName" value="<?php echo $row['firstName'] ?>" readonly="readonly" /></td></tr>
                        <tr><td></td> <td><input type="text" name="secondName" value="<?php echo $row['secondName'] ?>" readonly="readonly" /></td></tr>
                        <tr><td>farm size(hectures)</td> <td><input type="text" name="farmSize" value="<?php echo $row['farmSize']  ?>" readonly="readonly" /></td></tr>
                        <tr><td>Location</td> <td><input type="text" name="Location" value="<?php echo $row['Location'] ?>" readonly="readonly" /></td></tr>
                        <tr><td>crop</td> <td><input type="text" name="crop" value="<?php echo $row['crop'] ?>"readonly="readonly" /></td></tr>
                        
                        <tr><td>assign Farm number</td> <td><select name="farmNo">
                            <?php
    if(mysqli_num_rows($result1)>0){
        while($row1=mysqli_fetch_array($result1)){
            echo "<option>";
            echo $row1['farmNo'];
            echo "</option>";

        }
    }
                                       else{
                                           echo "<option>all farm numbers have been assigned </option>";
                                       }
                            ?>
                            </select>
                            </td></tr>
                        <tr><td></td> <td><input type="submit" value="submit" name="submit" /></td></tr>
                        </form>
                    </table>

            </div>
        </div>
        </div>
    </body>
</html>