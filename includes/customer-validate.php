<?php

    include_once "../includes/db_connect.php"; //DB Connection Script Inclusion
    date_default_timezone_set('Asia/Kolkata');

    if(isset($_SESSION['bazooka'])) { //Check if the session is already set

        header('Location:../admin-dashboard.php?message=You are already Logged in.'); // Redirect to dashboard if already logged in
    } else {
        session_start();

        //Define Variables & Get data from POST method and update variables
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $phone = $_POST['phone'];
        //"91".$phone;phone
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['radio1'];
        $now =  date('d-m-Y H:i');
        $createdOn = $now;
        $lastUpdatedOn = $now;
        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $pincode = $_POST['pincode'];
        $addressType = $_POST['addressType'];
        $streetAddress = $_POST['streetAddress'];
        $temperaryPhNumber = $_POST['temphone'];
        $area = $_POST['area'];


        if (!empty($_POST)){
          echo $addressType;
          $phone = "91".$phone;
          $temperaryPhNumber = "91".$temperaryPhNumber;
          if ($addressType == 'SELF'){
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

                                        $insertAddressData = "INSERT INTO `address`(`customerID`, `customerName`, `custPhoneNumber`, `streetAddress`, `city`, `state`,`country`, `area`, `pinCode`, `addressType`) VALUES ('$customerId','$firstname $lastname','$phone','$streetAddress','$city','$state','$country','$area','$pincode','$addressType')";
                                        $insertAddressDataResult = $conn -> query($insertAddressData);
                                        if ($insertAddressDataResult) {
                                          $message = "Customer registered successfully";
                                          header('Location:../order-creation.php?customerid='.$customerId);
                                        } else {
                                          $message = "Registration failed";
                                          header('Location:../order-creation.php?customerid='.$customerId);
                                        }
                          }
                        } else {
                          $message = "Insertion Failed! Please Try Again Later";
                          header('Location:customer-registration.php?message' . $message);
                        }

                }
            }else if ($addressType == 'REFERENCE') {
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

                                        $insertAddressData = "INSERT INTO `address`(`customerID`, `customerName`, `custPhoneNumber`, `tmpPhoneNum`, `tempCusAddress`, `city`, `state`, `area`, `pinCode`, `addressType`) VALUES ('$customerId','$firstname $lastname','$phone','$temperaryPhNumber','$streetAddress','$city','$state','$area','$pincode','$addressType')";
                                        $insertAddressDataResult = $conn -> query($insertAddressData);
                                        if ($insertAddressDataResult) {
                                          $message = "Customer registered successfully";
                                          header('Location:../order-creation.php?customerid='.$customerId);
                                        } else {
                                          $message = "Registration failed";
                                          header('Location:../order-creation.php?customerid='.$customerId);
                                        }

                              }

                          } else {
                            $message = "Insertion Failed! Please Try Again Later";
                            header('Location:customer-registration.php?message' . $message);
                          }
                  }

          } else {
            header('Location:../customer-registration.php?message=Please Fill in all the data.');
        }
}
}
