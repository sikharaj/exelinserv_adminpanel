<?php

    include_once "../plugins/db_connect.php"; //DB Connection Script Inclusion
    if(isset($_SESSION['bazooka'])) { //Check if the session is already set

        header('Location:../index.php?message=You are already Logged in.'); // Redirect to dashboard if already logged in
    } else {
        session_start();

        //Define Variables
        $email = "";
        $password = "";
        $userName = "";

        //Get data from POST method and update variables
        if (isset($_POST['email'])){ //get Username

            $email = $_POST['email'];

        } else {
			
            $email ="";
        }

        if (isset($_POST['password'])){ //get Password

            $password = $_POST['password'];

        } else {

            $password = "";

        }
		
        if (isset($_POST['username'])) { //get Username

            $username = $_POST['username'];

        } else {

            $username = "";

        }

        if ($email != "" && $password != "" && $username != "") { //check if the fields are not blank

            $selectEmailId = "SELECT * FROM `users` WHERE `email` = '$email'";// check if the email ID already Existing or not
            $selectEmailIDResult = $conn->query($selectEmailId);
            if ($selectEmailIDResult->num_rows > 0)
            {
                header('Location:../register.php?message=User with same mail ID is already registered with us. Try Logging in.');
            }
            else
            {
                $salt = md5(uniqid());
                $newPassword = md5(md5($password) . $salt);
               // $insertUserData = "INSERT INTO `users`(`firstName`, `lastName`, `email`, `status`, `password`, `salt`) VALUES ('$firstName','$lastName','$email','Unverified','$newPassword','$salt')";
                $insertUserDataResult =$conn -> query($insertUserData);

                if ($insertUserDataResult){//echo "Insertion Successful";
                  
                    $message = "Registered Successfully";
                    header('Location:../login.php?message=' . $message);
                }
                /* else
                 {
                         $message = "Insertion Failed! Please Try Again Later";
                         header('Location:register.php?message' . $message);
                 }*/

            }


        }
        else
        {
            header('Location:../register.php?message=Please Fill in all the data.');
        }
    }