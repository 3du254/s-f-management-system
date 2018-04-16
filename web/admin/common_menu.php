<div id="logout">
			<a href='login.php?action=logout'> <i class='fa fa-power-off'></i> Logout</a>
        	<a href="#"><i class="fa fa-cog"></i> Settings</a>
	</div>
 <div id="header">
 <h2>Admin Panel</h2>
 <?php 
 	echo "<div class='sessionName'>";
	session_start(); 
	echo "<i class='fa fa-user'> </i>".$_SESSION['a_fname'];
	
	echo " ".$_SESSION['a_sname'] ;
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
 		<li class="drop_down"><a href="#"><i class="fa fa-group"></i> user<span class="float_right">+</span></a>
        	<ul>
            	<li><a href="new_user.php"><span>New user</span></a></li>
                <li><a href="userManagement.php?page"><span>user management</span></a></li>
            </ul>
        </li>
        <li><a href="#"><i class="fa fa-inbox"></i> Notifications</a></li>
        <li><a href="farm_number.php"><i class="fa fa-inbox"></i> Farm number</a></li>
        <li><a href="seed_applications.php"><i class="fa fa-star-o"></i> Seed applications</a></li>
        <li class="drop_down"><a href="#"><i class="fa fa-calendar"></i> Events<span class="float_right">+</span></a>
            <ul>
                <li><a href="seminar.php"><span>Upcoming</span></a></li>
                <li><a href="previous.php"><span>Previous</span></a></li>
            </ul>
        </li> 
        <li><a href="#"><i class="fa fa-newspaper-o"></i> News</a></li>
        <li><a href="support.php"><i class="fa fa-support"></i>   Support</a></li>
    </ul>
    <script src="js/menu.js"></script>
 </div>