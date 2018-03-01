<?php
    /*
     * Name : Login Validation
     * Author :
     * Company :
     * Description :
     *
     */


    include_once "../includes/db_connect.php"; //DB Connection Script Inclusion

    //Declaration of Variables
    $email = "";
    $password = "";
    $message = "";

    if(isset($_SESSION['bazooka'])) { //Check if the session is already set
        header('Location:index.php?message=You are already Logged in.'); // Redirect to dashboard if already logged in
    } else {
        session_start(); //Starting Session

        //Get data from POST method and update variables
        if(isset($_POST['email'])) { //get Username
            $email = $_POST['email'];
        } else {
            $email = "";
        }

        if(isset($_POST['password'])) { //get Password
            $password = $_POST['password'];
        } else {
            $password = "";
        }

        if($email != "" && $password != "") { //check if the username and password is not blank
            //Get Salt
            $selectUserInfo = "SELECT * FROM `users` WHERE `email` = '$email'";
            $selectUserInfoResult = $conn -> query ($selectUserInfo);

            if ($selectUserInfoResult -> num_rows > 0) { // if email Exists

                // output data of each row
                while ($selectUserInfoData = $selectUserInfoResult->fetch_assoc()) {

                    $passwordDB = $selectUserInfoData['password'];
                    $email = $selectUserInfoData['email'];

                   if ($passwordDB !="" && $email !="") { //Login Successful

                       $_SESSION['bazooka'] = $email;
                       $_SESSION['login_status'] = 1;
                       $message= "Login Success.";
                       header("Location:../admin-dashboard.php"); //Redirect to Admin Dashboard


                   } else { //Login Failed

                       header("Location:../index.php"); //Redirect to Login page
                       $message="Password Doesn't match. Please try again.";

                   }
                }

            }else{ // if email Doesn't Exists

                header("Location:../index.php"); //Redirect to Authentication page
                $message="Email Doesn't exits. Please register";

            }

        }

    }
