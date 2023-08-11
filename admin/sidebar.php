<?php
error_reporting(0);
include('../connect.php');

$username = $_SESSION['username'];

$sql = "select * from admin where username='$username'"; 
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);

?>
 <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img src="images/images.png" alt="image" width="146" height="155" class="img-circle" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"><span class="text-muted text-xs block"><?php echo $row['fullname'];  ?><b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
							 <li class="divider"></li>
							   <li><a href="changepassword.php">Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
  </div>
                    <div class="logo-element">
                        IN+
                    </div>
</li>
                <li class="active">
                <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a></li>
				
				
                 <li>
                    <a href="user-record.php"><i class="fa fa-user"></i> <span class="nav-label">Manage Users</span></a>
                </li>
				                 <li>
                    <a href="vaccination-record.php"><i class="fa fa-database"></i> <span class="nav-label">Vaccination Record</span></a>
                </li>


     <li>
                    <a href="changepassword.php"><i class="fa fa-key"></i> <span class="nav-label">Change Password</span></a>
                </li>


              
                <li>
                    <a href="../index.php"><i class="fa fa-exchange"></i> <span class="nav-label">Switch To Website</span></a>
                </li>