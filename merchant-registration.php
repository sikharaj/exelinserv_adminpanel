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

    <!-- Bootstrap Datetimepicker CSS -->
		<link href="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>

    <!-- select2 CSS -->
		<link href="vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>

    <!-- multi-select CSS -->
		<link href="vendors/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css"/>

    <!-- bootstrap-select CSS -->
		<link href="vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>

		<!-- Custom CSS -->
		<link href="dist/css/style.css" rel="stylesheet" type="text/css">

    <link href="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

    <!--SWEET alert CSS -->
		<link href="vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

    <style>
    .AJAXpreloader {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      /* background-color: #fff; */
      background-image: url(https://cdn.dribbble.com/users/918574/screenshots/3432957/preloader_01_blue.gif);
      /* path to your loading animation */
      background-repeat: no-repeat;
      background-position: center;
      margin: -100px 0 0 -100px;
      /* change if the mask should have another color then white */
      z-index: 99;
      /* makes sure it stays on top */
      display: none;
      }
      </style>

	</head>

	<body>

    <!-- AJAX Preloader -->
    <div id="preloader" class="AJAXpreloader">
    </div>

		<!--Preloader-->
		<div class="preloader-it" id="preloader">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->

		<div class="wrapper theme-1-active pimary-color-green">
			<?php include "includes/header.php";?>

 		<?php include "includes/nav.php";?>
<!-- Right Sidebar Menu -->
			<div class="fixed-sidebar-right">
				<ul class="right-sidebar">
					<li>
						<div  class="tab-struct custom-tab-1">
							<ul role="tablist" class="nav nav-tabs" id="right_sidebar_tab">
								<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="chat_tab_btn" href="#chat_tab">chat</a></li>
								<li role="presentation" class=""><a  data-toggle="tab" id="messages_tab_btn" role="tab" href="#messages_tab" aria-expanded="false">messages</a></li>
								<li role="presentation" class=""><a  data-toggle="tab" id="todo_tab_btn" role="tab" href="#todo_tab" aria-expanded="false">todo</a></li>
							</ul>
							<div class="tab-content" id="right_sidebar_content">
								<div  id="chat_tab" class="tab-pane fade active in" role="tabpanel">
									<div class="chat-cmplt-wrap">
										<div class="chat-box-wrap">
											<div class="add-friend">
												<a href="javascript:void(0)" class="inline-block txt-grey">
													<i class="zmdi zmdi-more"></i>
												</a>
												<span class="inline-block txt-dark">users</span>
												<a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-plus"></i></a>
												<div class="clearfix"></div>
											</div>
											<form role="search" class="chat-search pl-15 pr-15 pb-15">
												<div class="input-group">
													<input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
													<span class="input-group-btn">
													<button type="button" class="btn  btn-default"><i class="zmdi zmdi-search"></i></button>
													</span>
												</div>
											</form>
											<div id="chat_list_scroll">
												<div class="nicescroll-bar">
													<ul class="chat-list-wrap">
														<li class="chat-list">
															<div class="chat-body">
																<a href="javascript:void(0)">
																	<div class="chat-data">
																		<img class="user-img img-circle"  src="dist/img/user.png" alt="user"/>
																		<div class="user-data">
																			<span class="name block capitalize-font">Clay Masse</span>
																			<span class="time block truncate txt-grey">No one saves us but ourselves.</span>
																		</div>
																		<div class="status away"></div>
																		<div class="clearfix"></div>
																	</div>
																</a>
																<a href="javascript:void(0)">
																	<div class="chat-data">
																		<img class="user-img img-circle"  src="dist/img/user1.png" alt="user"/>
																		<div class="user-data">
																			<span class="name block capitalize-font">Evie Ono</span>
																			<span class="time block truncate txt-grey">Unity is strength</span>
																		</div>
																		<div class="status offline"></div>
																		<div class="clearfix"></div>
																	</div>
																</a>
																<a href="javascript:void(0)">
																	<div class="chat-data">
																		<img class="user-img img-circle"  src="dist/img/user2.png" alt="user"/>
																		<div class="user-data">
																			<span class="name block capitalize-font">Madalyn Rascon</span>
																			<span class="time block truncate txt-grey">Respect yourself if you would have others respect you.</span>
																		</div>
																		<div class="status online"></div>
																		<div class="clearfix"></div>
																	</div>
																</a>
																<a href="javascript:void(0)">
																	<div class="chat-data">
																		<img class="user-img img-circle"  src="dist/img/user3.png" alt="user"/>
																		<div class="user-data">
																			<span class="name block capitalize-font">Mitsuko Heid</span>
																			<span class="time block truncate txt-grey">I’m thankful.</span>
																		</div>
																		<div class="status online"></div>
																		<div class="clearfix"></div>
																	</div>
																</a>
																<a href="javascript:void(0)">
																	<div class="chat-data">
																		<img class="user-img img-circle"  src="dist/img/user.png" alt="user"/>
																		<div class="user-data">
																			<span class="name block capitalize-font">Ezequiel Merideth</span>
																			<span class="time block truncate txt-grey">Patience is bitter.</span>
																		</div>
																		<div class="status offline"></div>
																		<div class="clearfix"></div>
																	</div>
																</a>
																<a href="javascript:void(0)">
																	<div class="chat-data">
																		<img class="user-img img-circle"  src="dist/img/user1.png" alt="user"/>
																		<div class="user-data">
																			<span class="name block capitalize-font">Jonnie Metoyer</span>
																			<span class="time block truncate txt-grey">Genius is eternal patience.</span>
																		</div>
																		<div class="status online"></div>
																		<div class="clearfix"></div>
																	</div>
																</a>
																<a href="javascript:void(0)">
																	<div class="chat-data">
																		<img class="user-img img-circle"  src="dist/img/user2.png" alt="user"/>
																		<div class="user-data">
																			<span class="name block capitalize-font">Angelic Lauver</span>
																			<span class="time block truncate txt-grey">Every burden is a blessing.</span>
																		</div>
																		<div class="status away"></div>
																		<div class="clearfix"></div>
																	</div>
																</a>
																<a href="javascript:void(0)">
																	<div class="chat-data">
																		<img class="user-img img-circle"  src="dist/img/user3.png" alt="user"/>
																		<div class="user-data">
																			<span class="name block capitalize-font">Priscila Shy</span>
																			<span class="time block truncate txt-grey">Wise to resolve, and patient to perform.</span>
																		</div>
																		<div class="status online"></div>
																		<div class="clearfix"></div>
																	</div>
																</a>
																<a href="javascript:void(0)">
																	<div class="chat-data">
																		<img class="user-img img-circle"  src="dist/img/user4.png" alt="user"/>
																		<div class="user-data">
																			<span class="name block capitalize-font">Linda Stack</span>
																			<span class="time block truncate txt-grey">Our patience will achieve more than our force.</span>
																		</div>
																		<div class="status away"></div>
																		<div class="clearfix"></div>
																	</div>
																</a>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="recent-chat-box-wrap">
											<div class="recent-chat-wrap">
												<div class="panel-heading ma-0">
													<div class="goto-back">
														<a  id="goto_back" href="javascript:void(0)" class="inline-block txt-grey">
															<i class="zmdi zmdi-chevron-left"></i>
														</a>
														<span class="inline-block txt-dark">ryan</span>
														<a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-more"></i></a>
														<div class="clearfix"></div>
													</div>
												</div>
												<div class="panel-wrapper collapse in">
													<div class="panel-body pa-0">
														<div class="chat-content">
															<ul class="nicescroll-bar pt-20">
																<li class="friend">
																	<div class="friend-msg-wrap">
																		<img class="user-img img-circle block pull-left"  src="dist/img/user.png" alt="user"/>
																		<div class="msg pull-left">
																			<p>Hello Jason, how are you, it's been a long time since we last met?</p>
																			<div class="msg-per-detail text-right">
																				<span class="msg-time txt-grey">2:30 PM</span>
																			</div>
																		</div>
																		<div class="clearfix"></div>
																	</div>
																</li>
																<li class="self mb-10">
																	<div class="self-msg-wrap">
																		<div class="msg block pull-right"> Oh, hi Sarah I'm have got a new job now and is going great.
																			<div class="msg-per-detail text-right">
																				<span class="msg-time txt-grey">2:31 pm</span>
																			</div>
																		</div>
																		<div class="clearfix"></div>
																	</div>
																</li>
																<li class="self">
																	<div class="self-msg-wrap">
																		<div class="msg block pull-right">  How about you?
																			<div class="msg-per-detail text-right">
																				<span class="msg-time txt-grey">2:31 pm</span>
																			</div>
																		</div>
																		<div class="clearfix"></div>
																	</div>
																</li>
																<li class="friend">
																	<div class="friend-msg-wrap">
																		<img class="user-img img-circle block pull-left"  src="dist/img/user.png" alt="user"/>
																		<div class="msg pull-left">
																			<p>Not too bad.</p>
																			<div class="msg-per-detail  text-right">
																				<span class="msg-time txt-grey">2:35 pm</span>
																			</div>
																		</div>
																		<div class="clearfix"></div>
																	</div>
																</li>
															</ul>
														</div>
														<div class="input-group">
															<input type="text" id="input_msg_send" name="send-msg" class="input-msg-send form-control" placeholder="Type something">
															<div class="input-group-btn emojis">
																<div class="dropup">
																	<button type="button" class="btn  btn-default  dropdown-toggle" data-toggle="dropdown" ><i class="zmdi zmdi-mood"></i></button>
																	<ul class="dropdown-menu dropdown-menu-right">
																		<li><a href="javascript:void(0)">Action</a></li>
																		<li><a href="javascript:void(0)">Another action</a></li>
																		<li class="divider"></li>
																		<li><a href="javascript:void(0)">Separated link</a></li>
																	</ul>
																</div>
															</div>
															<div class="input-group-btn attachment">
																<div class="fileupload btn  btn-default"><i class="zmdi zmdi-attachment-alt"></i>
																	<input type="file" class="upload">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div id="messages_tab" class="tab-pane fade" role="tabpanel">
									<div class="message-box-wrap">
										<div class="msg-search">
											<a href="javascript:void(0)" class="inline-block txt-grey">
												<i class="zmdi zmdi-more"></i>
											</a>
											<span class="inline-block txt-dark">messages</span>
											<a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-search"></i></a>
											<div class="clearfix"></div>
										</div>
										<div class="set-height-wrap">
											<div class="streamline message-box nicescroll-bar">
												<a href="javascript:void(0)">
													<div class="sl-item unread-message">
														<div class="sl-avatar avatar avatar-sm avatar-circle">
															<img class="img-responsive img-circle" src="dist/img/user.png" alt="avatar"/>
														</div>
														<div class="sl-content">
															<span class="inline-block capitalize-font   pull-left message-per">Clay Masse</span>
															<span class="inline-block font-11  pull-right message-time">12:28 AM</span>
															<div class="clearfix"></div>
															<span class=" truncate message-subject">Themeforest message sent via your envato market profile</span>
															<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsu messm quia dolor sit amet, consectetur, adipisci velit</p>
														</div>
													</div>
												</a>
												<a href="javascript:void(0)">
													<div class="sl-item">
														<div class="sl-avatar avatar avatar-sm avatar-circle">
															<img class="img-responsive img-circle" src="dist/img/user1.png" alt="avatar"/>
														</div>
														<div class="sl-content">
															<span class="inline-block capitalize-font   pull-left message-per">Evie Ono</span>
															<span class="inline-block font-11  pull-right message-time">1 Feb</span>
															<div class="clearfix"></div>
															<span class=" truncate message-subject">Pogody theme support</span>
															<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
														</div>
													</div>
												</a>
												<a href="javascript:void(0)">
													<div class="sl-item">
														<div class="sl-avatar avatar avatar-sm avatar-circle">
															<img class="img-responsive img-circle" src="dist/img/user2.png" alt="avatar"/>
														</div>
														<div class="sl-content">
															<span class="inline-block capitalize-font   pull-left message-per">Madalyn Rascon</span>
															<span class="inline-block font-11  pull-right message-time">31 Jan</span>
															<div class="clearfix"></div>
															<span class=" truncate message-subject">Congratulations from design nominees</span>
															<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
														</div>
													</div>
												</a>
												<a href="javascript:void(0)">
													<div class="sl-item unread-message">
														<div class="sl-avatar avatar avatar-sm avatar-circle">
															<img class="img-responsive img-circle" src="dist/img/user3.png" alt="avatar"/>
														</div>
														<div class="sl-content">
															<span class="inline-block capitalize-font   pull-left message-per">Ezequiel Merideth</span>
															<span class="inline-block font-11  pull-right message-time">29 Jan</span>
															<div class="clearfix"></div>
															<span class=" truncate message-subject">Themeforest item support message</span>
															<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
														</div>
													</div>
												</a>
												<a href="javascript:void(0)">
													<div class="sl-item unread-message">
														<div class="sl-avatar avatar avatar-sm avatar-circle">
															<img class="img-responsive img-circle" src="dist/img/user4.png" alt="avatar"/>
														</div>
														<div class="sl-content">
															<span class="inline-block capitalize-font   pull-left message-per">Jonnie Metoyer</span>
															<span class="inline-block font-11  pull-right message-time">27 Jan</span>
															<div class="clearfix"></div>
															<span class=" truncate message-subject">Help with beavis contact form</span>
															<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
														</div>
													</div>
												</a>
												<a href="javascript:void(0)">
													<div class="sl-item">
														<div class="sl-avatar avatar avatar-sm avatar-circle">
															<img class="img-responsive img-circle" src="dist/img/user.png" alt="avatar"/>
														</div>
														<div class="sl-content">
															<span class="inline-block capitalize-font   pull-left message-per">Priscila Shy</span>
															<span class="inline-block font-11  pull-right message-time">19 Jan</span>
															<div class="clearfix"></div>
															<span class=" truncate message-subject">Your uploaded theme is been selected</span>
															<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
														</div>
													</div>
												</a>
												<a href="javascript:void(0)">
													<div class="sl-item">
														<div class="sl-avatar avatar avatar-sm avatar-circle">
															<img class="img-responsive img-circle" src="dist/img/user1.png" alt="avatar"/>
														</div>
														<div class="sl-content">
															<span class="inline-block capitalize-font   pull-left message-per">Linda Stack</span>
															<span class="inline-block font-11  pull-right message-time">13 Jan</span>
															<div class="clearfix"></div>
															<span class=" truncate message-subject"> A new rating has been received</span>
															<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
														</div>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div  id="todo_tab" class="tab-pane fade" role="tabpanel">
									<div class="todo-box-wrap">
										<div class="add-todo">
											<a href="javascript:void(0)" class="inline-block txt-grey">
												<i class="zmdi zmdi-more"></i>
											</a>
											<span class="inline-block txt-dark">todo list</span>
											<a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-plus"></i></a>
											<div class="clearfix"></div>
										</div>
										<div class="set-height-wrap">
											<!-- Todo-List -->
											<ul class="todo-list nicescroll-bar">
												<li class="todo-item">
													<div class="checkbox checkbox-default">
														<input type="checkbox" id="checkbox01"/>
														<label for="checkbox01">Record The First Episode</label>
													</div>
												</li>
												<li>
													<hr class="light-grey-hr"/>
												</li>
												<li class="todo-item">
													<div class="checkbox checkbox-pink">
														<input type="checkbox" id="checkbox02"/>
														<label for="checkbox02">Prepare The Conference Schedule</label>
													</div>
												</li>
												<li>
													<hr class="light-grey-hr"/>
												</li>
												<li class="todo-item">
													<div class="checkbox checkbox-warning">
														<input type="checkbox" id="checkbox03" checked/>
														<label for="checkbox03">Decide The Live Discussion Time</label>
													</div>
												</li>
												<li>
													<hr class="light-grey-hr"/>
												</li>
												<li class="todo-item">
													<div class="checkbox checkbox-success">
														<input type="checkbox" id="checkbox04" checked/>
														<label for="checkbox04">Prepare For The Next Project</label>
													</div>
												</li>
												<li>
													<hr class="light-grey-hr"/>
												</li>
												<li class="todo-item">
													<div class="checkbox checkbox-danger">
														<input type="checkbox" id="checkbox05" checked/>
														<label for="checkbox05">Finish Up AngularJs Tutorial</label>
													</div>
												</li>
												<li>
													<hr class="light-grey-hr"/>
												</li>
												<li class="todo-item">
													<div class="checkbox checkbox-purple">
														<input type="checkbox" id="checkbox06" checked/>
														<label for="checkbox06">Finish Infinity Project</label>
													</div>
												</li>
												<li>
													<hr class="light-grey-hr"/>
												</li>
											</ul>
											<!-- /Todo-List -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
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
								<li><a href="#"><span>merchant</span></a></li>
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
																						<h6 class="panel-title txt-dark">Garage Registration</h6><br/>
																						<h4 class="panel-title txt-dark"><font color="#A9A9A9">Garage Informations</font></h4>
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
																									<form method="POST" action="#" id="garageMetaInfo">
																										<div class="form-group col-sm-6 col-xs-6">
																											<label class="control-label mb-10" for="garage_NAME">Garage Name*</label>
																												<div class="input-group">
																													<div class="input-group-addon"><i class="icon-star"></i></div>
																													<input type="text" name="garageName" class="form-control" id="garageName" placeholder="Enter Garage Name" required>
																												</div>
																											</div>
																											<div class="form-group">
																												<label class="control-label mb-10" for="proprietor_name">Proprietor Name*</label>
																													<div class="input-group">
																														<div class="input-group-addon"><i class="icon-user"></i></div>
																														<input type="text" name="proprietorName" class="form-control" id="proprietorName" placeholder="Enter Proprietor Name" required>
																													</div>
																												</div>
																											<div class="form-group col-sm-4 col-xs-4">
																												<label class="control-label mb-10" for="proprietor_email">Proprietor Email address</label>
																												<div class="input-group">
																													<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
																													<input type="email" name="proprietorEmail" class="form-control" id="proprietorEmail" placeholder="Enter Proprietor email">
																												</div>
																											</div>
                                                      <div class="form-group col-sm-4 col-xs-4">
                                                        <label class="control-label mb-10" for="garage_phone_no">Garage Phone Number*</label>
                                                          <div class="input-group">
                                                            <div class="input-group-addon"><i class="icon-screen-smartphone"></i></div>
                                                            <input type="tel" name="garagePhone" class="form-control" id="garagePhone" placeholder="Enter garage phone number" data-mask="999999999999" required>
                                                          </div>
                                                        </div>

																											<div class="form-group col-sm-4 col-xs-4">
																												<label class="control-label mb-10" for="garage_website">Garage Webpage URL</label>
																												<div class="input-group">
																													<div class="input-group-addon"><i class="icon-globe"></i></div>
																													<input type="text" name="garageWebsite" class="form-control" id="garageWebsite" placeholder="Garage Website if any">
																												</div>
																											</div>

                                                      <div class="form-group col-sm-4 col-xs-4">
																												<label class="control-label mb-10" for="garage_services">Services Offered</label>
																												<div class="input-group">
																													<div class="input-group-addon"><i class="icon-drawar"></i></div>
                                                          <select name="servicesOffered" id="servicesOffered" class="form-control" required>
                                                            <option value="" disabled selected>Garage Type</option>
                                                            <option Value="Car">Car</option>
                                                            <option value="Bike">Bike</option>
                                                            <option value="Car,Bike">Both</option>
                                                            </select>
																												</div>
																											</div>
                                                      <div class="form-group col-sm-2 col-xs-2">
                                                        <label class="control-label mb-10" for="garage_staffs">Number of Staffs*</label>
                                                          <div class="input-group">
                                                            <div class="input-group-addon"><i class="icon-people"></i></div>
                                                            <input type="tel" name="staffCount" class="form-control" id="staffCount" placeholder="Staffs" data-mask="99" required>
                                                          </div>
                                                        </div>

																											<div class="form-group col-sm-2 col-xs-2">
																												<label class="control-label mb-10" for="garage_daily_capacity">Wages Capacity*</label>
																												<div class="input-group">
																													<div class="input-group-addon"><i class="icon-size-actual"></i></div>
																													<input type="text" name="dailyWages" class="form-control" id="dailyWages" placeholder="Capacity" required data-mask="99" required>
																												</div>
																											</div>


                            													<div class="form-group col-sm-4 col-xs-4">
                            															<label class="control-label mb-10" for="garage_facility_provided">Facilities Provided*</label>
                                                          <div class="input-group">
  																													<div class="input-group-addon"><i class="icon-list"></i></div>
                            															<select class="selectpicker" name="garageFacilities" id="garageFacilities" multiple data-style="form-control btn-default btn-outline" required>
                                                            <option value="NULL" disabled>Choose Services</option>
                            																<option value="Regular Checkup">Regular Checkup</option>
                            																<option value="General Diagonstics">General Diagonstics</option>
                                                            <option value="Breakdown Assistance">Breakdown Assistance</option>
                                                            <option value="Washing and Polishing">Washing and Polishing</option>
                                                            <option value="Doorstep Assistance">Doorstep Assistance</option>
                                                            <option value="Denting and Painting">Denting and Painting</option>
                            															</select>
                                                        </div>
                            														</div>


                                                      <!--Garage Address Informations-->

                                                      <div class="row">
                                                        <div class="col-md-12">
                                                          <div class="panel panel-default card-view">
                                                            <div class="panel-heading">
                                                              <div class="pull-left">
                                                                <h4 class="panel-title txt-dark"><font color="#A9A9A9">Merchant Address</font></h4>
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
                                                                        <label class="control-label mb-10" for="garage_country">Country*</label>
                                                                          <div class="input-group">
                                                                            <div class="input-group-addon"><i class="icon-layers "></i></div>
                                                                            <select name="countryChoice" id="countryChoice" class="form-control" required>
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
                                                                        <label class="control-label mb-10" for="garage_state">State*</label>
                                                                          <div class="input-group">
                                                                            <div class="input-group-addon"><i class="icon-directions"></i></div>
                                                                            <select name="stateChoice" id="stateChoice" class="form-control" required>
                                                                              <option value="NULL" selected disabled>SELECT STATE</option>
                                                                              </select>
                                                                            </div>
                                                                        </div>
                                                                    <div class="form-group col-sm-3 col-xs-3">
                                                                        <label class="control-label mb-10" for="garage_city">City*</label>
                                                                          <div class="input-group">
                                                                            <div class="input-group-addon"><i class="icon-direction"></i></div>
                                                                            <select name="cityChoice" id="cityChoice" class="form-control" required>
                                                                              <option value="NULL" selected disabled>SELECT CITY</option>
                                                                              </select>
                                                                            </div>
                                                                        </div>
                                                                    <div class="form-group col-sm-3 col-xs-3">
                                                                        <label class="control-label mb-10" for="garage_area_pincode">Pincode*</label>
                                                                          <div class="input-group">
                                                                            <div class="input-group-addon"><i class="icon-location-pin"></i></div>
                                                                            <input type="nuumber" name="garagePincode" class="form-control" required pattern="[0-9]{6}" id="garagePincode" placeholder="Enter your pincode" data-mask="999999" required>
                                                                          </div>
                                                                        </div>
                                                                        <div class="form-group col-sm-3 col-xs-3">
                                                                          <label class="control-label mb-10" for="garage_address_type">Address Type*</label>
                                                                            <div class="input-group">
                                                                              <div class="input-group-addon"><i class="icon-home "></i></div>
                                                                              <select name="addressType" id="addressType" class="form-control" required>
                                                                                <option value="" disabled selected>SELECT ADDRESS TYPE</option>
                                                                                <option Value="Office">Office</option>
                                                                                <option value="Workstation">Work Station</option>
                                                                                <option value="Office,Workstation">Both</option>
                                                                                </select>
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group col-sm-3 col-xs-3">
                                                                            <label class="control-label mb-10" for="garage_present_address">Address*</label>
                                                                            <div class="input-group">
                                                                              <div class="input-group-addon"><i class="icon-map"></i></div>
                                                                              <input type="text" name="streetAddress" class="form-control" id="streetAddress" required placeholder="Enter streetaddress">
                                                                            </div>
                                                                          </div>
                                                                          <div class="form-group col-sm-3 col-xs-3">
                                                                            <label class="control-label mb-10" for="garage_area">Area*</label>
                                                                            <div class="input-group">
                                                                              <div class="input-group-addon"><i class="icon-paper-plane"></i></div>
                                                                              <input type="text" name="garageArea" class="form-control" id="garageArea" placeholder="Enter Area of Garage" required>
                                                                            </div>
                                                                          </div>
                                                                          <div class="form-group col-sm-3 col-xs-3">
                                                                            <label class="control-label mb-10" for="garage_landmark">Garage Landmark*</label>
                                                                            <div class="input-group">
                                                                              <div class="input-group-addon"><i class="icon-anchor"></i></div>
                                                                              <input type="text" name="landmarkArea" class="form-control" id="landmarkArea" placeholder="Landmark of Garage" required>
                                                                            </div>
                                                                          </div> <br />
                                                                          <!--Garage Informations Panel end -->

                                                        <!-- Garage required Informations-->
																													<div class="row">
																														<div class="col-md-12">
																															<div class="panel panel-default card-view">
																																<div class="panel-heading">
																																	<div class="pull-left">
																																		<h4 class="panel-title txt-dark"><font color="#A9A9A9">Garage Document Informations</font></h4>
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
                                                                          <div class="form-group col-sm-4 col-xs-4">
									  																												<label class="control-label mb-10" for="garage_GSTIN">Garage GSTIN*</label>
									  																													<div class="input-group">
									  																														<div class="input-group-addon"><i class="icon-notebook"></i></div>
                                                                                <input type="number" class="form-control" name="GSTINRegistrationNumber" id="GSTINRegistrationNumber" placeholder="Enter Garage GSTIN" required>
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group col-sm-4 col-xs-4">
                                                                            <label class="control-label mb-10" for="garage_registration_no">Garage Registration Number</label>
                                                                              <div class="input-group">
                                                                                <div class="input-group-addon"><i class="icon-briefcase"></i></div>
                                                                                <input type="number" class="form-control" name="GarageRegistrationNumber" id="GarageRegistrationNumber" placeholder="Enter Garage Registration Number">
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group col-sm-4 col-xs-4">
                                                                            <label class="control-label mb-10" for="garage_lat_long_val">Enter Latitude/Longitude Value*</label>
                                                                              <div class="input-group">
                                                                                <div class="input-group-addon"><i class="icon-globe-alt"></i></div>
                                                                                <input type="text" class="form-control" name="LATLONGValue" id="LATLONGValue" placeholder="Enter Latitude/Longitude" data-mask="99.999,99.999" required>
                                                                              </div>
                                                                          </div>

                                                                          <div class="form-group col-sm-3 col-xs-3">
                                                                            <label class="control-label mb-10" for="garage_listing_number">Garage Listing Number*</label>
                                                                              <div class="input-group">
                                                                                <div class="input-group-addon"><i class="icon-globe-alt"></i></div>
                                                                                <input type="text" class="form-control" name="garageListingNumber" id="garageListingNumber" placeholder="#EXSOG-0001" data-mask="#EXSOG-9999" required>
                                                                              </div>
                                                                          </div>

                                                                          <div class="form-group col-sm-3 col-xs-3">
                                                                            <label class="control-label mb-10" for="proprietor_aadhaar_no">Proprietor AADHAAR Number*</label>
                                                                              <div class="input-group">
                                                                                <div class="input-group-addon"><i class="icon-globe-alt"></i></div>
                                                                                <input type="text" class="form-control" name="PROPAADHAARNumber" id="PROPAADHAARNumber" placeholder="4925-8145-9740" data-mask="9999-9999-9999" required>
                                                                              </div>
                                                                          </div>

                                                                          <div class="form-group col-sm-3 col-xs-3">
                                                                            <label class="control-label mb-10" for="proprietor_PAN_no">Proprietor PAN Number*</label>
                                                                              <div class="input-group">
                                                                                <div class="input-group-addon"><i class="icon-globe-alt"></i></div>
                                                                                <input type="text" class="form-control" name="PROPPANNumber" id="PROPPANNumber" placeholder="CLVPM1413M" data-mask="*****9999*" required>
                                                                              </div>
                                                                          </div>

                                                                          <div class="form-group col-sm-3 col-xs-3">
                                                                            <label class="control-label mb-10" for="proprietor_phone_no">Proprietor Phone Number*</label>
                                                                              <div class="input-group">
                                                                                <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                                                <input type="tel" name="proprietorPhoneNumber" class="form-control" id="proprietorPhoneNumber" placeholder="Proprietor phone number" data-mask="999999999999" required>
                                                                              </div>
                                                                            </div>

                                                                            <div class="form-group col-sm-3 col-xs-3">
                                                                              <label class="control-label mb-10" for="field_executive">Field Executive*</label>
                                                                                <div class="input-group">
                                                                                  <div class="input-group-addon"><i class="icon-home"></i></div>
                                                                                  <select name="fieldExecutiveVerification" id="fieldExecutiveVerification" class="form-control" required>
                                                                                    <option value="" disabled selected>Executive Name</option>
                                                                                    <?php
                                                                                          $selectExecutive = $conn -> query("SELECT * FROM `field_executive_report`");
                                                                                          while($selectExecutiveData = mysqli_fetch_assoc($selectExecutive)){
                                                                                    ?>
                                                                                    <option value="<?php echo $selectExecutiveData['executive_ID'];?>"><?php echo $selectExecutiveData['executive_name'];?></option>
                                                                                    <?php
                                                                                            }
                                                                                    ?>
                                                                                    </select>
                                                                                  </div>
                                                                              </div>

                                                                              <div class="form-group col-sm-3 col-xs-3">
                                                                                <label class="control-label mb-10" for="garage_publishing_status">Publishing Status*</label>
                                                                                  <div class="input-group">
                                                                                    <div class="input-group-addon"><i class="icon-home "></i></div>
                                                                                    <select name="garagePublishingStatus" id="garagePublishingStatus" class="form-control" required>
                                                                                      <option value="" disabled selected>SELECT PUBLISH STATUS</option>
                                                                                      <option Value="Unpublished">Unpublished</option>
                                                                                      <option value="Published">Published</option>
                                                                                      </select>
                                                                                    </div>
                                                                                </div>

                                                                        	<div class="form-group col-sm-3 col-xs-3">
									  																												<label class="control-label mb-10" for="garage_registration_date_time">Registration Date and Time*</label>
                                                                            <div class='input-group date' id='datetimepicker1'>
                                              																<input type='text' class="form-control" name="garageRegistrationDateTime" id="garageRegistrationDateTime" placeholder="Registration Date & Time" required/>
                                              																<span class="input-group-addon">
                                              																	<span class="fa fa-calendar"></span>
                                              																</span>
                                              															</div>
									  																												</div>

                                                                              <div class="form-group col-xs-12">
																																							<button type="submit" class="btn btn-success mr-10" id="createGarageEnrollment">Enroll Garage</button>
                                                                              <div style="display:none;"><button data-toggle="modal" data-target="#responsive-modal" class="model_img img-responsive" id="authenitcationVerification"> </button></div>
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

                              <!-- /.modal -->
										<div id="enrollmentAuthentication" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h5 class="modal-title">Modal Content is Responsive</h5>
													</div>
													<div class="modal-body">
														<form>
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Recipient:</label>
																<input type="text" class="form-control" id="recipient-name">
															</div>
															<div class="form-group">
																<label for="message-text" class="control-label mb-10">Message:</label>
																<textarea class="form-control" id="message-text"></textarea>
															</div>
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="button" class="btn btn-danger">Save changes</button>
													</div>
												</div>
											</div>
										</div>


				<!-- Footer -->
				<footer class="footer container-fluid pl-30 pr-30">
					<div class="row">
						<div class="col-sm-12">
							<p>2017 &copy; Exelinserv. Pampered by <a href="http://www.coolhaxlabs.com/" title="CoolHax LABS" target="_blank"><b>CoolHax LABS</b></a></p>
						</div>
					</div>
				</footer>
				<!-- /Footer -->

			</div>
			<!-- /Main Content -->

      <!--Custom Preloader-->
      <!-- <div id="divLoading" style="margin: 0px; padding: 0px; position: fixed; right: 0px; top: 0px; width: 100%; height: 100%; background-color: white; z-index: 30001; opacity: 0.8;">
<p style="position: absolute; color: blue; top: 50%; left: 45%;">
Loading, please wait...
<img src="https://camo.githubusercontent.com/60d741b9bfc3081d1c9f4aa6297ba82db8b706b7/687474703a2f2f692e696d6775722e636f6d2f4c4475485a65662e676966">
</p>
</div> -->

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

    <!-- Moment JavaScript -->
		<script type="text/javascript" src="vendors/bower_components/moment/min/moment-with-locales.min.js"></script>

    <!-- Bootstrap Datetimepicker JavaScript -->
		<script type="text/javascript" src="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Multiselect JavaScript -->
  		<script src="vendors/bower_components/multiselect/js/jquery.multi-select.js"></script>

		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>

		<!-- Fancy Dropdown JS -->
		<script src="dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- Bootstrap Select Js -->
    <script src="dist/js/bootstrap-select.js"></script>

    <!-- Toast Message  -->
    <script src="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>

    <!-- Sweet-Alert  -->
		<script src="vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

		<script src="dist/js/sweetalert-data.js"></script>

    <script>
    /*FormPicker Init*/

  $(document).ready(function() {
"use strict";

/* Bootstrap Select Init*/
$('.selectpicker').selectpicker();


	/* Datetimepicker Init*/
  $('#datetimepicker1').datetimepicker({
			useCurrent: false,
      format:'DD-MM-YYYY h:mm A',
			icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
		}).on('dp.show', function() {
		if($(this).data("DateTimePicker").date() === null)
			$(this).data("DateTimePicker").date(moment());
	});

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
                beforeSend: function() {
                $('#preloader').show().delay(500).fadeOut('slow');}, // will fade out the white DIV that covers the website.
                success: function(stateInfo){

                    var len = stateInfo.length;
                    $('#stateChoice').html('<option value="NULL" disabled selected>Please choose State</option>');


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
            beforeSend: function() {
            $('#preloader').show().delay(500).fadeOut('slow');}, // will fade out the white DIV that covers the website.
            data:{state:state},
            success: function(cityInfo){

                $('#cityChoice').html('<option value="NULL" disabled selected>Please choose City</option>');

                  if(cityInfo){

                      var len = cityInfo.length;

                      for (var i = 0; i<len; i++){

                        var cityID = cityInfo[i]['cityID'];
                        var cityName = cityInfo[i]['cityName'];
                        $('#cityChoice').append("<option value = '"+cityID+"'>"+cityName+"</option>");

                      }


                  } else{

                    $('#cityChoice').html('<option value="NULL" disabled selected>No City in list</option>');

                  }
            }
      });

    }else{

          $('#cityChoice').html('<option value="NULL" disabled>Please choose State First</option>');

    }

  });
        //Submitting Garage Informations
        $('#createGarageEnrollment').on('click',function(){

            var executiveID = $('#fieldExecutiveVerification').val();
            var garageInfoList = $('#garageMetaInfo').serialize();

                if(executiveID){

                  // $('#enrollmentAuthentication').show();
                    $.ajax({

                            type:'POST',
                            url:'includes/garageRegistrationVerification.php?requestType='+'GENERATE OTP',
                            beforeSend: function() {

                                $.toast({
                                      heading: 'Authentication code has been sent.',
                                      text: 'An OTP has been sent to both of the numbers. Please authenitcate.',
                                      position: 'top-right',
                                      loaderBg:'#fec107',
                                      icon: 'success',
                                      hideAfter: 5500,
                                      stack: 6
                                    });

                                    $('#preloader').show().delay(2500).fadeOut('slow');
                            },
                            data:{'executiveID':executiveID,'garageInfo':garageInfoList},
                            dataType:'json',
                            success:function(data){
                              if(data.response == 'SUCCESS'){

                                            // $('#authenitcationVerification').click();

                                            swal({
                                              title: "OTP SENT",
                                              type: "success",
                                              text: data.message,
                                              confirmButtonColor: "#2ecd99",
                                            });

                                    // $.ajax({
                                    //
                                    //         type:'POST',
                                    //         url:'includes/garageRegistration.php',
                                    //         dataType:'json',
                                    //         data:{'garageDATA':garageInfoList},
                                    //         success:function(data){
                                    //           if(data){
                                    //             swal({
                                    //               title: "good job!",
                                    //               type: "success",
                                    //               text: "Lorem ipsum dolor sit amet",
                                    //               confirmButtonColor: "#2ecd99",
                                    //                 });
                                    //           }
                                    //         }
                                    //
                                    // });

                              }else if(data.response == 'NOT SENT'){

                                swal({
                                  title: "UNABLE TO SEND OTP",
                                  type: "warning",
                                  text: data.message,
                                  confirmButtonColor: "red",
                                });

                              }else{

                                  alert('UNKNOWN.');

                              }

                            }
                      });

                  }else{

                    $.toast({
                            heading: 'Fields are empty.',
                            text: 'Please fill all the fields then proceed.',
                            position: 'top-right',
                            loaderBg:'#fec107',
                            icon: 'error',
                            hideAfter: 5500,
                            stack: 6
                          });
                  }

  });
return false;
});

    </script>
	</body>
</html>
