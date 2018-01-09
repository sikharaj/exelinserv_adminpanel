<?php
    //$selectAllCustomers = "SELECT * FROM `customers` WHERE  `PBstatus` = 'Published'";
    $selectAllCustomers = "SELECT * FROM `customers` ORDER BY userID ASC";
    $selectAllCustomersResults = $conn -> query($selectAllCustomers);
?>

<div class="row row-xl">
    <!-- Begin Table Fixed Header -->
    <div class="col-md-12">
        <!-- Begin Panel -->
        <div class="panel-x panel-transparent">
            <!-- Begin Panel Body -->
            <div class="panel-body">
                <p class="header text-uppercase">All Customers</p>

                <table id="datatable-fixedheader" class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>PB Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($selectAllCustomersResults) { // if Executed
                        while ($selectAllCustomersData = $selectAllCustomersResults -> fetch_assoc()) {
                    ?>
                            <tr>
                                <td>EXCU<?=$selectAllCustomersData['userID'];?></td>
                                <td><?=$selectAllCustomersData['firstName']." ".$selectAllCustomersData['lastName'];?></td>
                                <td><?=$selectAllCustomersData['phoneNumber'];?></td>
                                <td><a href="mailto:<?=$selectAllCustomersData['email'];?>" target="_blank"><?=$selectAllCustomersData['email'];?></a></td>
                                <td><?=$selectAllCustomersData['status'];?></td>
                                <td><?=$selectAllCustomersData['PBstatus'];?></td>
                                <td><a href="editCustomer.php?userId=<?=$selectAllCustomersData['userID'];?>">Edit</a></td>
                                <td><a href="deleteUser.php?userId=<?=$selectAllCustomersData['userID'];?>">Delete</a></td>
                            </tr>
                    <?php
                        }
                    } else { //if didn't execute
                        echo "Unable to process Please try again later";
                    }
                    ?>
                    </tbody>
                </table>
                <!-- ENd Datatable Fixed Header -->
            </div>
            <!-- End Panel Body -->
        </div>
        <!-- End Panel -->
    </div>
    <!-- End Table Tools -->
</div>
<!-- End Row -->
