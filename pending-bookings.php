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
	<title>Philbert I Fast build Admin dashboard for any platform</title>
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
					  <h5 class="txt-dark">Export</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>table</span></a></li>
						<li class="active"><span>Export</span></li>
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
                            <th>Invoice</th>
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
                            <td><a href="generate_invoice.php?orderId=<?=$selectAllQuickOrdersData['orderID'];?>"><button type="button" name="add" id="add" class="btn btn-success">Generate Invoice</button></a></td>
                          </tr>
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
						<p>2017 &copy; Philbert. Pampered by Hencework</p>
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


</body>

</html>
