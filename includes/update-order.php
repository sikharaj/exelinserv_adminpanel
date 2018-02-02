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
	$oderstatus = $_POST['oderstatus'];
  $issue = $_POST['issue'];
  $totalpayment = $_POST['totalpayment'];
	$advancedpayment = $_POST['advancedpayment'];
	$paymentmode = $_POST['paymentmode'];
  $paymentDue = $_POST['paymentDue'];
  $transID = $_POST['transID'];
	$garages = $_POST['garages'];
	$deliveryboy = $_POST['deliveryboy'];
  $orderId = $_POST['orderId'];
if($conn) {
  echo "Connected";
} else {
  echo "Not";
}
  if(!empty($_POST)) {
    //$phone = 91.$phone;
  $updateOrderQuery = "UPDATE `orders` SET `vehicleName`='$vehicleName',`pickupDateNdTime`='$pickUpDate',`dropOffDateNdTime`='$dropDate',`orderCreatedOn`='$createdon',`orderStatus`='$oderstatus',`issue`='$issue',`phone`='$phone',`serviceType`='$servicetype',`vehicleType`='$vehicleType',`vehicleColor` = '$vehiclecolor',`totalPayment` = '$totalpayment',`advancePayment`='$advancedpayment',
  `paymentDue`='$paymentDue',`paymentMode`='$paymentmode', `deliveryBoy`='$deliveryboy',`garages`= '$garages', `lastUpdatedOn`='$lastUpdates',`fuelVariant`='$fuelvariant',`kiloMeterReading`='$meterReading',`preferenceService`='$preference',`transactionID`='$transID' WHERE `orderID` = '$orderId'";
    $updateOrderResults = $conn -> query($updateOrderQuery);
    if($updateOrderResults)  {

      $response = "Updated Successfully";
      header('location:../edit_order.php?orderId='.$orderId);
    } else {
      $response = "Not Updated";
    }
  }
?>
