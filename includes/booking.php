<?php
if(isset($_POST['bookigFor'])){
  if ($_POST['bookigFor'] == 'SELF' || $_POST['bookigFor'] == ""){

         $electAddressData = mysqli_query($conn,"SELECT * FROM `address` where ``");
         $electAddressDataResult = $conn -> query($electAddressData);
         if($electAddressDataResult){
           $electData = $selectAdminDataResult->fetch_assoc();
          echo $custPhone = $electData['custPhoneNumber'];
          echo $streeAdd = $electData['streetAddress'];
          echo $temPhone = $electData['tmpPhoneNum'];
          echo $temAdd = $electData['tempCusAddress'];
         }
       }

?>
