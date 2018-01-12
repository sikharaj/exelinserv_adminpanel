<?php

    include_once "../includes/db_connect.php"; //DB Connection Script Inclusion
    date_default_timezone_set('Asia/Kolkata');

    if(isset($_SESSION['bazooka'])) { //Check if the session is already set

        header('Location:../admin-dashboard.php?message=You are already Logged in.'); // Redirect to dashboard if already logged in
    } else {
        session_start();

        //Define Variables and assigning values received via POST

        $now =  date('d-m-Y H:i');
        $pickupDate ="$now";
        $dropoffDate = "$now";
        $lastUpdatedOn = "$now";
        $orderCreatedOn = $_POST['createdon'];
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $userStatus = $_POST['userstatus'];
        $preference = $_POST['preference'];
        $orderStatus = $_POST['oderstatus'];
        $vehicleColor = $_POST['vehiclecolor'];
        $fuelVariant = $_POST['fuelvariant'];
        $kilomtReading = $_POST['meterReading'];
        $vehicleType = $_POST['vehicleType'];
        $vehicleBrand = $_POST['vehicleName'];
        $pickupDate = $_POST['pickUpDate'];
        $dropoffDate = $_POST['dropDate'];
        $serviceType = $_POST['servicetype'];
        $issue = $_POST['issue'];
        $totalPayment = $_POST['totalpayment'];
        $advancedPayment = $_POST['advancedpayment'];
        $paymentMode = $_POST['paymentmode'];
        $paymentDue = $_POST['paymentDue'];
        $transactionID = $_POST['transID'];
        $lastUpdatedOn = $_POST['lastupdates'];
        $garage = $_POST['garages'];
        $pickupBoy = $_POST['deliveryboy'];
        $customerid = $_POST['customerId'];

        if (!empty($_POST)){
          if(!$dropoffDate)
          {
            $dropoffDate =  "Not Confirmed";
          }else {
            $dropoffDate = $dropoffDate;
          }
          $insertOrderData = "INSERT INTO `orders`(`customerID`, `name`, `vehicleName`, `pickupDateNdTime`, `dropOffDateNdTime`, `orderCreatedOn`, `orderStatus`, `userStatus`, `issue`, `phone`, `serviceType`, `vehicleType`, `vehicleColor`, `totalPayment`, `advancePayment`, `paymentDue`, `paymentMode`, `deliveryBoy`, `garages`, `lastUpdatedOn`, `fuelVariant`, `kiloMeterReading`, `preferenceService`, `transactionID`) VALUES('$customerid','$firstName','$vehicleBrand','$pickupDate','$dropoffDate','$orderCreatedOn','$orderStatus','$userStatus','$issue','$phone','$serviceType','$vehicleType','$vehicleColor','$totalPayment','$advancedPayment','$paymentDue','$paymentMode','$pickupBoy','$garage','$now','$fuelVariant','$kilomtReading','$preference','$transactionID')";
          $insertOrderDataResult = $conn->query($insertOrderData);
            if ($insertOrderDataResult){// If Insertion successful
              $message = "Oder Created Successfully";
              header('Location:../order-creation.php?message='.$message);

            } else {
              $message = "Oder Creation Failed";
             header('Location:../order-creation.php?message='.$message);
            }
        }

}
