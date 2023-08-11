<?php
session_start();
error_reporting(0);
include('connect.php');

date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');

if(isset($_POST["btnregister"]))
{

$fullname = mysqli_real_escape_string($conn,$_POST['txtfullname']);
$vaccinationID = mysqli_real_escape_string($conn,$_POST['txtvaccinationID']);
$sex = mysqli_real_escape_string($conn,$_POST['radsex']);
$email = mysqli_real_escape_string($conn,$_POST['txtemail']);
$phone = mysqli_real_escape_string($conn,$_POST['txtphone']);
$IDtype = mysqli_real_escape_string($conn,$_POST['cmdIDtype']);
$age = mysqli_real_escape_string($conn,$_POST['txtage']);
$work = mysqli_real_escape_string($conn,$_POST['radwork']);
$address = mysqli_real_escape_string($conn,$_POST['txtaddress']);
$category = mysqli_real_escape_string($conn,$_POST['cmdcategory']);
$center = mysqli_real_escape_string($conn,$_POST['cmdcenter']);
$date = mysqli_real_escape_string($conn,$_POST['txtdate']);
$slot = mysqli_real_escape_string($conn,$_POST['cmdslot']);



  $sql = "SELECT * FROM users where email='$email'";
  $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
$error =' Email already Exist ';

}else{


//save users details
$query = "INSERT into `users` (vaccinationID,fullname,email,sex,phone,age,ID_type,address,work,health_facility,vaccination_center,vaccinationDate,timeslot,status)
VALUES ('$vaccinationID','$fullname','$email','$sex','$phone','$age','$IDtype','$address', '$work','$category','$center','$date', '$slot','Not Available')";

$result = mysqli_query($conn,$query);
if($result){
	
//SEnd Verification code Via SMS
$username='xxxxx@gmail.com';//Note: urlencodemust be added forusernameand 
$password='xxxxxxx';// passwordas encryption code for security purpose.
$sender='COVID-19';

$url = "http://portal.nigeriabulksms.com/api/?username=".$username."&password=".$password."&message="."Your Vaccination Code for Verification is :  ".$vaccinationID."&sender=".$sender."&mobiles=".$phone;

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, 0);
$resp = curl_exec($ch);

	
	$_SESSION['fullname']= $fullname;	
	$_SESSION['vaccinationID']= $vaccinationID;	
    	$_SESSION['date']= $date;	
	$_SESSION['slot']= $slot;	
	$_SESSION['center']= $center;	
//$msg_success = 'Registration Was Successful';
  header("Location: slip.php"); 

} else {
$error = 'Something Went Wrong';

}
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
  
  
  <title>Register|Covid-19 Directory for Vaccination</title>
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
  
    <script>
    
function showcenter(str)
{
if (str=="")
  {
  document.getElementById("cmdcenter").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("cmdcenter").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","hospital.php?cmdcategory="+str,true);
xmlhttp.send();
}
</script>

  
  
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
            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="vaccination_centers.php">Vaccination Centres</a></li>
            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="verification.php">Verification Panel</a></li>
          </ul>
        </div>
      </div>
    </nav>
</section>

<section class="form7 cid-sFRWpp71BS" id="form7-15">
    
    <div class="mbr-overlay"></div>
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Register Now&nbsp;</strong></h3>
            
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-12 mx-auto mbr-form" data-form-type="formoid">
                <form action="" method="POST" class="mbr-form form-with-styler mx-auto" data-form-title="Form Name">
                    <p class="mbr-text mbr-fonts-style align-center mb-4 display-7">
	<?php if($success){?>
                            <div class="alert alert-success alert-dismissable">
                                Congrat: <?php echo ($success); ?>
                            </div><?php } 
                            else if($error){?>

                            <div class="alert alert-danger alert-dismissable">
                                Problem: <?php echo htmlentities($error); ?>
                            </div>
                                <?php } ?>
                    </p>
                    <div class="row">
												
                    </div>
					
			        <div class="dragArea row">
					<p><strong>Vaccination ID</strong></p>
               <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="name">
               <input type="text" name="txtvaccinationID" data-form-field="name" class="form-control" value="<?php function generatePIN($digits = 8){ $i = 0; //counter
			$pin = ""; //our default pin is blank.
            while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 11);
        $i++;
    }
    return $pin;
}
 //If I want a 4-digit PIN code.
