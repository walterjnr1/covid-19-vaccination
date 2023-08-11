<?php
session_start();
error_reporting(0);
include('../connect.php');
if(strlen($_SESSION['username'])=="")
    {   
    header("Location: login.php"); 
    }
    else{
	}
      
$username = $_SESSION["username"];

if(isset($_POST['btnsubmit']))
{
$id=($_GET['id']);

$status=$_POST['cmdstatus'];
	
$sql = " update users set status='$status' where vaccinationID='$id'";
if (mysqli_query($conn, $sql)) {

header("Location: vaccination-record.php"); 
}
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vaccination Record|Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<link rel="icon" type="image/png" sizes="16x16" href="images/logo.png">

</head>

   <script type="text/javascript">
		function deldata(fullname){
if(confirm("ARE YOU SURE YOU WISH TO DELETE " + " " + fullname+ " " + " FROM THE LIST?"))
{
return  true;
}
else {return false;
}
	 
}

</script>
<script type="text/javascript">
function Activate(fullname){
if(confirm("ARE YOU SURE YOU WISH TO Activate " + " " + fullname+ " " + " ON THE LIST?"))
{
return  true;
}
else {return false;
}
	 
}

</script>
<script type="text/javascript">
function Deactivate(username){
if(confirm("ARE YOU SURE YOU WISH TO Deactivate " + " " + username+ " " + " ON THE LIST?"))
{
return  true;
}
else {return false;
}
	 
}

</script>
<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
               
			   <?php
			   include('sidebar.php');
			   
			   ?>
			   
	       </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Covid-19 Directory on Vaccination.</span>
                </li>
                <li class="dropdown">
                   
                    


                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
               
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>&nbsp;</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                       
                        <li class="active">
                            <strong>Vaccination Record</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                  <div class="ibox-title">
                       
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
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                  </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
									
										  
					                    <tr>
                        <th>#</th>
                        <th>Fullname</th>
                        <th>Vaccination ID</th>
                        <th>Type Of Vaccination </th>
                        <th>Vaccination Center</th>
						<th>Vaccination Dose</th>
						<th>Vaccination Date</th>
						<th>Status</th>
		 </tr>
                    </thead>
                    <tbody>
					<?php 
					$sql="SELECT v.vaccinationID, v.vaccination_type,v.center,v.dose,v.vaccination_date,u.fullname,u.status FROM users AS u JOIN vaccination AS v ON u.vaccinationID = v.vaccinationID order by v.vaccination_date ";
                                           $result = $conn->query($sql);
											$cnt=1;
                                          while($row = $result->fetch_assoc()) { 
										 $id= $row['vaccinationID'];
										  ?>

                    <tr class="gradeX">
                        <td><?php echo $cnt;  ?></td>
                        <td><?php echo $row['fullname'];  ?> </td>
                        <td><?php echo $row['vaccinationID'];  ?></td>
						<td><?php echo $row['vaccination_type'];  ?> </td>
                        <td><?php echo $row['center'];  ?></td>
						   <td><?php echo $row['dose'];  ?> </td>
                        <td><?php echo $row['vaccination_date'];  ?></td>
                         <td>    
			      <?php if($row['status']=="Not Available"){ ?>
			   <span class="badge badge-warning"><?php echo $row['status'];  ?></span>
			   <?php } elseif($row['status']=="Negative"){?>
			   			   <span class="badge badge-success"><?php echo $row['status'];  ?></span>
			   <?php } else{?>
			   			   <span class="badge badge-danger"><?php echo $row['status'];  ?></span><?php } ?>

			   </td>
                      </tr>
                      <?php $cnt=$cnt+1;} ?>

                    </tbody>
                    <tfoot>
                    </tfoot>
                    </table>
					<div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">

                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Update User Status</h4>
                                            <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                        </div>
                                        <div class="modal-body">
                                           <?php
			   include('form.php');
			   
			   ?>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
					
					
					
					
					
					
					
					
					
					
					
                        </div>

                    </div>
                </div>
            </div>
            </div>
          <div class="row"></div>
        </div>
        <div class="footer">
            <div class="pull-right">
            </div>
            <div>
			<?php include('footer.php');  ?>
			</div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
<style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>
</body>

</html>
