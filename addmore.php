<?php

	//print_r ($_POST);
	//exit;
	//Setting header type
	header("Content-Type: application/json");
	//Disabling all errors
	error_reporting( 0);

	//Initializing Session for better security
	session_start();

	//Including necessary callbacks
	include 'db_connect.php';


	$now =  date('d-m-Y H:i');
	$dateTime = $now;
	$dueDate = $now;
	$item = $_POST['item'];
 	$description = $_POST['description'];
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	$discount = $_POST['discount'];
	$taxrate = $_POST['taxrate'];
	$productunit = $_POST['productunit'];
	$total = $_POST['total'];
 	$customerId = $_POST['customerId'];
	$addressId = $_POST['addressId'];
	$orderId = $_POST['orderId'];

	if(!empty($_POST)){
			//foreach ($_POST[""] as $key => $value) {
			echo $sql = "INSERT INTO `ip_invoices`(`user_id`, `address_id`, `order_id`, `invoice_datetime`, `invoice_number`, `invoice_discount_amount`, `invoice_discount_percent`) VALUES ('$customerId','$addressId','$orderId','$dateTime','#EXINVOD123','$discount','$taxrate')";
			$mysqli->query($sql);
			if($mysqli){
				echo "Submitted";
			}else {
				echo "Not";
			}
			//if($insertResult) {
json_encode(['success'=>'Names Inserted successfully.']);
			}
		//}

	//}
//SELECT * FROM address ad JOIN customerdetails cd ON ad.customerID=cd.customerID WHERE cd.customerID = ad.customerID
