<?php

error_reporting(0);
session_start();

// print_r($_GET);
print_r($_POST);
exit;

header('Content-Type: application/json');
date_default_timezone_set('Asia/Kolkata');

include_once "db_connect.php"; //DB Connection Script Inclusion

$fieldExecutiveID = $_POST['executiveID'];
$generatedOTP = mt_rand(111111, 999999);
$lastUpdatedOn = date('d-m-Y H:i');;
$responseArray = array();

//DATA LIST FOR Garage
echo $garageName = $_GET['garageName'];

if($requestType == 'GENERATE OTP'){

  if($fieldExecutiveID){

    $getExecutiveDetails = $conn -> query("SELECT * FROM `field_executive_report` WHERE `executive_ID`=$fieldExecutiveID");
    $getExecutiveData = $getExecutiveDetails -> fetch_assoc();
    $executiveName = $getExecutiveData['executive_name'];
    $phoneNumber = 9937762929; //$getExecutiveData['executive_number']
    $fieldExecutiveOTP = $conn -> query("UPDATE `field_executive_report` SET `otp_verification` = $generatedOTP, `lastUpdatedOn` = $lastUpdatedOn WHERE `executive_ID` = $fieldExecutiveID");
    $message="Thank you $executiveName for enrolling $garageName. Your authenitcation code is : $generatedOTP. Use this to verify enrollment.";
    $sendExecutiveOTP = file_get_contents('https://control.msg91.com/api/sendhttp.php?authkey=165253Ajtf4e50P59687f4a&mobiles='.$phoneNumber.'&message='.$message.'&sender=EXLSRV&route=4&country=91');

    if($sendExecutiveOTP){
      $fieldExecutiveOTP = $conn -> query("UPDATE `field_executive_report` SET `otp_verification` = 0 WHERE `executive_ID` = $fieldExecutiveID");
      $responseArray = array('response' => 'SUCCESS' , 'message' => 'Authentication code sent Successfully');

    }else {

      $responseArray = array('response' => 'NOT SENT' , 'message' => 'Unable to send Authentication code.');

    }

  }else{

    $responseArray = array('response' => 'NO EXECUTIVE ID' , 'message' => 'Please select executive first.');

  }

}else if ($requestType== 'VERIFY OTP' && !empty($fieldExecutiveID)){

    $responseArray = array('response' => 'ERROR', 'message' => 'No Valid Parameters Passed.');

}

echo json_encode($responseArray,JSON_PRETTY_PRINT);
