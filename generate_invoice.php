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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

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
							<h5 class="txt-dark">invoice</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.html">Dashboard</a></li>
								<li><a href="#"><span>special</span></a></li>
								<li class="active"><span>invoice</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
          <?php
              if(isset($_GET['orderId']) && $_GET['orderId'] != "") {

                  $orderId = $_GET['orderId'];
                  $selectOrderId = "SELECT * FROM `orders` WHERE `orderID` = '$orderId'";
                  $selectOrderIdResults = $conn -> query($selectOrderId);
                  if($selectOrderIdResults) { // if Executed
                    $selectOrderIdData = $selectOrderIdResults -> fetch_assoc();
                     $custId = $selectOrderIdData['customerID'];
                     $cusAddressId = $selectOrderIdData['addressID'];
                     $selectCustomerAddress = "SELECT * FROM address ad JOIN customerdetails cd ON ad.customerID=cd.customerID WHERE ad.addressID = '$cusAddressId'";
                     $selectCustomerAddressResults = $conn -> query($selectCustomerAddress);
                     if($selectCustomerAddressResults) { // If Executed
                        $selectCustomerAddressData = $selectCustomerAddressResults -> fetch_assoc();
                        $addressId = $selectCustomerAddressData['addressID'];
          ?>
					<!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
                    <form enctype="multipart/form-data" method="POST" action="addmore.php">
										<h6 class="panel-title txt-dark">Invoice</h6>
									</div>
                  <div class="pull-right">
                    <h6>Order #<?=$orderId;?></h6>
                  </div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-xs-6">
												<span class="txt-dark head-font inline-block capitalize-font mb-5">Billed to:</span>
												<address class="mb-15">
													<span class="address-head mb-5"><?=$selectCustomerAddressData['customerName'];?>, Inc.</span>
                					<?=$selectCustomerAddressData['streetAddress'];?><br>
                          <?=$selectCustomerAddressData['tempCusAddress'];?><br/>
                          <?=$selectCustomerAddressData['area'];?>, <?=$selectCustomerAddressData['pinCode'];?><br/>
												  <abbr title="Phone">P : <?=$selectCustomerAddressData['custPhoneNumber']?></abbr>
												</address>
											</div>
											<div class="col-xs-6 text-right">
												<span class="txt-dark head-font inline-block capitalize-font mb-5">Billed to:</span>
												<address class="mb-15">
													<span class="address-head mb-5">, Inc.</span>
													<br>
													 <br>
													<abbr title="Phone">P:</abbr>
												</address>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-6">
												<address>
													<span class="txt-dark head-font capitalize-font mb-5">payment method:</span>
													<br>
													Visa ending **** 4242<br>
													Email : <?=$selectCustomerAddressData['email'];?>

												</address>
											</div>
											<div class="col-xs-6 text-right">
												<address>
													<span class="txt-dark head-font capitalize-font mb-5">order date:</span> <br/><?=$selectOrderIdData['orderCreatedOn'];?>
													<br><br>
												</address>
											</div>
										</div>
										<div class="seprator-block"></div>

										<div class="invoice-bill-table">
											<div class="table-responsive">

                        <div class="container">

                            <!--<div class="well clearfix">-->
                                    <a class="btn btn-primary pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
                                <!--  </div>-->
                        <table id="tbl_posts" width="150px" border="0"  class="table table-hover display  pb-30">
                          <thead>
                            <tr>
                              <th>Sl.No.</th>
                              <th>Item</th>
                              <th>Description</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Discount</th>
                              <th>Tax Rate</th>
                              <th>Product Unit</th>
                              <th>Totals</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="tbl_posts_body">
                                <tr id="rec-1" class="items">

                                <td><span class="sn">1</span></td>

                                <td>
                                  <input type="text" name="item" class="form-control name_list" id="slno"/>
                                </td>
                                <td>
                                    <input type="text" name="description" class="form-control name_list1"/>
                                </td>
                                <td>
                                    <input type="number" name="qty" class="form-control name_list" />
                                </td>
                                <td>
                                  <input type="number" name="price" class="form-control name_list" />
                                </td>
                                <td>
                                  <input type="number" name="discount" class="form-control name_list" />
                                </td>
                                <td>
                                  <input type="number" name="taxrate" class="form-control name_list" />
                                </td>
                                  <td>
                                    <input type="number" name="productunit" class="form-control name_list" />
                                </td>
                                <td>
                                  <input type="number" name="total" class="form-control name_list" />
                                </td>
                                <td>
                                  <a class="delete-record" data-id="1"><font color="red"><i class="glyphicon glyphicon-trash"></i></font></a> &nbsp; &nbsp;  <a class="delete-record" data-id="1"><font color="blue"><i class="glyphicon glyphicon-pencil"></i></font></a>
                                </td>

                              <!--  <td><input type="button" value="Add Row" onclick="addRow('dataTable')" />  </td>-->

                            </tr>
                          </tbody>
                        </table>
                      </div>

                      <div style="display:none;">
                          <table id="sample_table"  class="table table-hover display  pb-30" >
                            <tr id="" class="items">
                             <td><span class="sn"></span>.</td>

                                         <td>
                                           <input type="text" name="item" class="form-control name_list" id="slno"/>
                                         </td>
                                         <td>
                                             <input type="text" name="description" class="form-control name_list"/>
                                         </td>
                                         <td>
                                             <input type="number" name="qty" class="form-control name_list" />
                                         </td>
                                         <td>
                                           <input type="number" name="price" class="form-control name_list" />
                                         </td>
                                         <td>
                                           <input type="number" name="discount" class="form-control name_list" />
                                         </td>
                                         <td>
                                           <input type="number" name="taxrate" class="form-control name_list" />
                                         </td>
                                           <td>
                                             <input type="number" name="productunit" class="form-control name_list" />
                                         </td>
                                         <td>
                                           <input type="number" name="total" class="form-control name_list" />
                                         </td>
                                         <td>
                                                               <a class="delete-record" data-id="1"><font color="red"><i class="glyphicon glyphicon-trash"></i></font></a> &nbsp; &nbsp;  <a class="delete-record" data-id="1"><font color="blue"><i class="glyphicon glyphicon-pencil"></i></font></a>
                                         </td>
                           </tr>
                         </table>
                       </div>
                       <div class="button-list pull-right">
                         <input type="hidden" name="customerId" id="userID" value="<?=$custId;?>">
                         <input type="hidden" name="addressId" id="addressID" value="<?=$cusAddressId;?>">
                         <input type="hidden" name="orderId" id="userID" value="<?=$orderId;?>">

                         <input type="submit" class="btn btn-success mr-10" id="saveInvoiceButton" value ="Submit">
                         </input>
                         <button type="button" class="btn btn-success mr-10" id="paymentProcessing">
                           Proceed to payment
                         </button>
                         <button type="button" class="btn btn-primary btn-outline btn-icon left-icon" onclick="javascript:window.print();">
                           <i class="fa fa-print"></i><span> Print</span>
                         </button>
                       </div>
  </form>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->

          <?php
                //  }}
              }} else {
                  header("Location:generate_invoice.php?message=No User Found.");
                  }}

          ?>
				</div>

				<!-- Footer -->
				<footer class="footer container-fluid pl-30 pr-30">
					<div class="row">
						<div class="col-sm-12">
							<p>2017 &copy; Powered by CoolHaxlabs</p>
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

		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>

		<!-- Fancy Dropdown JS -->
		<script src="dist/js/dropdown-bootstrap-extended.js"></script>

		<!-- Owl JavaScript -->
		<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

		<!-- Switchery JavaScript -->
		<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>

		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>

    <!-- Add Table Row -->
    <!--<script>
    $("tr.items").each(function() {
        var quantity1 = $(this).find("input.form-control name_list").val(),
         quantity2 = $(this).find("input.form-control name_list1").val();
        alert(quantity1);
        alert(quantity2);
      });
  </script>-->
  <script>
    jQuery(document).delegate('a.add-record', 'click', function(e) {
      e.preventDefault();
      var content = jQuery('#sample_table tr'),
      size = jQuery('#tbl_posts >tbody >tr').length + 1,
      element = null,
      element = content.clone();
      element.attr('id', 'rec-'+size);
      element.find('.delete-record').attr('data-id', size);
      element.appendTo('#tbl_posts_body');
      element.find('.sn').html(size);
      });
    </script>
    <!--Delete table row-->
    <script>
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

    </script>
    <!--<script>


      $(document).ready(function(){

          var table = document.getElementById('sample_table');
          var findElement =
          $.each()

      });

    </script>-->
	</body>
</html>
