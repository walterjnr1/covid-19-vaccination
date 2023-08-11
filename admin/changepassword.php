<?php
include('header.php');
$username = $_SESSION['username'];

 ?>
<?php


  $q = "select * from admin where username = '$username'";
  $q1 = $conn->query($q);
  while($row = mysqli_fetch_array($q1)){
    extract($row);
    $db_pass = $row['password'];
	$email = $row['email'];
  }

 if(isset($_POST["btnchange"])){
$old = mysqli_real_escape_string($conn,$_POST['txtold_password']);
$pass_new = mysqli_real_escape_string($conn,$_POST['txtnew_password']);
$confirm_new = mysqli_real_escape_string($conn,$_POST['txtconfirm_password']);

  
  if($db_pass!=$old){ ?> 
    <?php $_SESSION['error']='Old Password not matched';?>
   <!--  <script>
    alert('OLD Paasword not matched');
    </script> -->
  <?php } else if($pass_new!=$confirm_new){ ?> 
    <?php $_SESSION['error']='NEW Password and CONFIRM password not Matched';?>
   <!--  <script>
    alert('NEW Password and CONFIRM password not Matched');
    </script> -->
  <?php } else {
    //$pass = md5($_POST['password']);
   $sql = "update admin set `password`='$confirm_new' where username= '".$_SESSION['username']."'";
  $res = $conn->query($sql);
  
  
  ?>
   <?php $_SESSION['success']='Password changed Successfully...';?>
  <script>
    //alert('Password changed Successfully...');
    window.location ="logout.php";
  </script> 
  <?php
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
                              <h3 class="m-t-none m-b"> Change Password </h3>
                                <form role="form" method="POST">
                                    <div class="form-group"><strong>
                                    <label>Old Password</label></strong>
                                    <input type="text" name="txtold_password" value="<?php if (isset($_POST['txtold_password']))?><?php echo $_POST['txtold_password']; ?>" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									 <div class="form-group"><strong>
                                    <label>New Password</label></strong>
                                    <input type="password" name="txtnew_password" value="<?php if (isset($_POST['txtnew_password']))?><?php echo $_POST['txtnew_password']; ?>" placeholder="Enter New Password" class="form-control" required="">
                                    </div>
									 <div class="form-group"><strong>
                                    <label>Confirm New Password</label></strong>
                                    <input type="password" name="txtconfirm_password" value="<?php if (isset($_POST['txtconfirm_password']))?><?php echo $_POST['txtconfirm_password']; ?>" placeholder="Confirm New Password" class="form-control" required="">
                                    </div>
									
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="btnchange"><strong>Change Password</strong></button>
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
