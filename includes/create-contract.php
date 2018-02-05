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
        $createdOn = $_POST['createdon'];
        //$createdOn = $_POST['createdon'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
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
        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $pincode = $_POST['pincode'];
        $addressType = $_POST['addressType'];
        $streetAddress = $_POST['streetAddress'];
        $temperaryPhNumber = $_POST['alternatePhoneNumber'];
        $gender = $_POST['genderChoose'];
        $area = $_POST['area'];
        $email = $_POST['email'];
        $lastUpdatedOn = $now;


        if (!empty($_POST)){
          $temperaryPhNumber = "91".$temperaryPhNumber;
          if(!$dropoffDate)
          {
            $dropoffDate =  "Not Confirmed";
          }else {
            $dropoffDate = $dropoffDate;
          }

          if ($addressType == 'SELF'){
              $selectEmailId = "SELECT * FROM `customerdetails` WHERE `email` = '$email'";// check if the email ID already Existing or not
              $selectEmailIDResult = $conn -> query($selectEmailId);
              if ($selectEmailIDResult->num_rows > 0)  {//If email already exist
                  header('Location:../create-contract.php?message=User with same mail ID is already registered with us.');
              } else {
                $insertCustomerData = "INSERT INTO `customerdetails`(`firstName`, `lastName`, `phoneNumber`,`email`,`status`, `createdOn`, `lastUpdatedOn`, `PBStatus`, `password`, `salt`, `gender`) VALUES ('$firstname','$lastname','$phone','$email','ACTIVE','$createdOn','$lastUpdatedOn','PUBLISHED','Exelinserv#1','Exelinserv#1','$gender')";
                $insertCustomerDataResult =$conn -> query($insertCustomerData);

                  if ($insertCustomerDataResult) { //If insertion successful
                    $last_id = $conn->insert_id;
                    $getCustomerId = "SELECT * FROM `customerdetails` WHERE `phoneNumber` = '$phone' AND `email` = '$email'";
                    $getCustomerIdResult = $conn -> query($getCustomerId);
                          if ($getCustomerIdResult) { //If phone no and email id exist

                             $last_id = $conn->insert_id;

                                    $customerData = $getCustomerIdResult -> fetch_assoc();
                                      $customerId = $customerData['customerID']; //select customer ID
                                        //insert Address data to address Table

                                         $insertAddressData = "INSERT INTO `address`(`customerID`, `customerName`, `custPhoneNumber`, `tmpPhoneNum`, `streetAddress`, `city`, `state`,`country`, `area`, `pinCode`, `addressType`) VALUES ('$customerId','$firstname $lastname','$phone','$temperaryPhNumber','$streetAddress','$city','$state','$country','$area','$pincode','$addressType')";
                                        $insertAddressDataResult = $conn -> query($insertAddressData);
                                        if ($insertAddressDataResult) {

                                          $address_id = $conn ->insert_id;
                                          $selectTempOrderId = "SELECT * FROM `quickorder` WHERE `quikOrderID` = '$quikOrderID'";
                                          $selectTempOrderIdResults = $conn -> query($selectTempOrderId);
                                          if($selectTempOrderIdResults) {
                                              $selectTempOrderIdData = $selectTempOrderIdResults -> fetch_assoc();

                                               $insertOrderData = "INSERT INTO `orders`(`tempOrderID`, `customerID`, `name`, `email`, `vehicleName`, `addressID`, `pickupDateNdTime`, `dropOffDateNdTime`, `orderCreatedOn`, `orderStatus`, `userStatus`, `issue`, `location`, `phone`, `serviceType`, `vehicleType`, `vehicleColor`, `totalPayment`, `advancePayment`, `paymentDue`, `paymentMode`, `deliveryBoy`, `garages`, `lastUpdatedOn`, `fuelVariant`, `kiloMeterReading`, `preferenceService`, `transactionID`) VALUES ('$quikOrderID','$customerId','$firstname $lastname','$email','$vehicleBrand','$address_id','$pickupDate','$dropoffDate','$createdOn','$orderStatus','ACTIVE','$issue','$city','$phone','$serviceType','$vehicleType','$vehicleColor','$totalPayment','$advancedPayment','$paymentDue','$paymentMode','$pickupBoy','$garage','$now','$fuelVariant','$kilomtReading','$preference','$transactionID')";
                                              $insertOrderDataResult = $conn->query($insertOrderData);
                                                if ($insertOrderDataResult){// If Insertion successful
                                                  $last_id = $conn ->insert_id;
                                                  $insertVehicleInfo = "INSERT INTO `vehicleInformations`(`orderID`, `customerID`, `addressID`, `insurance`, `providerName`, `contractNumber`, `purchaseDate`, `expiryDate`, `LDV_IDV`) VALUES ('$last_id','$customerId','$address_id','$insuranceType','$insuranceProvider','$contractNumber','$purchaseDate','$expiryDate','$ldvIdv')";//
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
                                                }else {
                                                  $message = "Order informations insertion  failed";
                                                  header('Location:../create-contract.php?message='.$message);
                                                }

                                              } else {
                                                $message = "Oder data could not be submitted";
                                                header('Location:../create-contract.php?message='.$message);
                                              }

                                        } else {
                                          $message = "Address insertion failed";
                                          header('Location:../order-creation.php?customerid='.$customerId);
                                        }
                          }
                        }
                }
            }else if ($addressType == 'REFERENCE' || $addressType == 'OFFICE') {
              $selectEmailId = "SELECT * FROM `customerdetails` WHERE `email` = '$email'";// check if the email ID already Existing or not
              $selectEmailIDResult = $conn -> query($selectEmailId);
              if ($selectEmailIDResult->num_rows > 0)  {//If email already exist
                  header('Location:../customer-registration.php?message=User with same mail ID is already registered with us.');
              } else {
                $insertCustomerData = "INSERT INTO `customerdetails`(`firstName`, `lastName`, `phoneNumber`,`email`,`status`, `createdOn`, `lastUpdatedOn`, `PBStatus`, `password`, `salt`, `gender`) VALUES ('$firstname','$lastname','$phone','$email','ACTIVE','$createdOn','$lastUpdatedOn','PUBLISHED','Exelinserv#1','Exelinserv#1','$gender')";
                $insertCustomerDataResult =$conn -> query($insertCustomerData);

                  if ($insertCustomerDataResult) { //If insertion successful
                    $last_id = $conn->insert_id;
                    $getCustomerId = "SELECT * FROM `customerdetails` WHERE `phoneNumber` = '$phone' AND `email` = '$email'";
                    $getCustomerIdResult = $conn -> query($getCustomerId);
                          if ($getCustomerIdResult) { //If phone no and email id exist

                            $last_id = $conn->insert_id;

                                    $customerData = $getCustomerIdResult -> fetch_assoc();
                                      $customerId = $customerData['customerID']; //select customer ID
                                        //insert Address data to address Table

                                        $insertAddressData = "INSERT INTO `address`(`customerID`, `customerName`, `custPhoneNumber`, `tmpPhoneNum`, `tempCusAddress`, `city`, `state`, `country`, `area`, `pinCode`, `addressType`) VALUES ('$customerId','$firstname $lastname','$phone','$temperaryPhNumber','$streetAddress','$city','$state','$country','$area','$pincode','$addressType')";
                                        $insertAddressDataResult = $conn -> query($insertAddressData);
                                        if ($insertAddressDataResult) {
                                          $address_id = $conn ->insert_id;
                                          $selectTempOrderId = "SELECT * FROM `quickorder` WHERE `quikOrderID` = '$quikOrderID'";
                                          $selectTempOrderIdResults = $conn -> query($selectTempOrderId);
                                          if($selectTempOrderIdResults) {
                                              $selectTempOrderIdData = $selectTempOrderIdResults -> fetch_assoc();

                                              $insertOrderData = "INSERT INTO `orders`(`tempOrderID`, `customerID`, `name`, `email`, `vehicleName`, `addressID`, `pickupDateNdTime`, `dropOffDateNdTime`, `orderCreatedOn`, `orderStatus`, `userStatus`, `issue`, `location`, `phone`, `serviceType`, `vehicleType`, `vehicleColor`, `totalPayment`, `advancePayment`, `paymentDue`, `paymentMode`, `deliveryBoy`, `garages`, `lastUpdatedOn`, `fuelVariant`, `kiloMeterReading`, `preferenceService`, `transactionID`) VALUES ('$quikOrderID','$customerId','$firstname $lastname','$email','$vehicleBrand','$address_id','$pickupDate','$dropoffDate','$createdOn','$orderStatus','ACTIVE','$issue','$city','$phone','$serviceType','$vehicleType','$vehicleColor','$totalPayment','$advancedPayment','$paymentDue','$paymentMode','$pickupBoy','$garage','$now','$fuelVariant','$kilomtReading','$preference','$transactionID')";
                                              $insertOrderDataResult = $conn->query($insertOrderData);
                                                if ($insertOrderDataResult){// If Insertion successful
                                                  $last_id = $conn ->insert_id;
                                                  $insertVehicleInfo = "INSERT INTO `vehicleInformations`(`orderID`, `customerID`, `addressID`, `insurance`, `providerName`, `contractNumber`, `purchaseDate`, `expiryDate`, `LDV_IDV`) VALUES ('$last_id','$customerId','$address_id','$insuranceType','$insuranceProvider','$contractNumber','$purchaseDate','$expiryDate','$ldvIdv')";//
                                                  $insertVehicleInfoReults = $conn -> query($insertVehicleInfo);
                                                  if ($insertVehicleInfoReults){
                                                    $deleteTempOrderDetails = "DELETE FROM `quickorder` WHERE `quikOrderID` = '$quikOrderID'";
                                                    $DeletedResult = $conn -> query($deleteTempOrderDetails);
                                                      if ($DeletedResult) {
                                                        $message = "Oder Created Successfully";
                                                        header('Location:../active-bookings.php?message='.$message);
                                                      }else {
                                                        $message = "Oder Creation Failed";
                                                        header('Location:../create-contract.php?message='.$message);
                                                      }

                                                  }else {
                                                    $message = "Vehicle informations insertion  failed";
                                                    header('Location:../create-contract.php?message='.$message);
                                                  }
                                                }else {
                                                  $message = "Order informations insertion  failed";
                                                  header('Location:../create-contract.php?message='.$message);
                                                }

                                              } else {
                                                $message = "Oder data could not be submitted";
                                                header('Location:../create-contract.php?message='.$message);
                                              }
                                          } else {
                                          $message = "Address insertion failed";
                                          header('Location:../order-creation.php?customerid='.$customerId);
                                        }

                              }

                          } else {
                            $message = "Insertion Failed! Please Try Again Later";
                            header('Location:customer-registration.php?message' . $message);
                          }
                  }

          } else {
            header('Location:../create-contract.php?message=Please Fill in all the data.');
        }
}
}
          /*
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
*/
