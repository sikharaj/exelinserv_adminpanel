<?php
/*
     * Name : Dashboard
     * Author : Swapnil Ghose
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
    $selectAdminQuery = "SELECT * FROM `customerdetails` WHERE `email` = '$email'";
    $selectAdminDataResult = $conn -> query($selectAdminQuery);
    if ($selectAdminDataResult) { //Successfully execute SQL Query
        $selectAdminData = $selectAdminDataResult->fetch_assoc();
    } else { //couldn't execute SQL Query
        session_destroy();
        header('Location:index.php?Please Login Again!');
    }
}

    //Select All vehicles from the Table
    $selectAllCars = "SELECT * FROM `allVehicles` WHERE `type` = 'Car'";
    $selectAllBikes = "SELECT * FROM `allVehicles` WHERE `type` = 'Bike'";
    $selectAllCustomers = "SELECT * FROM `customerdetails`";
    //$selectAllCustomers = "SELECT * FROM `customerdetails`";

    $selectAllCarsResult = $conn -> query($selectAllCars);
    $selectAllBikesResult = $conn -> query($selectAllBikes);
    $selectAllCustomersResult = $conn -> query($selectAllCustomers);


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

		<!-- vector map CSS -->
		<link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>

		<!-- Custom CSS -->
		<link href="dist/css/style.css" rel="stylesheet" type="text/css">
    <script>
    function loadVehicledata() {
        var type =  document.getElementById("vehicleType");
        var selection = type.options[type.selectedIndex].value;
        if(selection === "Car") {
            document.getElementById("vehicleName").setAttribute("list","carList");
            document.getElementById("vehicleName").setAttribute("placeholder","Honda City");
        } else if (selection ==="Bike") {
            document.getElementById("vehicleName").setAttribute("list","bikeList");
            document.getElementById("vehicleName").setAttribute("placeholder","Bajaj Dominar");
        }
    }
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
							<h5 class="txt-dark">Admin Panel</h5>
						</div>

						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.html">Dashboard</a></li>
								<li><a href="#"><span>Update</span></a></li>
								<li class="active"><span>Order</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->

					</div>
					<!-- /Title -->
											<!--Row-->
															<!--<div class="panel-wrapper collapse in">
																<div class="panel-body">-->
                                  <form name="ordercreation" method="POST" action="includes/update-order.php">
																	<div class="row">
																		<div class="col-md-12">
																			<div class="panel panel-default card-view">
																				<div class="panel-heading">
																					<div class="pull-left">
																						<h6 class="panel-title txt-dark">Order Informations</h6>
																					</div>
																					<div class="clearfix"></div>
																				</div>
																			<!--<div class="form-wrap">
																				<form>-->
																				<?php
																					if(isset($_GET['orderId']) && $_GET['orderId'] != "") {
																						    $orderId = $_GET['orderId'];
																						    $selectOrderDetails = "SELECT * FROM `orders` WHERE `orderID` = '$orderId'";
																							  $selectOrderDetailResults = $conn -> query($selectOrderDetails);
																							  if($selectOrderDetailResults) { // if Executed
																									$selectOrderDetailData = $selectOrderDetailResults -> fetch_assoc();

																					?>
                                          <div class="panel-wrapper collapse in">
																					<div class="panel-body">
																						<div class="row">
																							<div class="col-sm-12 col-xs-12">
																								<div class="form-wrap">

																										<div class="form-group col-sm-4 col-xs-4">
																											<label class="control-label mb-10" for="exampleInputuname_1">Name</label>
																												<div class="input-group">
																													<div class="input-group-addon"><i class="icon-user"></i></div>
																													<input type="text" name="name" class="form-control" value="<?=$selectOrderDetailData['name'];?>" placeholder="Enter firstname" readonly>
																												</div>
																											</div>
																											<div class="form-group col-sm-4 col-xs-4">
																												<label class="control-label mb-10" for="exampleInputuname_1">Vehicle Name</label>
																													<div class="input-group">
																														<div class="input-group-addon"><i class="icon-user"></i></div>
																														<input type="text" name="vehicleName" class="form-control" value="<?=$selectOrderDetailData['vehicleName'];?>" placeholder="Enter lastname" readonly>
																													</div>
																												</div>
																											<div class="form-group col-sm-4 col-xs-4">
																												<label class="control-label mb-10" for="exampleInputuname_1">Phone Number</label>
																													<div class="input-group">
																														<div class="input-group-addon"><i class="icon-phone"></i></div>
																														<input type="tel" name="phone" class="form-control" id="exampleInputuname_1" value="<?=$selectOrderDetailData['phone'];?>" placeholder="Enter phone number">
																													</div>
																												</div>
																											<div class="form-group col-sm-4 col-xs-4">
																												<label class="control-label mb-10" for="exampleInputuname_1">Oder Created On</label>
																													<div class="input-group">
																														<div class="input-group-addon"><i class="icon-calender"></i></div>
																														<input type="datetime" name="createdon" class="form-control" id="" value="<?=$selectOrderDetailData['orderCreatedOn'];?>" placeholder="Order Created On" readonly>
																													</div>
																												</div>
                                                        <div class="form-group col-sm-4 col-xs-4">
                                                          <label class="control-label mb-10" for="exampleInputuname_1">Pick-up Date</label>
                                                            <div class="input-group">
                                                              <div class="input-group-addon"><i class="icon-calender"></i></div>
                                                              <input type="datetime-local" name="pickUpDate" class="form-control" id="pickupdate" value="<?=$selectOrderDetailData['pickupDateNdTime'];?>" placeholder="">
                                                            </div>
                                                          </div>
                                                        <div class="form-group col-sm-4 col-xs-4">
                                                          <label class="control-label mb-10 text-left">Drop-off Date</label>
                                                          <div class="input-group date' id='datetimepicker1'">
                                                            <div class="input-group-addon"><i class="icon-calender"></i></div>
                                                            <input type="datetime-local" name="dropDate" class="form-control" id="dropdate" value="<?=$selectOrderDetailData['pickupDateNdTime'];?>" placeholder="">
                                                          </div>
                                                        </div>
																											<div class="row">
																												<div class="col-md-12">
																													<div class="panel panel-default card-view">
																														<div class="panel-heading">
																															<div class="pull-left">
																																<h4 class="panel-title txt-dark"><font color="#A9A9A9">Extra Information</font></h4>
																															</div>
																															<div class="clearfix"></div>
																														</div>
                                                      <div class="panel-wrapper collapse in">
																												<div class="panel-body">
																													<div class="row">
																														<div class="col-sm-12 col-xs-12">
																															<div class="form-wrap">
                                                                <div class="form-group col-sm-3 col-xs-3">
                                                                  <label class="control-label mb-10" for="exampleInputpwd_1">Vehicle Type</label>
                                                                  <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-car"></i></div>
                                                                      <select id="vehicleType" name="vehicleType" class="form-control" onchange="loadVehicledata()">
                                                                      <option value="<?=$selectOrderDetailData['vehicleType'];?>"><?=$selectOrderDetailData['vehicleType'];?></option>
                                                                      <option value="Bike">Bike</option>
                                                                      <option value="Car">Car</option>
                                                                    </select>
                                                                    </div>
                                                                  </div>
                                                                      <datalist id="carList">
                                                                          <?php
                                                                              while($carRow = $selectAllCarsResult->fetch_assoc()) {
                                                                              $carName = $carRow['brand']." ".$carRow['model'];
                                                                          ?>
                                                                            <option value="<?=$carName;?>">
                                                                          <?php

                                                                          }
                                                                          ?>
                                                                      </datalist>
                                                                      <datalist id="bikeList">
                                                                          <?php
                                                                              while($bikeRow = $selectAllBikesResult->fetch_assoc()) {
                                                                              $bikeName = $bikeRow['brand']." ".$bikeRow['model'];
                                                                          ?>
                                                                            <option value="<?=$bikeName;?>">
                                                                          <?php
                                                                          }
                                                                          ?>
                                                                      </datalist>
                                                              <div class="form-group col-sm-3 col-xs-3">
																																	<label class="control-label mb-10" for="exampleInputpwd_1">Vehicle Brand</label>
																																	<div class="input-group">
																																		<div class="input-group-addon"><i class="icon-support"></i></div>
                                                                    <input type="text" class="form-control" id="vehicleName" name="vehicleName" placeholder="Hero" required="required" list="carList" value="<?=$selectOrderDetailData['vehicleName'];?>">
																																		</div>
																																</div>
                                                                <div class="form-group col-sm-3 col-xs-3">
                                                                    <label class="control-label mb-10" for="exampleInputuname_1">Vehicle Color</label>
                                                                      <div class="input-group">
                                                                        <div class="input-group-addon"><i class="icon-list"></i></div>
                                                                        <select name="vehiclecolor" class="form-control" id="exampleInputpwd_1">
                                                                        <option value="<?=$selectOrderDetailData['vehicleColor'];?>"><?=$selectOrderDetailData['vehicleColor'];?></option>
                                                                        <option value="Air Force blue">Air Force blue</option>
                                                                        <option value="Alice blue">Alice blue</option>
                                                                        <option value="Alizarin crimson">Alizarin crimson</option>
                                                                      </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-3 col-xs-3">
                                                                        <label class="control-label mb-10" for="exampleInputpwd_1">Fuel Variant</label>
                                                                        <div class="input-group">
                                                                          <div class="input-group-addon"><i class="icon-drop"></i></div>
                                                                            <select name="fuelvariant" class="form-control">
                                                                            <option value="<?=$selectOrderDetailData['fuelVariant'];?>"><?=$selectOrderDetailData['fuelVariant'];?></option>
                                                                            <option value="Petrol">Petrol</option>
                                                                            <option value="Diesel">Diesel</option>
                                                                          </select>
                                                                          </div>
                                                                        </div>
                                                                        <div class="form-group col-sm-3 col-xs-3">
                                                                          <label class="control-label mb-10" for="exampleInputpwd_1">Kilometer Reading</label>
                                                                          <div class="input-group">
                                                                            <div class="input-group-addon"><i class="icon-clock"></i></div>
                                                                            <input type="number" class="form-control" name="meterReading" value="<?=$selectOrderDetailData['kiloMeterReading'];?>">
                                                                            </div>
                                                                          </div>
                                                                          <div class="form-group col-sm-3 col-xs-3">
                                                                            <label class="control-label mb-10" for="servicetype">Service Type</label>
                                                                            <div class="input-group">
                                                                              <div class="input-group-addon"><i class="icon-wrench"></i></div>
                                                                                <select name="servicetype" id="servicetype" class="form-control">
                                                                                <option value="<?=$selectOrderDetailData['serviceType'];?>"><?=$selectOrderDetailData['serviceType'];?></option>
                                                                                <option>SELECT SERVICE TYPE</option>
                                                                                <option value="Regular Checkup">Regular Check-up</option>
                                                                                <option value="General Diagnostics">General Diagnostics</option>
                                                                                <option value="Washing & Polishing">Washing & Polishing</option>
                                                                                <option value="Denting & Painting">Denting & Painting</option>
                                                                                <option value="Breakdown Assitance">Breakdown Assitance</option>
                                                                                <option value="Detailing">Detailing</option>
                                                                                <option value="Vehicle Insurance">Vehicle Insurance</option>
                                                                              </select>
                                                                              </div>
                                                                          </div>

                                                                      <div class="form-group col-sm-3 col-xs-3">
                                                                          <label class="control-label mb-10" for="exampleInputuname_1">Service Preference</label>
                                                                            <div class="input-group">
                                                                              <div class="input-group-addon"><i class="icon-anchor"></i></div>
                                                                              <select name="preference" class="form-control" id="exampleInputpwd_1">
                                                                              <option value="<?=$selectOrderDetailData['preferenceService'];?>"><?=$selectOrderDetailData['preferenceService'];?></option>
                                                                              <option>SELECT SERVICE PREFERENCE</option>
                                                                              <option value="Pickup">Pickup</option>
                                                                              <option value="Walk-in">Walk-in</option>
                                                                            </select>
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group col-sm-3 col-xs-3">
                                                                        <label class="control-label mb-10" for="exampleInputpwd_1">Order Status</label>
                                                                        <div class="input-group">
                                                                          <div class="input-group-addon"><i class="icon-check"></i></div>

                                                                            <select name="oderstatus" class="form-control" id="exampleInputpwd_1">
                                                                              <option value="<?=$selectOrderDetailData['orderStatus'];?>"><?=$selectOrderDetailData['orderStatus'];?></option>
                                                                            <option value="NULL">SELECT ORDER STATUS</option>
                                                                            <option value="Placed">Placed</option>
                                                                            <option value="Unconfirmed">Unconfirmed</option>
                                                                            <option value="Confirmed">Confirmed</option>
                                                                            <option value="Picked-up/Walk-in">Picked-up/Walk-in</option>
                                                                            <option value="Inprogress">Inprogress</option>
                                                                            <option value="Delivered">Delivered</option>
                                                                          </select>
                                                                          </div>
                                                                      </div>
                                                                <div class="form-group col-sm-3 col-xs-3">
																																	<label class="control-label mb-10" for="issue">Issue</label>
																																		<div class="input-group">
																																			<div class="input-group-addon"><i class="icon-note"></i></div>
																																			<input type="text" name="issue" class="form-control" id="issue" value="<?=$selectOrderDetailData['issue'];?>" placeholder="Enter an issue">
																																		</div>
																																	</div>
                                                                  <div class="form-group col-sm-3 col-xs-3">
																																		<label class="control-label mb-10" for="exampleInputuname_1">Total Payment</label>
																																			<div class="input-group">
																																				<div class="input-group-addon"><i class="icon-wallet"></i></div>
																																				<input type="number" name="totalpayment" class="form-control" id="totalPayment" value="<?=$selectOrderDetailData['totalPayment'];?>" placeholder="Total Estimated amount">
																																			</div>
																																	</div>
                                                                  <div class="form-group col-sm-3 col-xs-3">
																																			<label class="control-label mb-10" for="exampleInputuname_1">Advance Payment</label>
																																				<div class="input-group">
																																					<div class="input-group-addon"><i class="icon-wallet"></i></div>
																																					<input type="number" name="advancedpayment" class="form-control" id="advancedPayment" value="<?=$selectOrderDetailData['advancePayment'];?>" placeholder="Advance payment if any">
																																				</div>
																																	</div>
                                                                  <div class="form-group col-sm-3 col-xs-3">
																																		<label class="control-label mb-10" for="exampleInputpwd_1">Payment Mode</label>
																																		<div class="input-group">
																																			<div class="input-group-addon"><i class="icon-wallet"></i></div>
																																				<select name="paymentmode" class="form-control" id="exampleInputpwd_1">
                                                                          <option><?=$selectOrderDetailData['paymentMode'];?></option>
																																				<option value="NULL" disabled selected>SELECT PAYMENT METHOD</option>
																																				<option value="Cash">Cash</option>
																																				<option value="Paytm">Paytm</option>
                                                                        <option value="UPI">UPI</option>
                                                                        <option value="Online">Debit Card/Credit Card/Net Banking</option>
																																			</select>
																																			</div>
																																	</div>
                                                                  <div class="form-group col-sm-3 col-xs-3">
																																			<label class="control-label mb-10" for="exampleInputuname_1">Payment Due</label>
																																				<div class="input-group">
																																					<div class="input-group-addon"><i class="icon-wallet"></i></div>
																																					<input type="number" name="paymentDue" readonly class="form-control" id="paymentDue" value="<?=$selectOrderDetailData['paymentDue'];?>" placeholder="Due payment if any">
																																				</div>
																																	</div>
                                                                  <div class="form-group col-sm-3 col-xs-3">
																																			<label class="control-label mb-10" for="exampleInputuname_1">Transaction ID</label>
																																				<div class="input-group">
                                                                          <div class="input-group-addon"><i class="icon-wallet"></i></div>
                                                                              <input type="text" name="transID" class="form-control" id="exampleInputuname_1" value="<?=$selectOrderDetailData['transactionID'];?>" placeholder="#EXPMNT8547896" data-mask="#EXPMNT999999999">
																																				</div>
																																	</div>
                                                                  <div class="form-group col-sm-3 col-xs-3">
																																		<label class="control-label mb-10" for="exampleInputpwd_1">Garage</label>
																																		<div class="input-group">
																																			<div class="input-group-addon"><i class="icon-magnet"></i></div>
																																				<select name="garages" id="garages" class="form-control" id="exampleInputpwd_1">
                                                                          <option><?=$selectOrderDetailData['garages'];?></option>
																																				<option value="NULL">SELECT GARAGE</option>
																																				<option value="NULL"></option>
																																				<option value="NULL"></option>
                                                                        <option value="NULL"></option>
																																			</select>
																																			</div>
																																	</div>
                                                                  <div class="form-group col-sm-3 col-xs-3">
																																			<label class="control-label mb-10" for="exampleInputuname_1">Pickup / Drop-off Boy</label>
																																				<div class="input-group">
																																					<div class="input-group-addon"><i class="icon-user-follow"></i></div>
                                                                          <select name="deliveryboy" class="form-control" id="pickupboy">
                                                                            <option><?=$selectOrderDetailData['deliveryBoy'];?></option>
																																					<option value="NULL">SELECT PICKUP/DROP-OFF BOY</option>
																																					<option value=""></option>
																																					<option value=""></option>
                                                                          <option value=""></option>
																																				</select>
                                                                      </div>
																																	</div>
                                                            <div  class="col-xs-12">
                                                      <input type="hidden" name="orderId" value="<?=$selectOrderDetailData['orderID'];?>">
                                                    	<button type="submit" class="btn btn-success mr-10">Update
																											<!--<button type="reset" class="btn btn-danger ">Reset</button>-->
                                                    </div>
                                                      <?php
																                        }
																                    } else { //if didn't execute
																                        echo "Unable to process Please try again later";
																                    }
																                    ?>
                                                    </form>
																									</div>
																								</div>
																							</div>
																						</div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


															<!--/Row-->



				<!-- Footer -->
				<footer class="footer container-fluid pl-30 pr-30">
					<div class="row">
						<div class="col-sm-12">
							<p>2017 &copy; Exelinserv. Pampered by CoolHaxlabs</p>
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
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

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

    <!--Script for Payment Calculations.-->
    <script type="text/javascript">
        $(document).ready(function(){

            $('#totalPayment').on('keyup',function(){

                  $('#advancedPayment').val(0);

                    $('#advancedPayment').on('keyup',function(){

                        var totalPayment = $('#totalPayment').val();
                        var advancedPayment = $('#advancedPayment').val();
                        var amnt = totalPayment - advancedPayment;
                        // alert(amnt);
                        $('#paymentDue').val(amnt);

                  });

            });

        });
    </script>
	</body>
</html>
