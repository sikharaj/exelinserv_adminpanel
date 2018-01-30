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
                      $selectCustomerAddress = "SELECT * FROM `address` WHERE `customerID` = '$custId'";
                      $selectCustomerAddressResults = $conn -> query($selectCustomerAddress);
                      if($selectCustomerAddressResults) { // If Executed
                        $selectCustomerAddressData = $selectCustomerAddressResults -> fetch_assoc();

                        $selectCustomerInfo = "SELECT * FROM `customerdetails` WHERE `customerID` = '$custId'";
                        $selectCustomerInfoResults = $conn -> query($selectCustomerInfo);
                        if($selectCustomerInfoResults){ //If Executed
                          $selcetCustomerInfoData = $selectCustomerInfoResults -> fetch_assoc();


                      ?>
					<!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
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
												  <abbr title="Phone">P:<?=$selectCustomerAddressData['custPhoneNumber']?></abbr>
												</address>
											</div>
											<div class="col-xs-6 text-right">
												<span class="txt-dark head-font inline-block capitalize-font mb-5">shiped to:</span>
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
													Email :<?=$selcetCustomerInfoData['email'];?>
												</address>
											</div>
											<div class="col-xs-6 text-right">
												<address>
													<span class="txt-dark head-font capitalize-font mb-5">order date:</span> <br/><?=$selectOrderIdData['orderCreatedOn'];?>
													<br><br>
												</address>
											</div>
										</div>

                    <?php
                                        }}  } else {
                                          header("Location:editRental.php?message=No User Found.");
                                      }}

                                      ?>

										<div class="seprator-block"></div>

										<div class="invoice-bill-table">
											<div class="table-responsive">
                        <form id="add_name" name="add_name" method="POST" action="">
												<table class="table table-hover" id="dynamic_field">
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
                            </tr>
													</thead>
													<tbody>
														<tr>
                            <td>
                            <input type="text" name="item" placeholder="" class="form-control name_list"/>
                          </td>
															<td><input type="text" name="description" placeholder="" class="form-control name_list"/>
                            </td>
															<td><input type="text" name="qty" placeholder="" class="form-control name_list" />
                            </td>
															<td><input type="text" name="price" placeholder="" class="form-control name_list" />
                            </td><td><input type="text" name="discount" placeholder="" class="form-control name_list" />
                            </td>
															<td><input type="text" name="taxrate" placeholder="" class="form-control name_list" />
                            </td>
															<td><input type="text" name="productunit" placeholder="" class="form-control name_list" />
                            </td>
                            <td><input type="text" name="total" placeholder="" class="form-control name_list" />
                          </td>
                              <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="button-list pull-right">
                        <button type="submit" class="btn btn-success mr-10" id="saveInvoiceButton">
													Submit
												</button>
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
    <script type="text/javascript">
        $(document).ready(function(){
          var postURL = "addmore.php";
          var i=1;


          $('#add').click(function(){
               i++;
               $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td></td><td><input type="text" name="item" class="form-control name_list" /></td><td><input type="text" name="description" class="form-control name_list"  /></td><td><input type="text" name="qty" class="form-control name_list" /></td><td><input type="text" name="price" class="form-control name_list" /></td><td><input type="text" name="discount" class="form-control name_list" /></td><td><input type="text" name="texrate" class="form-control name_list" /></td><td><input type="text" name="discount" class="form-control name_list"/></td><td><input type="text" name="totals" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
          });


          $(document).on('click', '.btn_remove', function(){
               var button_id = $(this).attr("id");
               $('#row'+button_id+'').remove();
          });


          $('#saveInvoiceButton').on('click',function(){
            //alert("hi");
            //var Button = $('#add_name').val();
          //  alert(Button);
               $.ajax({
                    url:postURL,
                    method:"POST",
                    data:$('#add_name').serialize(),
                    type:'json',
                    //cache: false,
                    success:function(data)
                    {
                      	i=1;
                      	$('.dynamic-added').remove();
                      	$('#add_name')[0].reset();
        				        //alert('Record Inserted Successfully.');
                    }
               });
          });


        });
    </script>
    <!-- Auto-increment table script-->
    <script>
    var tables = document.getElementsByTagName('table');
    var table = tables[tables.length - 1];
    var rows = table.rows;
    for(var i = 1, td; i < rows.length; i++){
        td = document.createElement('td');
        td.appendChild(document.createTextNode(i + 0));
        rows[i].insertBefore(td, rows[i].firstChild);
    }
  </script>
	</body>
</html>
