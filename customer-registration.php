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

		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

		<!-- vector map CSS -->
		<link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>

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
								<li><a href="#"><span>Customer</span></a></li>
								<li class="active"><span>Registration</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->

						</div>
						<!-- /Title -->
								<!--Row-->
															<!--<div class="panel-wrapper collapse in">
																<div class="panel-body">-->
																	<div class="row">
																		<div class="col-md-12">
																			<div class="panel panel-default card-view">
																				<div class="panel-heading">
																					<div class="pull-left">
																						<h6 class="panel-title txt-dark">Customer Registration</h6><br/>
																						<h4 class="panel-title txt-dark"><font color="#A9A9A9">Customer Informations</font></h4>
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
																									<form method="POST" action="includes/customer-validate.php">
																										<div class="form-group col-sm-6 col-xs-6">
																											<label class="control-label mb-10" for="exampleInputuname_1">First Name</label>
																												<div class="input-group">
																													<div class="input-group-addon"><i class="icon-user"></i></div>
																													<input type="text" name="firstName" class="form-control" id="exampleInputuname_1" placeholder="Enter firstname">
																												</div>
																											</div>
																											<div class="form-group">
																												<label class="control-label mb-10" for="exampleInputuname_1">Last Name</label>
																													<div class="input-group">
																														<div class="input-group-addon"><i class="icon-user"></i></div>
																														<input type="text" name="lastName" class="form-control" id="exampleInputuname_1" placeholder="Enter lastname">
																													</div>
																												</div>
																											<div class="form-group col-sm-6 col-xs-6">
																												<label class="control-label mb-10" for="exampleInputEmail_1">Email address</label>
																												<div class="input-group">
																													<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
																													<input type="email" name="email" class="form-control" id="exampleInputEmail_1" placeholder="Enter email">
																												</div>
																											</div>
																											<div class="form-group">
																												<label class="control-label mb-10" for="exampleInputuname_1">Phone Number</label>
																													<div class="input-group">
																														<div class="input-group-addon"><i class="icon-phone"></i></div>
																														<input type="tel" name="phone" class="form-control" id="exampleInputuname_1" placeholder="Enter phone number" pattern="[7-9]{1}[0-9]{9}">
																													</div>
																												</div>
																											<!--<div class="form-group col-sm-6 col-xs-6">
																												<label class="control-label mb-10" for="exampleInputpwd_1">Password</label>
																												<div class="input-group">
																													<div class="input-group-addon"><i class="icon-lock"></i></div>
																													<input type="password" name="password" class="form-control" id="exampleInputpwd_1" placeholder="Enter password">
																												</div>
																											</div>-->

                                                      <div class="form-group col-sm-6 col-xs-6">
                                                        <label class="control-label mb-10 text-left">Gender</label>
                                                          <div class="radio radio-info">
                                  													<input type="radio" name="genderChoose" id="male" value="Male" checked>
                                  													<label for="radio2">
                                  														Male
                                  													</label>
                                                              &nbsp; &nbsp; &nbsp;
                                                            <input type="radio" name="genderChoose" id="female" value="Female">
                                                            <label for="radio1">
                                                              Female
                                                            </label>
                                                          </div>
                                                      </div>
																											<div class="row">
																												<div class="col-md-12">
																													<div class="panel panel-default card-view">
																														<div class="panel-heading">
																															<div class="pull-left">
                        																				<h4 class="panel-title txt-dark">Customer Communcation Address With All Details.</h4>
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
									  																												<label class="control-label mb-10" for="exampleInputuname_1">Country</label>
									  																													<div class="input-group">
									  																														<div class="input-group-addon"><i class="icon-layers "></i></div>
									                                                              <select name="country" id="countryChoice" class="form-control">
									                                                                <option value="NULL">SELECT COUNTRY</option>
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
									  																												<label class="control-label mb-10" for="exampleInputuname_1">City</label>
									  																													<div class="input-group">
									  																														<div class="input-group-addon"><i class="icon-direction"></i></div>
									                                                              <select name="city" id="cityChoice" class="form-control">
									                                                                <option value="NULL">SELECT CITY</option>
									                                                                </select>
									  																														</div>
									  																												</div>
							                                                    			<div class="form-group col-sm-3 col-xs-3">
																																						<label class="control-label mb-10" for="exampleInputuname_1">Pincode</label>
																																							<div class="input-group">
																																								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
																																								<input type="nuumber" name="pincode" class="form-control" required pattern="[0-9]{6}" id="pincode" placeholder="Enter your pin">
																																							</div>
																																						</div>
                                                                            <div class="form-group col-sm-3 col-xs-3">
  									  																												<label class="control-label mb-10" for="exampleInputuname_1">Booking For</label>
  									  																													<div class="input-group">
  									  																														<div class="input-group-addon"><i class="icon-home "></i></div>
  									                                                              <select name="addressType" id="addressType" class="form-control">
  									                                                                <option value="">ADDRESS TYPE</option>
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
																																									<input type="text" name="streetAddress" class="form-control" id="streetAddress" required placeholder="Enter streetaddress">
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
																																									<input type="tel" name="alternatePhoneNumber" class="form-control" id="area" placeholder="area" required>
																																								</div>
																																							</div> <br />
                                                                              <div class="form-group col-xs-12">
																																							<button type="submit" class="btn btn-success mr-10">Create Customer</button>
																											<button type="reset" class="btn btn-danger">Reset</button>
                                                    </div>
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
	</body>
</html>
