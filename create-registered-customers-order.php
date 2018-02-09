<?php
/*
     * Name : Dashboard
     * Author : Sikha Sikha
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

      <?php include "includes/right_sidebar.php";?>

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
								<li><a href="#"><span>Create</span></a></li>
								<li class="active"><span>Order</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->

					</div>
					<!-- /Title -->
											<!--Row-->
															<!--<div class="panel-wrapper collapse in">
																<div class="panel-body">-->
                                  <form name="ordercreation" method="POST" action="includes/create-contract.php">
																	<div class="row">
																		<div class="col-md-12">
																			<div class="panel panel-default card-view">
																				<div class="panel-heading">
																					<div class="pull-left">
																						<h6 class="panel-title txt-dark">Customer Informations</h6>
																					</div>
																					<div class="clearfix"></div>
																				</div>
																			<!--<div class="form-wrap">
																				<form>-->
																				<?php
																					if(isset($_GET['customerId']) && $_GET['customerId'] != "") {
																							$customerId = $_GET['customerId'];
																						 $selectCustomerDetails = "SELECT * FROM `customerdetails` WHERE `customerID` = '$customerId'";
																							$selectCustomerDetailResults = $conn -> query($selectCustomerDetails);
																							if($selectCustomerDetailResults) { // if Executed
																									$selectCustomerDetailData = $selectCustomerDetailResults -> fetch_assoc();

																					?>
                                          <div class="panel-wrapper collapse in">
																					<div class="panel-body">
																						<div class="row">
																							<div class="col-sm-12 col-xs-12">
																								<div class="form-wrap">

																										<div class="form-group col-sm-3 col-xs-3">
																											<label class="control-label mb-10" for="exampleInputuname_1">Name</label>
																												<div class="input-group">
																													<div class="input-group-addon"><i class="icon-user"></i></div>
																													<input type="text" name="firstname" class="form-control" value="<?=$selectCustomerDetailData['firstName'];?> <?=$selectCustomerDetailData['lastName'];?>" placeholder="Enter name" readonly>
																												</div>
																										</div>
                                                    <div class="form-group col-sm-3 col-xs-3">
                                                      <label class="control-label mb-10" for="exampleInputEmail_1">Email address</label>
                                                      <div class="input-group">
                                                        <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                        <input type="email" name="email" class="form-control" id="exampleInputEmail_1" placeholder="Enter email" value="<?=$selectCustomerDetailData['email'];?>">
                                                      </div>
                                                    </div>
                                                    <div class="form-group col-sm-3 col-xs-3">
                                                      <label class="control-label mb-10" for="exampleInputuname_1">Phone Number</label>
                                                        <div class="input-group">
                                                          <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                          <input type="tel" name="phone" class="form-control" id="exampleInputuname_1" value="<?=$selectCustomerDetailData['phoneNumber'];?>" placeholder="Enter phone number" readonly>
                                                        </div>
                                                      </div>
                                                    <div class="form-group col-sm-3 col-xs-3">
                                                      <label class="control-label mb-10" for="exampleInputuname_1">Country</label>
                                                        <div class="input-group">
                                                          <div class="input-group-addon"><i class="icon-layers "></i></div>
                                                          <select name="country" id="countryChoice" class="form-control">
                                                            <option value="NULL" selected disabled>SELECT COUNTRY</option>
                                                            <?php
                                                                  $electCountry = mysqli_query($conn,"SELECT * FROM `country`");
                                                                  while($electCountryData = mysqli_fetch_array($electCountry)){
                                                            ?>
                                                            <option value="<?php echo $electCountryData['countryID'];?>"><?php echo $electCountryData['countryName'];?></option>
                                                            <?php
                                                                    }
                                                            ?>
                                                          </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-3 col-xs-3">
                                                      <label class="control-label mb-10" for="exampleInputuname_1">State</label>
                                                        <div class="input-group">
                                                          <div class="input-group-addon"><i class="icon-directions"></i></div>
                                                          <select name="state" id="stateChoice" class="form-control">
                                                            <option value="NULL">SELECT STATE</option>
                                                            </select>
                                                          </div>
                                                      </div>
                                                    <div class="form-group col-sm-3 col-xs-3">
																												<label class="control-label mb-10" for="exampleInputEmail_1">City</label>
																												<div class="input-group">
																													<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                          <select name="city" id="cityChoice" class="form-control">
                                                            <option value="<?=$selectOrdersData['city'];?>">Selected by customer : <?=$selectOrdersData['city'];?></option>
                                                            <option value="NULL" selected disabled>SELECT CITY</option>
                                                          </select>
                                                        <!--  <input type="text" name="location" id="cityChoice" class="form-control" value="<?=$selectCustomerData['city'];?>" placeholder="Enter location" readonly>
																												--></div>
																										</div>
                                                    <div class="form-group col-sm-3 col-xs-3">
                                                        <label class="control-label mb-10" for="exampleInputuname_1">Pincode</label>
                                                          <div class="input-group">
                                                            <div class="input-group-addon"><i class="icon-location-pin"></i></div>
                                                            <input type="nuumber" name="pincode" class="form-control" required pattern="[0-9]{6}" id="pincode" value="<?=$selectOrdersData['pinCode'];?>" placeholder="Enter your pin">
                                                          </div>
                                                        </div>
                                                        <div class="form-group col-sm-3 col-xs-3">
                                                          <label class="control-label mb-10" for="exampleInputuname_1">Booking For</label>
                                                            <div class="input-group">
                                                              <div class="input-group-addon"><i class="icon-home "></i></div>
                                                              <select name="addressType" id="addressType" class="form-control">
                                                                <option value="" selected disabled>ADDRESS TYPE</option>
                                                                <option Value="SELF"> MY HOME</option>
                                                                <option value="REFERENCE">FRIEND'S HOME</option>
                                                                <option value="OFFICE">MY OFFICE</option>
                                                                </select>
                                                              </div>
                                                      </div>
                                                    <div class="form-group col-sm-3 col-xs-3">
                                                      <label class="control-label mb-10" for="exampleInputEmail_1">Address</label>
                                                      <div class="input-group">
                                                        <div class="input-group-addon"><i class="icon-home"></i></div>
                                                        <input type="text" name="streetAddress" class="form-control" value="<?=$selectOrdersData['']?>" id="streetAddress" required placeholder="Enter streetaddress">
                                                      </div>
                                                    </div>
                                                    <div class="form-group col-sm-3 col-xs-3">
                                                      <label class="control-label mb-10" for="exampleInputEmail_1">Area</label>
                                                      <div class="input-group">
                                                        <div class="input-group-addon"><i class="icon-paper-plane"></i></div>
                                                        <input type="text" name="area" class="form-control" id="area" placeholder="area" required>
                                                      </div>
                                                    </div>
                                                    <div class="form-group col-sm-3 col-xs-3">
                                                      <label class="control-label mb-10" for="exampleInputEmail_1">Alternate Phone Number</label>
                                                      <div class="input-group">
                                                        <div class="input-group-addon"><i class="icon-call-end"></i></div>
                                                        <input type="tel" name="alternatePhoneNumber" class="form-control" id="area" placeholder="optional" >
                                                      </div>
                                                    </div> <br />
                                                    <div class="form-group col-sm-3 col-xs-3">
  																										<label class="control-label mb-10" for="exampleInputuname_1">Created On</label>
  																											<div class="input-group">
  																												<div class="input-group-addon"><i class="icon-calender"></i></div>
  																												<input type="datetime" name="createdon" class="form-control" id="" value="<?=$selectOrdersData['createdOn'];?>" placeholder="Enter phone number" readonly>
  																											</div>
  																									</div>
                                                    <div class="form-group col-sm-3 col-xs-3">
                                                      <label class="control-label mb-10" for="exampleInputpwd_1">Order Status</label>
                                                        <div class="input-group">
                                                          <div class="input-group-addon"><i class="icon-check"></i></div>
                                                          <select name="oderstatus" class="form-control" id="exampleInputpwd_1">
                                                            <option value="<?=$selectOrdersData['status'];?>">Order Status : <?=$selectOrdersData['status'];?></option>
                                                            <option value="NULL" selected disabled>SELECT ORDER STATUS</option>
                                                            <option value="Placed">Placed</option>
                                                            <option value="Unconfirmed">Unconfirmed</option>
                                                            <option value="Confirmed">Confirmed</option>
                                                            <option value="Picked-up/Walk-in">Picked-up/Walk-in</option>
                                                            <option value="Inprogress">Inprogress</option>
                                                            <option value="Delivered">Delivered</option>
                                                          </select>
                                                        </div>
                                                    </div>
																										<div class="row">
																											<div class="col-md-12">
																												<div class="panel panel-default card-view">
																													<div class="panel-heading">
																														<div class="pull-left">
																															<h4 class="panel-title txt-dark">Order Information</h4>
																															</div>
																														<div class="clearfix"></div>
																													</div>
																													<!--<div class="form-wrap">
																														<form>-->
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
                                                                            <option value="NULL">SELECT VEHICLE TYPE</option>
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
                                                                          <input type="text" class="form-control" id="vehicleName" name="vehicleName" placeholder="Hero" required="required" list="carList">
																																					</div>
																																			</div>
                                                                      <div class="form-group col-sm-3 col-xs-3">
                                                                          <label class="control-label mb-10" for="exampleInputuname_1">VehicLe Color</label>
                                                                            <div class="input-group">
                                                                              <div class="input-group-addon"><i class="icon-list"></i></div>
                                                                              <select name="vehiclecolor" class="form-control" id="exampleInputpwd_1">
                                                                              <option value="NULL">SELECT VEHICLE COLOR</option>
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
                                                                            <option value="NULL">SELECT FUEL VARIANT</option>
                                                                            <option value="Petrol">Petrol</option>
                                                                            <option value="Diesel">Diesel</option>
                                                                          </select>
                                                                          </div>
                                                                        </div>
                                                                        <div class="form-group col-sm-3 col-xs-3">
                                                                          <label class="control-label mb-10" for="exampleInputpwd_1">Kilometer Reading</label>
                                                                          <div class="input-group">
                                                                            <div class="input-group-addon"><i class="icon-clock"></i></div>
                                                                            <input type="number" class="form-control" name="meterReading" placeholder="">
                                                                            </div>
                                                                          </div>
                                                                          <div class="form-group col-sm-3 col-xs-3">
                                                                            <label class="control-label mb-10" for="servicetype">Service Type</label>
                                                                            <div class="input-group">
                                                                              <div class="input-group-addon"><i class="icon-wrench"></i></div>
                                                                                <select name="servicetype" id="servicetype" class="form-control">

                                                                                <option value="NULL" selected disabled>SELECT SERVICE TYPE</option>
                                                                                <option value="<?=$selectOrdersData['serviceType'];?>">User choice : <?=$selectOrdersData['serviceType'];?></option>
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
                                                                              <option value="NULL" selected disabled>SELECT SERVICE PREFERENCE</option>
                                                                              <option value="Pickup">Pickup</option>
                                                                              <option value="Walk-in">Walk-in</option>
                                                                            </select>
                                                                          </div>
                                                                      </div>
                                                                          <div class="form-group col-sm-3 col-xs-3">
																																						<label class="control-label mb-10" for="exampleInputuname_1">Pick-up Date</label>
																																							<div class="input-group">
																																								<div class="input-group-addon"><i class="icon-calender"></i></div>
																																								<input type="datetime-local" name="pickUpDate" class="form-control" id="pickupdate" value="" placeholder="">
                                                                              </div>
																																						</div>
																																					<div class="form-group col-sm-3 col-xs-3">
																																						<label class="control-label mb-10 text-left">Drop-off Date</label>
																																						<div class="input-group date' id='datetimepicker1'">
																																							<div class="input-group-addon"><i class="icon-calender"></i></div>
                                                                              <input type="datetime-local" name="dropDate" class="form-control" id="dropdate" value="" placeholder="">  </div>
																																					</div>
                                                                          <div class="form-group col-sm-3 col-xs-3">
																																						<label class="control-label mb-10" for="issue">Issue</label>
																																							<div class="input-group">
																																								<div class="input-group-addon"><i class="icon-note"></i></div>
																																								<input type="text" name="issue" class="form-control" id="issue" value="<?=$selectOrdersData['issue'];?>" placeholder="Enter an issue">
																																							</div>
																																						</div>
                                                                            <div class="form-group col-sm-3 col-xs-3">
  																																						<label class="control-label mb-10" for="exampleInputpwd_1">Garage</label>
  																																						<div class="input-group">
  																																							<div class="input-group-addon"><i class="icon-magnet"></i></div>
  																																								<select name="garages" id="garages" class="form-control" id="exampleInputpwd_1">
  																																								<option value="NULL" selected disabled>SELECT GARAGE</option>
  																																								<option value=""></option>
  																																								<option value=""></option>
                                                                                  <option value=""></option>
  																																							</select>
  																																							</div>
  																																					</div>
                                                                            <div class="form-group col-sm-3 col-xs-3">
    																																						<label class="control-label mb-10" for="exampleInputuname_1">Pickup / Drop-off Boy</label>
    																																							<div class="input-group">
    																																								<div class="input-group-addon"><i class="icon-user-follow"></i></div>
                                                                                    <select name="deliveryboy" class="form-control" id="pickupboy">
    																																								<option value="NULL">SELECT PICKUP/DROP-OFF BOY</option>
    																																								<option value=""></option>
    																																								<option value=""></option>
                                                                                    <option value=""></option>
    																																							</select>
                                                                                </div>
    																																				</div>
                                                                            <div class="row">
                                          																		<div class="col-md-12">
                                          																			<div class="panel panel-default card-view">
                                          																				<div class="panel-heading">
                                          																					<div class="pull-left">
                                          																						<h6 class="panel-title txt-dark">Vehicle Informations</h6>
                                          																					</div>
                                          																					<div class="clearfix"></div>
                                          																				</div>
                                                                                    <div class="panel-wrapper collapse in">
                                          																					<div class="panel-body">
                                          																						<div class="row">
                                          																							<div class="col-sm-12 col-xs-12">
                                          																								<div class="form-wrap">
                                          																										<div class="form-group col-sm-4 col-xs-4">
                                          																											<label class="control-label mb-10" for="exampleInputuname_1">Chasis Number</label>
                                          																												<div class="input-group">
                                          																													<div class="input-group-addon"><i class="icon-reload"></i></div>
                                          																													<input type="number" name="chasisNumber" id="chasisNumber" class="form-control" value="" placeholder="Enter chasis number" />
                                          																												</div>
                                          																											</div>
                                          																											<div class="form-group col-sm-4 col-xs-4">
                                          																												<label class="control-label mb-10" for="exampleInputuname_1">Engine Number</label>
                                          																													<div class="input-group">
                                          																														<div class="input-group-addon"><i class="icon-settings"></i></div>
                                          																														<input type="text" name="engineNumber" id="engineNumber"class="form-control" value="" placeholder="Enter engine number" />
                                          																													</div>
                                          																												</div>
                                          																											<div class="form-group col-sm-4 col-xs-4">
                                          																												<label class="control-label mb-10" for="exampleInputEmail_1">Do you have an Insurance?</label>
                                          																												<div class="input-group">
                                          																													<div class="input-group-addon"><i class="icon-plus"></i></div>
                                                                                                  <select name="insurance" id="insurance" class="form-control">
                                                                                                    <option value="NULL" selected disabled>CHOOSE INSURANCE STATUS</option>
                                                                                                    <option value="INSURANCE">INSURANCE</option>
                                                                                                    <option value="EXPIRED">EXPIRED</option>
                                                                                                  </select></div>
                                          																											</div>
                                                                                                <div id="insuranceProvider" class="form-group col-sm-3 col-xs-3">
                                          																												<label class="control-label mb-10" for="exampleInputEmail_1">INSURANCE PROVIDER</label>
                                          																											<div class="input-group">
                                          																												<div class="input-group-addon"><i class="icon-plus"></i></div>
                                                                                                  <select name="insuranceProvider" id="insuranceProvider1" class="form-control">
                                                                                                    <option value="NULL" selected disabled>CHOOSE PROVIDER</option>
                                                                                                    <option value="HDFC ERGO">HDFC ERGO</option>
                                                                                                    <option value="BAJAJ Allianz">BAJAJ Allianz</option>
                                                                                                    <option value="bharati AXA">bharati AXA</option>
                                                                                                    <option value="Chola MS">Chola MS</option>
                                                                                                    <option value="FUTURE GENERALI">FUTURE GENERALI</option>
                                                                                                    <option value="icicilombard">icicilombard</option>
                                                                                                    <option value="IFFCO-TOKIO">IFFCO-TOKIO</option>
                                                                                                    <option value="Liberty Videocon">Liberty Videocon</option>
                                                                                                    <option value="L&T Insurance">L&T Insurance</option>
                                                                                                    <option value="National Insurance">National Insurance</option>
                                                                                                    <option value="Oriental insurance">Oriental insurance</option>
                                                                                                    <option value="Reliance General">Reliance General</option>
                                                                                                    <option value="Royal Sundaram">Royal Sundaram</option>
                                                                                                    <option value="SBIGeneral">SBIGeneral</option>
                                                                                                    <option value="SHRIRAM">SHRIRAM</option>
                                                                                                    <option value="TATA AIG">TATA AIG</option>
                                                                                                    <option value="New India Insurance">New India Insurance</option>
                                                                                                    <option value="UNITED INDIA INSURANCE">UNITED INDIA INSURANCE</option>
                                                                                                    <option value="Universal Sompo">Universal Sompo</option>
                                                                                                    <option value="Kotak">Kotak</option>
                                                                                                    <option value="MAGMA HDI">MAGMA HDI</option>
                                                                                                  </select>
                                                                                                  </div>
                                          																											</div>
                                                                                                <div id="contractNumber" class="form-group col-sm-3 col-xs-3">
                                                                                                  <label class="control-label mb-10" for="exampleInputEmail_1">Policy Number</label>
                                                                                                  <div class="input-group">
                                                                                                    <div class="input-group-addon"><i class="icon-plus"></i></div>
                                                                                                    <input type="text" name="contractNumber" id="contractNumber1"class="form-control" value="" placeholder="CONTRACT NUMBER" />
                                                                                                  </div>
                                                                                                </div>

                                                                                              <div id="purchaseDate" class="form-group col-sm-3 col-xs-3">
                                                                                                <label class="control-label mb-10" for="exampleInputEmail_1">Purchase Date</label>
                                                                                                <div class="input-group">
                                                                                                  <div class="input-group-addon"><i class="icon-plus"></i></div>
                                                                                                  <input type="date" name="purchaseDate" class="form-control" value="" placeholder="Purchase date" />
                                                                                                </div>
                                                                                              </div>
                                                                                              <div id="expiryDate" class="form-group col-sm-3 col-xs-3">
                                                                                                <label class="control-label mb-10" for="exampleInputEmail_1">Expiry Date</label>
                                                                                                <div class="input-group">
                                                                                                  <div class="input-group-addon"><i class="icon-plus"></i></div>
                                                                                                  <input type="date" name="expiryDate" class="form-control" value="" placeholder="Expiry date" />
                                                                                                </div>
                                                                                              </div>
                                                                                              <div id="ldvIdv" class="form-group col-sm-3 col-xs-3">
                                                                                                <label class="control-label mb-10" for="exampleInputEmail_1">LDV / IDV</label>
                                                                                                <div class="input-group">
                                                                                                  <div class="input-group-addon"><i class="icon-plus"></i></div>
                                                                                                  <input type="text" name="ldvIdv" class="form-control" value="" placeholder="Enter LDV / IDV" />
                                                                                                </div>
                                                                                              </div>
                                                                                              <div class="row">
                                                            																		<div class="col-md-12">
                                                            																			<div class="panel panel-default card-view">
                                                            																				<div class="panel-heading">
                                                            																					<div class="pull-left">
                                                            																						<h6 class="panel-title txt-dark">Payment Informations</h6>
                                                            																					</div>
                                                            																					<div class="clearfix"></div>
                                                            																				</div>
                                                                                                      <div class="panel-wrapper collapse in">
                                                            																					<div class="panel-body">
                                                            																						<div class="row">
                                                            																							<div class="col-sm-12 col-xs-12">
                                                            																								<div class="form-wrap">

                                                                            <div class="form-group col-sm-3 col-xs-3">
  																																						<label class="control-label mb-10" for="exampleInputuname_1">Total Payment</label>
  																																							<div class="input-group">
  																																								<div class="input-group-addon"><i class="icon-wallet"></i></div>
  																																								<input type="number" name="totalpayment" class="form-control" id="totalPayment" value="" placeholder="Total Estimated amount">
  																																							</div>
  																																					</div>
                                                                            <div class="form-group col-sm-3 col-xs-3">
    																																						<label class="control-label mb-10" for="exampleInputuname_1">Advance Payment</label>
    																																							<div class="input-group">
    																																								<div class="input-group-addon"><i class="icon-wallet"></i></div>
    																																								<input type="number" name="advancedpayment" class="form-control" id="advancedPayment" value="" placeholder="Advance payment if any">
    																																							</div>
    																																				</div>
                                                                            <div class="form-group col-sm-3 col-xs-3">
  																																						<label class="control-label mb-10" for="exampleInputpwd_1">Payment Mode</label>
  																																						<div class="input-group">
  																																							<div class="input-group-addon"><i class="icon-wallet"></i></div>
  																																								<select name="paymentmode" class="form-control" id="exampleInputpwd_1">
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
    																																								<input type="number" name="paymentDue" readonly class="form-control" id="paymentDue" value="" placeholder="Due payment if any">
    																																							</div>
    																																				</div>
                                                                            <div class="form-group col-sm-3 col-xs-3">
    																																						<label class="control-label mb-10" for="exampleInputuname_1">Transaction ID</label>
    																																							<div class="input-group">
                                                                                    <div class="input-group-addon"><i class="icon-wallet"></i></div>
                                                                                        <input type="text" name="transID" class="form-control" id="exampleInputuname_1" value="" placeholder="#EXPMNT8547896">
      																																						</div>
    																																				</div>
                                                            <div  class="col-xs-12">
                                                      <input type="hidden" name="quikOrderID" value="<?=$selectCustomerData['quikOrderID'];?>">
                                                    	<button type="submit" name="submit" class="btn btn-success mr-10">Confirm
																											<button type="reset" class="btn btn-danger ">Cancel</button>
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
    <!-- Select address script-->
    <script>
      $(document).ready(function(){

          $('#countryChoice').on('change',function(){

            $('#stateChoice').html('<option>Please choose State</option>');
            $('#cityChoice').html('<option>Please choose State First</option>');
            var country = $(this).val();

              if(country){

                //Running the AJAX Call for data retrival
                $.ajax({

                      type: 'post',
                      url: 'includes/fetchLocations.php?country='+country,
                      cache: false,
                      dataType: 'json',
                      data:{country:country},
                      success: function(stateInfo){

                          var len = stateInfo.length;
                          $('#stateChoice').html('<option value="NULL">Please choose State</option>');


                            if(stateInfo){

                              for (var i = 0; i<len; i++){

                                    var stateID = stateInfo[i]['stateID'];
                                    var stateName = stateInfo[i]['stateName'];
                                      $('#stateChoice').append("<option value = '"+stateID+"'>"+stateName+"</option>");

                              }



                            }else{

                              $('#stateChoice').html('<option value="NULL">Please choose Country first</option>');

                            }
                      }
                });

              }else{

                $('#stateChoice').append('<option value="NULL">Please choose Country first</option>');

              }

          });

        $('#stateChoice').on('change', function(){

          var state = $(this).val();

            if(state){

            //Running the AJAX Call for data retrival
            $.ajax({

                  type: 'post',
                  url: 'includes/fetchLocations.php?state='+state,
                  cache: false,
                  dataType: 'json',
                  data:{state:state},
                  success: function(cityInfo){

                      $('#cityChoice').html('<option value="NULL">Please choose City</option>');

                        if(cityInfo){

                            var len = cityInfo.length;

                            for (var i = 0; i<len; i++){

                              var cityID = cityInfo[i]['cityID'];
                              var cityName = cityInfo[i]['cityName'];
                              $('#cityChoice').append("<option value = '"+cityID+"'>"+cityName+"</option>");

                            }


                        } else{

                          $('#cityChoice').html('<option value="NULL">No City in list</option>');

                        }
                  }
            });

          }else{

                $('#cityChoice').html('<option value="NULL">Please choose State First</option>');

          }


          });

      });

    </script>

		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>

    <!--Script for Payment Calculations.-->
    <script type="text/javascript">
        $(document).ready(function(){
          $('#insuranceProvider').hide();
          $('#purchaseDate').hide();
          $('#expiryDate').hide();
          $('#ldvIdv').hide();
          $('#contractNumber').hide();

            $('#insurance').on('change',function(){

              var insurance = $('#insurance').val();
              if ( insurance == 'INSURANCE' || insurance == ''){

                $('#insuranceProvider').show();
                $('#insuranceProvider1').on('change',function(){
                  $('#contractNumber').show();
                  $('#purchaseDate').show();
                  $('#expiryDate').show();
                  $('#ldvIdv').show();

                });


              } else {
                $('#insuranceProvider').hide();
                $('#purchaseDate').hide();
                $('#expiryDate').hide();
                $('#ldvIdv').hide();
              }
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


        });
    </script>

</body>
</html>
