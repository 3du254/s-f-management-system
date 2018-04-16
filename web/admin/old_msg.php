<?php
require "dbConnect.php";
$result= mysqli_query($con, "SELECT * FROM message WHERE adminMSG!='' AND read_stat='1'");


echo "
<table>
<tr> <th>#</th> <th>farmer message</th> <th>my reply</th></tr>
";
$c=1;
while($row=mysqli_fetch_array($result)){
echo "<tr><td>$c</td> <td>$row[farmerMSG]</td> <td>$row[adminMSG]</td></tr>
";  
    $c++;
}
echo "</table>";
?>