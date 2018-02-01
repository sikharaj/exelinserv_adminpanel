<?php

    /*
     * Name : DB Connect
     * Author : Sikha Raj
     * Company : CoolHax Labs
     * Description : Connects to DB using DB Credentials
     *
     */

    include_once "database-details.php";

    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
?>
