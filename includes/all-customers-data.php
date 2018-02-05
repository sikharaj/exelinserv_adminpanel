<?php
    //$selectAllCustomers = "SELECT * FROM `customers` WHERE  `PBstatus` = 'Published'";
    $selectAllCustomers = "SELECT * FROM `customerdetails` ORDER BY customerID ASC";
    $selectAllCustomersResults = $conn -> query($selectAllCustomers);
?>
<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="table-wrap">
            <div class="table-responsive">
              <table id="example" class="table table-hover display  pb-30" >
                <thead>
                  <tr>
                    <th>Cust_ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>createdOn</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  if($selectAllCustomersResults) { // if Executed
                      while ($selectAllCustomersData = $selectAllCustomersResults -> fetch_assoc()) {
                  ?>
                  <tr>
                    <td style="color:black;">EXCU<?=$selectAllCustomersData['customerID'];?></td>
                    <td style="color:black;"><?=$selectAllCustomersData['firstName'];?> <?=$selectAllCustomersData['lastName'];?></td>
                    <td style="color:black;"><?=$selectAllCustomersData['phoneNumber'];?></td>
                    <td style="color:black;"><a href="mailto:<?=$selectAllCustomersData['email'];?>" target="_blank"><?=$selectAllCustomersData['email'];?></a></td>
                    <td style="color:black;"><?=$selectAllCustomersData['createdOn'];?></td>
                    <td style="color:black;"><a href="create-registered-customers-order.php?customerId=<?=$selectAllCustomersData['customerID'];?>"><input type="button" class="btn btn-success" value="Create Oder"></a></td>
                  </tr>
                  <?php
                      }
                  } else { //if didn't execute
                      echo "Unable to process Please try again later";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Row -->
</div>
