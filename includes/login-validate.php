<?php
    /*
     * Name : Login Validation
     * Author : Debashis Nayak
     * Company : CoolHax Labs
     * Description : Validates User and allows them to login to the admin panel
     *
     */


    include_once "../includes/db_connect.php"; //DB Connection Script Inclusion
if($conn){
	echo "CONNECTED";
}else {
	echo "NOT_CONNECTED";
}


    if(isset($_SESSION['bazooka'])) { //Check if the session is already set
        header('Location:index.php?message=You are already Logged in.'); // Redirect to dashboard if already logged in
    } else {
        session_start(); //Starting Session

        //Define Variables
        $email = "";
        $password = "";

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
                    $salt = $selectUserInfoData['salt'];
                    $newPassword = md5(md5($password).$salt);
                   if ($passwordDB == $newPassword ) { //Login Successful

                       $_SESSION['bazooka'] = $email;
                       header("Location:../index.php?message= Login Success."); //Redirect to Login page


                   } else { //Login Failed

                       header("Location:../login.php?message= Password Doesn't match. Please try again."); //Redirect to Login page

                   }
                }
            } else { // if email Doesn't Exists

                header("Location:../register.php?message=Email Doesn't exits. Please register"); //Redirect to Registration page

            }

        }

    }

