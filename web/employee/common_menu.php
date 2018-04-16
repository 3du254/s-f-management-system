
   <div id="logout">
    <a href='../admin/login.php?action=logout'> <i class='fa fa-power-off'></i> Logout</a>
    <a href="#"><i class="fa fa-cog"></i> Settings</a>
</div>
<div id="header">
    <h2>Employee Panel</h2>
    <?php 
    echo "<div class='sessionName'>";
    session_start(); 
    echo "<i class='fa fa-user'> </i>".$_SESSION['i_fname'];

    echo " ".$_SESSION['i_sname'] ;
    ?>
    <i class="fa fa-angle-down"></i>
</div>
</div>

<div id="wrapperL">
    <div class="btn" id="button" onClick="show(wrapperL,wrapperR)"> 
        <!--<i class="fa fa-dedent" id="button"></i>-->
    </div>
    <ul>
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="drop_down"><a href="farmer.php?page"><i class="fa fa-group"></i> Farmers</a></li>
        <li class="drop_down"><a href="#"><i class="fa fa-first-order"></i> farm<span class="float_right">+</span></a>
            <ul>
                <li><a href="inspected.php"><span>inspected</span></a></li>
                <li><a href="new_farm.php?page"><span>new</span></a></li>
            </ul>
        </li>
        <li class="drop_down"><a href="#"><i class="fa fa-industry"></i> crop progress<span class="float_right">+</span></a>
            <ul>
                <li><a href="maize.php"><span>maize</span></a></li>
                <li><a href="wheat.php"><span>wheat</span></a></li>
                <li><a href="soghum.php"><span>soghum</span></a></li>
            </ul>
        </li>
        <li><a href="report.php"><i class="fa fa-support"></i>   Report</a></li>
    </ul>
    <script src="../admin/js/menu.js"></script>
</div>