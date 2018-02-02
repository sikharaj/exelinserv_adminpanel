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

  $orderId = $_POST['orderId'];

  if(!empty($_POST)) {
    //$phone = 91.$phone;
  $updateOrderQuery = "UPDATE `orders` SET `userStatus`='INACTIVE' WHERE `orderID` = '$orderId'";
    $updateOrderResults = $conn -> query($updateOrderQuery);
    if($updateOrderResults)  {

      $response = "Deleted Successfully";
      header('location:../modify.php?message='.$response);
    } else {
      $response = "Not Deleted";
    }
  }
?>
