<?php


	define (DB_USER, "root");
	define (DB_PASSWORD, "");
	define (DB_DATABASE, "exelinserv");
	define (DB_HOST, "localhost");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);


	if(!empty($_POST)){


		foreach ($_POST["name"] as $key => $value) {
			$sql = "INSERT INTO ip_invoices(invoice_date_created,invoice_time_created) VALUES ('".$value."','".$value."')";
			$mysqli->query($sql);
		}
		echo json_encode(['success'=>'Names Inserted successfully.']);
	}


?>
