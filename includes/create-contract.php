<?php

    include_once "../includes/db_connect.php"; //DB Connection Script Inclusion
    date_default_timezone_set('Asia/Kolkata');

    if(isset($_SESSION['bazooka'])) { //Check if the session is already set

        header('Location:../admin-dashboard.php?message=You are already Logged in.'); // Redirect to dashboard if already logged in
    } else {
        session_start();

        //Define Variables and assigning values received via POST
        //print_r($_POST);
        //exit;
        $now =  date('d-m-Y H:i');
        $createdOn = "$now";
        //$createdOn = $_POST['createdon'];
        $firstName = $_POST['fullname'];
        $phone = $_POST['phone'];
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
        $garage = $_POST['garages'];
        $pickupBoy = $_POST['deliveryboy'];
        $quikOrderID = $_POST['quikOrderID'];
        $insuranceType = $_POST['insurance'];
        $insuranceProvider = $_POST['insuranceProvider'];
        $contractNumber = $_POST['contractNumber'];
        $purchaseDate = $_POST['purchaseDate'];
        $expiryDate = $_POST['expiryDate'];
        $ldvIdv = $_POST['ldvIdv'];
        $location = $_POST[''];


        if (!empty($_POST)){
          if(!$dropoffDate)
          {
            $dropoffDate =  "Not Confirmed";
          }else {
            $dropoffDate = $dropoffDate;
          }
          $selectTempOrderId = "SELECT * FROM `quickorder` WHERE `quikOrderID` = '$quikOrderID'";
          $selectTempOrderIdResults = $conn -> query($selectTempOrderId);
          if($selectTempOrderIdResults) {
            $selectTempOrderIdData = $selectTempOrderIdResults -> fetch_assoc();
             $quikOrderID;

               $insertOrderData = "INSERT INTO `orders`(`tempOrderID`, `name`, `vehicleName`, `pickupDateNdTime`, `dropOffDateNdTime`, `orderCreatedOn`, `orderStatus`, `userStatus`, `issue`, `location`, `phone`, `serviceType`, `vehicleType`, `vehicleColor`, `totalPayment`, `advancePayment`, `paymentDue`, `paymentMode`, `deliveryBoy`, `garages`, `lastUpdatedOn`, `fuelVariant`, `kiloMeterReading`, `preferenceService`, `transactionID`)
               VALUES('$quikOrderID','$firstName','$vehicleBrand','$pickupDate','$dropoffDate','$createdOn','$orderStatus','ACTIVE','$issue','$location','$phone','$serviceType','$vehicleType','$vehicleColor','$totalPayment','$advancedPayment','$paymentDue','$paymentMode','$pickupBoy','$garage','$now','$fuelVariant','$kilomtReading','$preference','$transactionID')";
              $insertOrderDataResult = $conn->query($insertOrderData);
                if ($insertOrderDataResult){// If Insertion successful
                  $last_id = $conn ->insert_id;

                  $insertVehicleInfo = "INSERT INTO `vehicleInformations`(`orderID`, `insurance`, `providerName`, `contractNumber`, `purchaseDate`, `expiryDate`, `LDV_IDV`) VALUES ('$last_id','$insuranceType','$insuranceProvider','$contractNumber','$purchaseDate','$expiryDate','$ldvIdv')";//
                  $insertVehicleInfoReults = $conn -> query($insertVehicleInfo);
                  if ($insertVehicleInfoReults){
                    $deleteTempOrderDetails = "DELETE FROM `quickorder` WHERE `quikOrderID` = '$quikOrderID'";
                    $DeletedResult = $conn -> query($deleteTempOrderDetails);
                    if ($DeletedResult) {
                      $message = "Oder Created Successfully";
                      header('Location:../active-bookings.php?message='.$message);
                    }else {
                      $message = "Oder Creation Failed";
                      header('Location:../active-bookings.php?message='.$message);
                    }

                  }else {
                    $message = "Vehicle informations insertion  failed";
                    header('Location:../active-bookings.php?message='.$message);
                  }

                } else {
                  $message = "Oder data could not be submitted";
                  header('Location:../customer-bookings.php?message='.$message);
                }
              }
        }

}
