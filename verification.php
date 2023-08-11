<?php
session_start();
error_reporting(0);
include('connect.php');

date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');

if(isset($_POST["btnverify"]))
{
$ID = mysqli_real_escape_string($conn,$_POST['txtvaccinationID']);
$sql_verify = "select * from users where vaccinationID='$ID'"; 
$result_verify = $conn->query($sql_verify);
$row_verify = mysqli_fetch_array($result_verify);

$status="Status:"." ".$row_verify['status'];
$fullname="Fullname:"." ".$row_verify['fullname'];


  $query = "SELECT * FROM vaccination where vaccinationID='$ID'"; 
       $result = mysqli_query($conn, $query); 
      
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row_vaccination = "No. of Visit(Vaccination):"." ".mysqli_num_rows($result); 
          
    }        


}


                 
     
    ?>

<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.3.10, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.3.10, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/akwa-ibom-logo.jfif" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Verification Panel|Covid-19 Directory for Vaccination</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/animatecss/animate.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.theme.css">
  <link rel="stylesheet" href="assets/datepicker/jquery.datetimepicker.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
</head>
<body>
  
  <section class="menu cid-s48OLK6784" once="menu" id="menu1-t">
    
    <nav class="navbar navbar-dropdown navbar-expand-lg">
      <div class="container">
        <div class="navbar-brand"> <span class="navbar-logo"> <a href="index.php"> <img src="assets/images/akwa-ibom-logo.jfif" alt="covid-19 directory " style="height: 3.8rem;"> </a> </span> <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-7" href="index.php">Covid-19 directory on Vaccination</a></span> </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <div class="hamburger"> <span></span> <span></span> <span></span> <span></span> </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.php">Home</a></li>
			            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="register.php">Registration</a></li>
            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="verification.php">Verification Panel</a></li>
          </ul>
        </div>
      </div>
    </nav>
</section>

<section class="form7 cid-sFRWpp71BS" id="form7-15">
    
    <div class="mbr-overlay"></div>
    <div class="container">
	  <div id="welcomeDiv" class="answer_list"  align="center"> 

         			    <h6 class=""><?php echo $fullname ;   ?></h6>
                        <h6 class=""><?php echo $status ;   ?></h6>
						 <h6 class=""><?php echo $row_vaccination ;   ?></h6>

						
						
        </div>
<div class="row justify-content-center mt-4">

  <div class="dragArea row">
	</div>

                <form action="" method="POST" class="mbr-form form-with-styler mx-auto" data-form-title="Form Name">

    <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="name">
      <input type="text" name="txtvaccinationID" data-form-field="name" class="form-control" value="<?php if (isset($_POST['txtvaccinationID']))?><?php echo $_POST['txtvaccinationID']; ?>" id="name-form7-15" required>
    </div>
        <div class="col-auto mbr-section-btn align-center">
      <button type="submit" name="btnverify"  class="btn btn-danger display-4">Verify</button>
    </div>
  </div>
                  </form>

  <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
</div>
</section>

<section class="footer3 cid-s48P1Icc8J" once="footers" id="footer3-u">

    

    

    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">
                    
                    
                    
                    
                    
<section style="background-color: #242526; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/j" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>  <script src="assets/parallax/jarallax.min.js"></script>  <script src="assets/dropdown/js/nav-dropdown.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="assets/theme/js/script.js"></script>
			<?php   include('footer.php'); ?>
</body>
</html>