$appid = "V";
//$appid_end = "AKS".
$pin = generatePIN();
echo $appid.$pin;?>" id="name-form7-15" readonly>
                        </div>
						
                              <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="name">
                            <input type="text" name="txtfullname" placeholder="Full Name" data-form-field="name" class="form-control" value="<?php if (isset($_POST['txtfullname']))?><?php echo $_POST['txtfullname']; ?>" id="name-form7-15">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="name">
                            <input type="email" name="txtemail" placeholder="Email" data-form-field="name" class="form-control" value="<?php if (isset($_POST['txtemail']))?><?php echo $_POST['txtemail']; ?>" id="name-form7-15">
                        </div>
            <p><strong>Sex</strong></p>
                  <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="male">
                    <input type="radio" id="Male" name="radsex" value="male">
                    <label for="huey">Male</label>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="female">
                    <input type="radio" id="Female" name="radsex" value="female" >
                    <label for="dewey">Female</label>
                  </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="occupation">
                            <input type="text" name="txtphone" placeholder="Phone" data-form-field="occupation" class="form-control" value="<?php if (isset($_POST['txtphone']))?><?php echo $_POST['txtphone']; ?>" id="name-form7-15">
                      </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="address">
                            <input type="num" name="txtage" placeholder="Enter Your Approximate Age" data-form-field="address" class="form-control" value="<?php if (isset($_POST['txtage']))?><?php echo $_POST['txtage']; ?>" id="name-form7-15">
                      </div>
             
			 <p><strong>Type of ID</strong></p>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="address">
				<select name="cmdIDtype" id="type" class="custom-select">
				<option value="">Select</option>
				<option value="National ID(NIN)">National ID(NIN)</option>
				<option value="PVC">PVC</option>
				<option value="Driver's License">Driver's License</option>
				<option value="International Passport">International Passport</option>
			</select>
                      </div>
            			 <p><strong>Address</strong></p>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="address">
			   <textarea id="w3review" name="txtaddress" rows="4" cols="50" data-form-field="address" class="form-control" value="<?php if (isset($_POST['txtaddress']))?><?php echo $_POST['txtaddress']; ?>" id="name-form7-15">
</textarea>
             </div>
             <p><strong>Work Information </strong></p>
			    <p>Do You work in the Health industry?....</p>
                  <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="male">
                    <input type="radio" id="Male" name="radwork" value="Yes" >
                    <label for="huey">Yes</label>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="female">
                    <input type="radio" id="Female" name="radwork" value="No">
                    <label for="dewey">No</label>
                  </div>

 <p><strong>Preferred health Facility Type</strong></p>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="address">
				<select name="cmdcategory" class="form-last-name form-control" id="cmdcategory" onChange="showcenter(this.value)">
          <option value="">Select your Preferred health Facility Type</option>
          <option value="Private">Private</option>
          <option value="Public">Public</option>

        </select>                      </div>	
					  		<p><strong>Prefered Centre for Vaccination</strong></p>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="address">
				<select name="cmdcenter" class="form-last-name form-control" class="active" id="cmdcenter">
        <option>Select Prefered Centre for Vaccination</option>
        </select>
                      </div>
            
          <p><strong>Prefered Vaccination Date</strong></p>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="address">
			  <input type="date" name="txtdate" data-form-field="address" class="form-control" value="" id="name-form7-15">
                      </div>
<p><strong>Preferred time slot (Select from the available time slots for your vaccination site)</strong></p>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="address">
				<select name="cmdslot" id="type" class="custom-select">
				<option value="">Select</option>
				<option value="Morning">Morning</option>
				<option value="Afternoon">Afternoon</option>
			</select>
                      </div>
         
                        <div class="col-auto mbr-section-btn align-center"><button type="submit" name="btnregister" class="btn btn-danger display-4">Submit</button></div>
                    </div>
                </form>
            </div>
        </div>
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