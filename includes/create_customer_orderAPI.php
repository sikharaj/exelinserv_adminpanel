<?php

    //Setting header type
    //header("Content-Type: application/json");

    //Disabling all errors
    error_reporting( 0);

    //Initializing Session for better security
    session_start();

    //Including necessary callbacks
    include 'db_connect.php';

    //Define Variables and assigning values received via POST
    //print_r($_POST);
    //exit;
    $now =  date('d-m-Y H:i');
    $createdOn = "$now";
    //$createdOn = $_POST['createdon'];
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
    $insuranceType = $_POST['insurance'];
    $insuranceProvider = $_POST['insuranceProvider'];
    $contractNumber = $_POST['contractNumber'];
    $purchaseDate = $_POST['purchaseDate'];
    $expiryDate = $_POST['expiryDate'];
    $ldvIdv = $_POST['ldvIdv'];
    //$expiryDate = $_POST['expiryDate'];

    if (!empty($_POST)){
          if(!$dropoffDate)
          {
            $dropoffDate =  "Not Confirmed";
          }else {
            $dropoffDate = $dropoffDate;
          }
          $selectCustomerAddressId = "SELECT * FROM `address` WHERE `customerID` = '$customerid'";
          $selectCustomerAddressIdResults = $conn -> query($selectCustomerAddressId);
          if($selectCustomerAddressIdResults) {
            $selectCustomerAddressIdData = $selectCustomerAddressIdResults -> fetch_assoc();
            $addressId = $selectCustomerAddressIdData['addressID'];

              $insertOrderData = "INSERT INTO `orders`(`customerID`, `name`, `vehicleName`, `addressID`, `pickupDateNdTime`, `dropOffDateNdTime`, `orderCreatedOn`, `orderStatus`, `userStatus`, `issue`, `phone`, `serviceType`, `vehicleType`, `vehicleColor`, `totalPayment`, `advancePayment`, `paymentDue`, `paymentMode`, `deliveryBoy`, `garages`, `lastUpdatedOn`, `fuelVariant`, `kiloMeterReading`, `preferenceService`, `transactionID`)
               VALUES('$customerid','$firstName $lastName','$vehicleBrand','$addressId','$pickupDate','$dropoffDate','$createdOn','$orderStatus','$userStatus','$issue','$phone','$serviceType','$vehicleType','$vehicleColor','$totalPayment','$advancedPayment','$paymentDue','$paymentMode','$pickupBoy','$garage','$now','$fuelVariant','$kilomtReading','$preference','$transactionID')";
              $insertOrderDataResult = $conn->query($insertOrderData);
                if ($insertOrderDataResult){// If Insertion successful
                  $last_id = $conn ->insert_id;

                  $insertVehicleInfo = "INSERT INTO `vehicleInformations`(`orderID`, `customerID`, `addressID`, `insurance`, `providerName`, `contractNumber`, `purchaseDate`, `expiryDate`, `LDV_IDV`) VALUES ('$last_id','$customerid','$addressId','$insuranceType','$insuranceProvider','$contractNumber','$purchaseDate','$expiryDate','$ldvIdv')";//
                  $insertVehicleInfoReults = $conn -> query($insertVehicleInfo);
                  if ($insertVehicleInfoReults){
                    $message = "Oder Created Successfully";
                    header('Location:../create-orders.php?message='.$message);
                  }else {
                    $message = "Oder Creation Failed";
                   header('Location:../create-orders.php?message='.$message);
                  }


                } else {
                  $message = "Oder data could not be submitted";
                 header('Location:../create-orders.php?message='.$message);
                }
              }
        }
