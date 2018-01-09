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
                    <th>UpdatedOn</th>
                    <th>Create Oder</th>

                  </tr>
                </thead>
                <!--<tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </tfoot>-->
                <tbody>
                  <?php
                  if($selectAllCustomersResults) { // if Executed
                      while ($selectAllCustomersData = $selectAllCustomersResults -> fetch_assoc()) {
                  ?>
                  <!--<tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                  </tr>-->
                  <tr>
                    <td>EXCU<?=$selectAllCustomersData['customerID'];?></td>
                    <td><?=$selectAllCustomersData['firstName'];?> <?=$selectAllCustomersData['lastName'];?></td>
                    <td><?=$selectAllCustomersData['phoneNumber'];?></td>
                    <td><a href="mailto:<?=$selectAllCustomersData['email'];?>" target="_blank"><?=$selectAllCustomersData['email'];?></a></td>
                    <td><?=$selectAllCustomersData['createdOn'];?></td>
                    <td><?=$selectAllCustomersData['lastUpdatedOn'];?></td>
                    <td><a href="createContract.php?customerId=<?=$selectAllCustomersData['customerID'];?>"><input type="button" class="btn btn-success" value="Ceate Contract"></a></td>
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
