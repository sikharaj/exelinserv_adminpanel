<?php

	print_r($_POST);
	exit;
	define (DB_USER, "root");
	define (DB_PASSWORD, "");
	define (DB_DATABASE, "exelinserv");
	define (DB_HOST, "localhost");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);


	if(!empty($_POST)){


		foreach ($_POST[""] as $key => $value) {
			$sql = "INSERT INTO ip_invoices(`user_id`, `address_id`, `invoice_datetime`, `invoice_date_due`, `invoice_number`, `invoice_discount_amount`, `invoice_discount_percent`, `invoice_terms`, `invoice_url_key`, `payment_method`) VALUES ('".$value."','".$value."','".$value."','".$value."','".$value."','".$value."','".$value."','".$value."','".$value."','".$value."')";
			$mysqli->query($sql);
		}
		echo json_encode(['success'=>'Names Inserted successfully.']);
	}
?>
