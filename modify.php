<?php
/*
     * Name : Dashboard
     * Author : Sikha Raj
     * Company : CoolHax Labs
     * Description : Gives you overview and summary
     *
     */

session_start(); // Start Session

include_once "includes/db_connect.php"; //DB Connection script

if(!isset($_SESSION['bazooka'])) { // if session not set
    header('Location:index.php?message=Please Login and try.');

} else { // if set get the email
    $email = $_SESSION['bazooka'];
    $selectAdminQuery = "SELECT * FROM `users` WHERE `email` = '$email'";
    $selectAdminDataResult = $conn -> query($selectAdminQuery);
    if ($selectAdminDataResult) { //Successfully execute SQL Query
        $selectAdminData = $selectAdminDataResult->fetch_assoc();
    } else { //couldn't execute SQL Query
        session_destroy();
        header('Location:index.php?Please Login Again!');
    }
}
   $selectAllQuickOrders = "SELECT * FROM `orders`";
   $selectAllQuickOrdersResults = $conn -> query($selectAllQuickOrders);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Exelinserv || Admin Panel</title>
	<meta name="description" content="Philbert is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Philbert Admin, Philbertadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper theme-1-active pimary-color-green">

         <?php include "includes/header.php";?>

		<?php include "includes/nav.php";?>
		<!-- Right Sidebar Menu -->
      <?php include "includes/right_sidebar.php"?>
    <!-- /Right Sidebar Menu -->

		<!-- Right Sidebar Backdrop -->
		<div class="right-sidebar-backdrop"></div>
		<!-- /Right Sidebar Backdrop -->

		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">

				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Customer Bookings</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>Booking</span></a></li>
						<li class="active"><span>Details</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="example" class="table table-hover display  pb-30" >
												<thead>
													<tr>
                            <th>Sl.No.</th>
                            <th>Name</th>
                            <th>Vehicle Name</th>
                            <th>CreatedOn</th>
                            <th>Status</th>
                            <th>Issue</th>
                            <th>Phone</th>
                            <th>Service</th>
                            <th>Action</th>
													</tr>
												</thead>
												<tbody>
                          <?php
                  if($selectAllQuickOrdersResults) { // if Executed
                      while ($selectAllQuickOrdersData = $selectAllQuickOrdersResults -> fetch_assoc()) {
                  ?>
													<tr>
                            <td><?=$selectAllQuickOrdersData['orderID'];?></td>
                            <td><?=$selectAllQuickOrdersData['name'];?></td>
                            <td><?=$selectAllQuickOrdersData['vehicleName'];?></td>
                            <td><?=$selectAllQuickOrdersData['orderCreatedOn'];?></td>
                            <td><?=$selectAllQuickOrdersData['orderStatus'];?></td>
                            <td><?=$selectAllQuickOrdersData['issue'];?></td>
                            <td><?=$selectAllQuickOrdersData['phone'];?></td>
                            <td><?=$selectAllQuickOrdersData['serviceType'];?></td>
                            <td><a href="delete_order.php?orderId=<?=$selectAllQuickOrdersData['orderID'];?>" class="delete-record" data-id="1"><font color="red"><i class="glyphicon glyphicon-trash"></i></font></a><br/>
                            <a href="edit_order.php?orderId=<?=$selectAllQuickOrdersData['orderID'];?>" class="delete-record" data-id="1"><font color="blue"><i class="glyphicon glyphicon-pencil"></i></font></a></td>
                            <!--<td><a class="delete-record" data-id="1"><font color="blue"><i class="glyphicon glyphicon-pencil"></i></font></a></td>
                          --></tr>
                          <?php
                      }
                  } else { //if didn't execute
                      echo "Unable to process Please try again later";
                  }
                  ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
			</div>

			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p>2017 &copy; Exelinserv. Pampered by CoolHaxLabs</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->

		</div>
		<!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

	<!-- JavaScript -->

    <!-- jQuery -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="vendors/bower_components/jszip/dist/jszip.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>

	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="dist/js/export-table-data.js"></script>

	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>

	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>


	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>

  <!--<script>
  jQuery(document).delegate('a.delete-record', 'click', function(e) {
       e.preventDefault();
       var didConfirm = confirm("Are you sure You want to delete");
       if (didConfirm == true) {
        var id = jQuery(this).attr('data-id');
        var targetDiv = jQuery(this).attr('targetDiv');
        jQuery('#rec-' + id).remove();

      //regnerate index number on table
      $('#tbl_posts_body tr').each(function(index) {
        //alert(index);
        $(this).find('span.sn').html(index+1);
      });
      return true;
    } else {
      return false;
    }
  });

</script>-->

</body>

</html>
