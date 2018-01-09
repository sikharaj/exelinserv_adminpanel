<?php

    include_once "../includes/db_connect.php"; //DB Connection Script Inclusion
    date_default_timezone_set('Asia/Kolkata');

    if(isset($_SESSION['bazooka'])) { //Check if the session is already set

        header('Location:../admin-dashboard.php?message=You are already Logged in.'); // Redirect to dashboard if already logged in
    } else {
        session_start();

        //Define Variables
        $firstname = "";
        $lastname = "";
        $phone = "91".$phone;
        $email = "";
        $password = "";
        $gender = "";
        $now =  date('d-m-Y H:i');
        $createdOn = $now;
        $lastUpdatedOn = $now;

        //Get data from POST method and update variables
        if (isset($_POST['email'])){ //get Username

            $email = $_POST['email'];

        } else {

            $email ="";
        }

        if (isset($_POST['phone'])){ //get Username

            $phone = $_POST['phone'];

        } else {

            $phone ="";
        }

        if (isset($_POST['password'])){ //get Password

            $password = $_POST['password'];

        } else {

            $password = "";

        }

        if (isset($_POST['firstName'])) { //get Username

            $firstname = $_POST['firstName'];

        } else {

            $firstname = "";

        }

        if (isset($_POST['lastName'])) { //get Username

            $lastname = $_POST['lastName'];

        } else {

            $lastname = "";

        }

        if (isset($_POST['radio1'])) { //get Username

            $gender = $_POST['radio1'];

        } else {

            $gender = "";

        }



        if ($email != "" && $password !="" && $firstname != "" && $lastname !="" && $phone !="" && $gender !="") { //check if the fields are not blank

            $selectEmailId = "SELECT * FROM `customerdetails` WHERE `email` = '$email'";// check if the email ID already Existing or not
            $selectEmailIDResult = $conn->query($selectEmailId);
            if ($selectEmailIDResult->num_rows > 0)  {//If email already exist
                header('Location:../customer-registration.php?message=User with same mail ID is already registered with us.');
            } else  {
              //  $salt = md5(uniqid());
              //  $newPassword = md5(md5($password) . $salt);
                $insertCustomerData = "INSERT INTO `customerdetails`(`firstName`, `lastName`, `phoneNumber`,`email`,`status`, `createdOn`, `lastUpdatedOn`, `PBStatus`, `password`, `salt`) VALUES ('$firstname','$lastname','$phone','$email','INACTIVE','$createdOn','$lastUpdatedOn','PUBLISHED','Exelinserv#1','Exelinserv#1')";
                $insertCustomerDataResult =$conn -> query($insertCustomerData);

                  if ($insertCustomerDataResult){//If Insertion Successful;
                      $last_id = $conn->insert_id;
                      if(strlen($phone)==10) {
                          $phone="91".$phone;
                      }

                              $message = "Greetings from Exelinserv.Thank you for registered with us $firstname! Welcome onboard, we are looking forward to serve you.You may login with us by your username : $email and password : Exelinserv#1";
                              $encodedMessage = urlencode($message);

                              $response = file_get_contents('https://control.msg91.com/api/sendhttp.php?authkey=165253Ajtf4e50P59687f4a&mobiles='.$phone.'&message='.$encodedMessage.'&sender=EXLSRV&route=4&country=91');

                              $message = "Customer registered successfully";
                              header('Location:../customer-registered.php?customerid='.$last_id);
                  }  else {

                       $message = "Insertion Failed! Please Try Again Later";
                       header('Location:customer-registration.php?message' . $message);

                  }

            }


        }  else {

            header('Location:../customer-registration.php?message=Please Fill in all the data.');

        }
    }
