<?php

//Setting header type
header("Content-Type: application/json");

//Disabling all errors
error_reporting( 0);

//Initializing Session for better security
session_start();

//Including necessary callbacks
include 'db_connect.php';

    $country = $_GET['country'];
      if($country){

          $selectState = "SELECT * FROM state WHERE countryID = '$country'";
          $executeSelectStateQuery = $conn -> query ($selectState);
          while($getStateInfo = $executeSelectStateQuery -> fetch_assoc()){

              $stateInfoArray[] = array("stateID" => $getStateInfo['stateID'], "stateName" => $getStateInfo['stateName']);

          }

          echo json_encode($stateInfoArray,JSON_PRETTY_PRINT);

      }else{

        //Get State ID Now for choosing cityInfo
        $state = $_GET['state'];

          if($state){

            $selectCity = "SELECT * FROM city WHERE stateID = '$state'";
            $executeSelectCityQuery = $conn -> query ($selectCity);
            while($getCityInfo = $executeSelectCityQuery -> fetch_assoc()){

                $cityInfoArray[] = array("cityID" => $getCityInfo['cityID'], "cityName" => $getCityInfo['cityName']);

            }

            echo json_encode($cityInfoArray,JSON_PRETTY_PRINT);

          }

      }
