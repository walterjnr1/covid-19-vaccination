<?php
include('header.php');

date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');



$id=($_GET['id']);
$vid=($_GET['vid']);

if(isset($_POST['btnchange']))
{

$status=$_POST['cmdstatus'];

$type=$_POST['cmdtype'];
$center=$_POST['cmdsite'];
$dose=$_POST['txtdose'];
	
	
	
	
	
	
$sql = " update users set status='$status' where ID='$id'";
if (mysqli_query($conn, $sql)) {


//save users details
$query = "INSERT into `vaccination` (vaccinationID,vaccination_type,center,dose,vaccination_date)
VALUES ('$vid','$type','$center','$dose','$current_date')";

$result = mysqli_query($conn,$query);
header("Location: user-record.php"); 
}
}
?>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 b-r">
                              <h3 class="m-t-none m-b"> Update Covid-19 Status </h3>
                                <form role="form" method="POST">
                                    <div class="form-group"><strong>
<select name="cmdstatus" id="select" class="form-control" required="">
    <option value = "">Select</option>
    <option value = "Not Available">Not Available</option>
    <option value = "Negative">Negative</option>
    <option value = "Positive">Positive</option>

      </select>                                    
	   </div>
	        <div class="form-group"><strong>
<select name="cmdsite" id="select" class="form-control" required="">
    <option value = "">Select Vaccination Site</option>
    <option value="Abak Operational Base Primary Health Centre,Abak">Abak Operational Base Primary Health Centre,Abak</option>
				<option value="Abiakpo Health Centre,Abak">Abiakpo Health Centre,Abak</option>
				<option value="Mercy Hospital,Abak">Mercy Hospita,Abak</option>
				<option value="Ukpom General Hospital,Abak">Ukpom General Hospital,Abak</option>				
				<option value="Afaha Ikot Ebak Primary Health Centre,Essien Udim">Afaha Ikot Ebak Primary Health Centre,Essien Udim  </option>
				<option value="Ukana East Primary Health Centre,Essien Udim">Ukana East Primary Health Centre,Essien Udim</option>
				<option value="Cottage Hospital,Ukana,Essien Udim">Cottage Hospital, Ukana, Essien Udim</option>
				<option value="Uniuyo Medical Centre,Uyo">Uniuyo Medical Centre,uyo</option>
				<option value="St Luke's Hospital,Uyo">St Luke's Hospital,Uyo</option>
				<option value="Ikot Akpan Abia Police Medical Centre,Uyo">Ikot Akpan Abia Police Medical Centre,Uyo</option>
				<option value="Ikot Okubo Health Centre,uyo">Ikot Okubo Health Centre,Uyo</option>
				<option value="University Teaching Hospital,Uyo">University Teaching Hospital,Uyo</option>
				<option value="General Hospital,Ikot Ekpene">General Hospital,Ikot Ekpene</option>
				<option value="Ikot Ekpene Primary Health Centre Operational Base,Ikot Ekpene">Ikot Ekpene Primary Health Centre Operational Base,Ikot Ekpene</option>
				<option value="Abiakpo Ikot Essien Health Centre,Ikot Ekpene">Abiakpo Ikot Essien Health Centre,Ikot Ekpene</option>
      </select>                                    
	   </div>
	           <div class="form-group"><strong>
<select name="cmdtype" id="select" class="form-control" required="">
    <option value = "">Select Type</option>
    <option value = "AstraZeneca/Oxford ">AstraZeneca/Oxford </option>
    <option value = "Comirnaty">Comirnaty</option>
    <option value = "Spikevax">Spikevax</option>
 <option value = "Sputnik V">Sputnik V</option>
    <option value = "Ad26.COV2.S">Ad26.COV2.S</option>
      </select>                                    
	   </div>
	     <div class="form-group"><strong>
              <input type="num" name="txtdose" placeholder="Enter No. of Dose" data-form-field="address" class="form-control" value="<?php if (isset($_POST['txtdose']))?><?php echo $_POST['txtdose']; ?>" id="name-form7-15">
                                 
	   </div>

									
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="btnchange"><strong>Update </strong></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                
                                <p class="text-center">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-lg-5"></div>
            </div>
            <div class="row"></div>
        </div>
        <div class="footer">
            <div class="pull-right"></div>
            <div><?php  include('footer.php'); ?></div>
        </div>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
		<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Success</strong> 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Error</strong> 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
</body>

</html>
