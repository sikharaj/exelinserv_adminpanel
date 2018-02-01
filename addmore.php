<?php

	print_r ($_POST);
	exit;
	//Setting header type
	header("Content-Type: application/json");
	//Disabling all errors
	error_reporting( 0);

	//Initializing Session for better security
	session_start();

	//Including necessary callbacks
	include 'includes/db_connect.php';

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
	 //$item1 = $_POST['item1'];
 	 //$description1 = $_POST['description1'];
	 //$qty1 = $_POST['qty1'];
	 //$price1 = $_POST['price1'];
	 //$discount1 = $_POST['discount1'];
	 //$taxrate1 = $_POST['taxrate1'];
	 //$productunit1 = $_POST['productunit1'];
	 //$total1 = $_POST['total1'];


	if(!empty($_POST)){// If no blank datas are there
		 	 $insertInvoiceSql = "INSERT INTO `ip_invoices`(`user_id`, `address_id`, `order_id`, `invoice_datetime`, `invoice_number`) VALUES ('$customerId','$addressId','$orderId','$dateTime','#EXINVOD123')";
			// $insertInvoiceSql1 = "INSERT INTO `ip_invoices`(`user_id`, `address_id`, `order_id`, `invoice_datetime`, `invoice_number`) VALUES ('$customerId','$addressId','$orderId','$dateTime','#EXINVOD123')";
			$insertInvoiceSqlResults = $conn -> query($insertInvoiceSql);
			if ($insertInvoiceSqlResults) { // If insertion successful

				 $invioceId = $conn->insert_id; // Get inserted invoice id
				 echo $insertItemsQuery = "INSERT INTO `invoice_items`(`invoice_id`, `items`, `product_unit`, `cost`, `totalcost`, `description`, `discount_amount`, `discount_percent`, `quantity`) VALUES ('$invioceId','$item','$productunit','$price','$total','$description','$discount','$taxrate','$qty')";
				 //echo $insertItemsQuery = "INSERT INTO `invoice_items`(`invoice_id`, `items`, `product_unit`, `cost`, `totalcost`, `description`, `discount_amount`, `discount_percent`, `quantity`) VALUES ('$invioceId','$item1','$description1','$price1','$total1','$description1','$discount1','$taxrate1','$qty1')";
					$insertItemsQueryResults = $conn -> query($insertItemsQuery);
					if ($insertItemsQueryResults) { // If executed

						$response = "Data inserted successfully";
						//header('location:generate_invoice.php?message='.$response);

					} else {

						$response = "Data insertion failed";

					}

			} else {

				$response = "Insertion Failed";

			}
//json_encode(['success'=>'Names Inserted successfully.']);
}
