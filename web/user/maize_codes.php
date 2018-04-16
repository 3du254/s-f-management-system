<!--check if farmer applied and got confirmation for seed-->
<?php 
$farmerID_S=$_SESSION['farmerID'];
require "../admin/dbConnect.php";
$cs="SELECT * FROM seed WHERE farmerID='$farmerID_S'";
$cs_result=mysqli_query($con,$cs);
$cs_count=mysqli_num_rows($cs_result);
$cs_row=mysqli_fetch_array($cs_result);
?>
<!--check if farmer as registerd afarm and inspected-->
<?php 
$farmerID_S=$_SESSION['farmerID'];
require "../admin/dbConnect.php";
$cf="SELECT * FROM farm WHERE farmerID='$farmerID_S' AND farmNo='0'";
$cf_result=mysqli_query($con,$cf);
$cf_count=mysqli_num_rows($cf_result);
?>

<?php 
if($cf_count>0){
    echo "your farm is not inspected";
}else{
    if($cs_count<1){
        echo "please apply for seed";
    }else{
        if($cs_row['cancel']==1){
            echo "reapply for seeds";
        }else{
            if($cs_row['active']==0&&$cs_count>0){
                echo "seed application pending";
            }else{ 
        if(mysqli_num_rows($result3)<1){

?>

<!--planting codes-->
<form method="post">
    <strong>PHASE 1</strong>
    <table>

        <tr> <td>Process</td> <td><input type="text" name="progress" value="planting" readonly="readonly"/> </td> </tr>
        <tr> <td>date</td> <td><input type="date" name="plant_date" value="" required/> </td> </tr>
        <tr> <td>maize breed</td> <td><select name="breed">
            <option>HB-213</option>
            <option>B-218</option>
            </select> </td> </tr>
        <tr> <td>fertilizer</td> <td><select name="planting_fertilizer">
            <option>DAP</option>
            <option>NAP</option>
            <option>AS</option>
            <option>UREA</option>
            </select> </td> </tr>

        <tr> <td></td><td><input type="submit" name="submit" value="submit" /> </td> </tr>
    </table>
</form>
<!--maize weeding1 codes-->
<?php }elseif($row3['plant_date']!==0000-00-00&&$row3['weeding1_date']==0000-00-00){?>
<form method="post">
    <strong>PHASE 2</strong>
    <table>
        <tr> <td>Process</td> <td><input type="text" name="progress" value="1st weeding" readonly="readonly"/> </td> </tr>
        <tr> <td>date</td> <td><input type="date" name="weeding1_date" required/> </td> </tr>
        <tr> <td>done by</td> <td><select name="weeding1_how">
            <option>manual weeding</option>
            <option>herbicide application</option>
            </select> </td> </tr>
        <tr> <td></td><td><input type="submit" name="submit1" value="submit" /> </td> </tr>
    </table>
</form>
<!-- maize top dressing codes-->
<?php }elseif($row3['weeding1_date']!==0000-00-00&&$row3['top_dressing_date']==0000-00-00){?>
<form method="post">
    <strong>PHASE 3</strong>
    <table>
        <tr> <td>Process</td> <td><input type="text" name="progress" value="Top dressing" readonly="readonly"/> </td> </tr>
        <tr> <td>date</td> <td><input type="date" name="top_dressing_date" required/> </td> </tr>
        <tr> <td>fertilizer used</td> <td><select name="top_dressing_fertilizer">
            <option>NAP</option>
            <option>PHOSPHATE</option>
            <option>NIP</option>
            </select> </td> </tr>
        <tr> <td></td><td><input type="submit" name="submit2" value="submit" /> </td> </tr>
    </table>
</form>
<!--maize weeding2 codes-->
<?php }elseif($row3['top_dressing_date']!==0000-00-00&&$row3['weeding2_date']==0000-00-00){?>
<form method="post">
    <strong>PHASE 4</strong>
    <table>
        <tr> <td>Process</td> <td><input type="text" name="progress" value="2nd weeding" readonly="readonly"/> </td> </tr>
        <tr> <td>date</td> <td><input type="date" name="weeding2_date" required/> </td> </tr>
        <tr> <td>done by</td> <td><select name="weeding2_how">
            <option>manual weeding</option>
            <option>herbicide application</option>
            </select> </td> </tr>
        <tr> <td></td><td><input type="submit" name="submit3" value="submit" /> </td> </tr>
    </table>
</form>
<!--maize harvesting codes-->
<?php }elseif($row3['weeding2_date']!==0000-00-00 && $row3['harvesting_date']==0000-00-00){?>
<form method="post">
    <strong>PHASE 5</strong>
    <table>
        <tr> <td>Process</td> <td><input type="text" name="progress" value="harvesting" readonly="readonly"/> </td> </tr>
        <tr> <td>date</td> <td><input type="date" name="harvesting_date" required/> </td> </tr>
        <tr> <td>total bags</td> <td><input type="text" name="harvested_bags" placeholder="kgs"/></td> </tr>
        <tr> <td></td><td><input type="submit" name="submit4" value="submit" /> </td> </tr>
    </table>
</form>
<?php }elseif($row3['harvesting_date']!==0000-00-00 && $row3['harvested_bags']!==0){
    echo "<form method='post'><input type='submit' value='End season' name='submit_end' style='margin-left:20px' /></form>";
}
    }
}
}
}?>


    