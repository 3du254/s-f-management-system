<?php
$farmerID_S=$_SESSION['farmerID'];
//include "../admin/shout.php";
require "../admin/dbConnect.php";
$qry=mysqli_query($con,"select * FROM farm WHERE farmerID='$farmerID_S'");
//$application_count=mysqli_num_rows($application_res);
$row_menu=mysqli_fetch_array($qry);
?>
<div id="logout">
    <a href='../admin/login.php?action=logout'> <i class='fa fa-power-off'></i> Logout</a>
    <a href="#"><i class="fa fa-cog"></i> Settings</a>
</div>
<div id="top">
    <p>Home</p>
    <?php 
    echo "<div class='sessionName'>"; 
    echo "<i class='fa fa-user'> </i>".$_SESSION['f_fname'];

    echo " ".$_SESSION['f_sname'] ;
    ?>
    <i class="fa fa-angle-down"></i>
    <script src="../admin/css/common.js"></script>
</div>
</div>

<div id="left">
    <ul class="ul_main">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="inbox.php"><i class="fa fa-inbox"></i>Inbox</a></li>
        <li><a href="profile.php"><i class="fa fa-user-plus"></i>Profile</a></li>
        <li><a href="farm.php"><i class="fa fa-first-order"></i>Farm</a></li>
        <li class="drop_down"><a href="#"><i class="fa fa-industry"></i>Crop<span style="float:right">+</span></a> 
            <ul><?php if($row_menu['crop']=='maize'){ ?>
                <li><a href="seed.php"><span>seed application</span></a></li>
                <?php }elseif($row_menu['crop']=='soghum'){ ?>
                <li><a href="seed_soghum.php"><span>seed application</span></a></li>
                <?php }elseif($row_menu['crop']=='wheat'){ ?>
                <li><a href="seed_wheat.php"><span>seed application</span></a></li>
                <?php }?>
                <li><a href="crop.php"><span>progress</span></a></li>
            </ul>
        </li>
        <li class="drop_down"><a href="#"><i class="fa fa-calendar"></i>Event<span style="float:right">+</span></a>
            <ul>
                <li><a href="event.php"><span>Upcoming</span></a></li>
                <li><a href="attending.php"><span>attending</span></a></li>
            </ul>
        </li>
        <li class="leftMenu"><a href="support.php"><i class="fa fa-support"></i>Support</a></li>
        <li class="leftMenu"><a href="news.php"><i class="fa fa-newspaper-o"></i>News</a></li>
    </ul>
    <script src="../admin/js/menu.js"></script>
</div>