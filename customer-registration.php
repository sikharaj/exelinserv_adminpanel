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
													<input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Search">
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
																														<input type="tel" name="phone" class="form-control" id="exampleInputuname_1" placeholder="Enter phone number">
																													</div>
																												</div>
																											<div class="form-group col-sm-6 col-xs-6">
																												<label class="control-label mb-10" for="exampleInputpwd_1">Password</label>
																												<div class="input-group">
																													<div class="input-group-addon"><i class="icon-lock"></i></div>
																													<input type="password" name="password" class="form-control" id="exampleInputpwd_1" placeholder="Enter password">
																												</div>
																											</div>

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
                                                                    <h6 class="panel-title txt-dark">Customer Registration</h6><br/>
                        																						<h4 class="panel-title txt-dark"><font color="#A9A9A9">Customer Communcation Address With All Details.</font></h4>
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
