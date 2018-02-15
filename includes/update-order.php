<?php

	//print_r ($_POST);
	//exit;
	//Setting header type
	//header("Content-Type: application/json");
	//Disabling all errors
	error_reporting( 0);

	//Initializing Session for better security
	session_start();

	//Including necessary callbacks
	include 'db_connect.php';

  $now =  date('d-m-Y H:i');
  $lastUpdates = $now;
	//$dateTime = $now;
	//$dueDate = $now;
	//$name = $_POST['name'];s
	$phone = $_POST['phone'];
	$createdon = $_POST['createdon'];
	$pickUpDate = $_POST['pickUpDate'];
	$dropDate = $_POST['dropDate'];
  $vehicleType = $_POST['vehicleType'];
  $vehicleName = $_POST['vehicleName'];
	$vehiclecolor = $_POST['vehiclecolor'];
	$fuelvariant = $_POST['fuelvariant'];
  $meterReading = $_POST['meterReading'];
  $servicetype = $_POST['servicetype'];
	$preference = $_POST['preference'];
	$orderstatus = $_POST['oderstatus'];
  $issue = $_POST['issue'];
  $totalpayment = $_POST['totalpayment'];
	$advancedpayment = $_POST['advancedpayment'];
	$paymentmode = $_POST['paymentmode'];
  $paymentDue = $_POST['paymentDue'];
  $transID = $_POST['transID'];
	$garages = $_POST['garages'];
	$deliveryboy = $_POST['deliveryboy'];
  $orderId = $_POST['orderId'];
	$message = ""; //Message to be sent when any of the order status changes.
	$team = "";


  if(!empty($_POST)) {

		$phoneNumber = 91.$phone;

		if($orderstatus){


			$message="Thank you for chosing Exelinserv. Your ORDER STATUS IS UPDATED TO $orderstatus on $lastUpdatedOn. We assure you the best qulaity of work. Regards Team Exelinserv.";
			$sendCustomerOrderUpdateMessage = file_get_contents('https://control.msg91.com/api/sendhttp.php?authkey=165253Ajtf4e50P59687f4a&mobiles='.$phoneNumber.'&message='.$message.'&sender=EXLSRV&route=4&country=91');

		}

		if($advancedpayment){


			$message="Thank you for making advance payment of INR$advancedpayment of INR$totalpayment with TRANSACTION ID - $transID. Remaining Due INR$paymentDue. Please clear if any dues for release of your vehicle.";
			$sendCustomerOrderUpdateMessage = file_get_contents('https://control.msg91.com/api/sendhttp.php?authkey=165253Ajtf4e50P59687f4a&mobiles='.$phoneNumber.'&message='.$message.'&sender=EXLSRV&route=4&country=91');

		}


  $updateOrderQuery = "UPDATE `orders` SET `vehicleName`='$vehicleName',`pickupDateNdTime`='$pickUpDate',`dropOffDateNdTime`='$dropDate',`orderCreatedOn`='$createdon',`orderStatus`='$orderstatus',`issue`='$issue',`phone`='$phone',`serviceType`='$servicetype',`vehicleType`='$vehicleType',`vehicleColor` = '$vehiclecolor',`totalPayment` = '$totalpayment',`advancePayment`='$advancedpayment',
  `paymentDue`='$paymentDue',`paymentMode`='$paymentmode', `deliveryBoy`='$deliveryboy',`garages`= '$garages', `lastUpdatedOn`='$lastUpdates',`fuelVariant`='$fuelvariant',`kiloMeterReading`='$meterReading',`preferenceService`='$preference',`transactionID`='$transID' WHERE `orderID` = '$orderId'";
    $updateOrderResults = $conn -> query($updateOrderQuery);
    if($updateOrderResults)  {



      $response = "Updated Successfully";
      header('location:../modify.php?message'.$response);

    } else {

      $response = "Not Updated";
			header('location:../modify.php?message'.$response);

    }
  }
