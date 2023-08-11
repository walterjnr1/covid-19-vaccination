<?php  
session_start(); //to ensure you are using same session
error_reporting(0);

include('connect.php');
$last = ("UPDATE users SET lastaccess = NOW() where username='".$_SESSION['username']."' and branch ='$branch'");
$query = mysqli_query($conn, $last);

//Add Activity Log
$task= $username.' '.'logged Out'.' '. 'On' . ' '.$current_date;
$query2 = "INSERT into `activity_log` (task,branch)
VALUES ('$task','$branch')";
$result2 = mysqli_query($conn,$query2);


session_destroy(); //destroy the session
?>

<script>
window.location="index.php";
</script>
<?php
//to redirect back to "index.php" after logging out
  exit;
?>