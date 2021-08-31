<?php

require "db.inc.php";

$starRateV = $_REQUEST['starRate'];
$rateDate=$_REQUEST['date'];
$raterName = $_REQUEST['name'];
$rateMsg = $_REQUEST['rateMsg'];

//Setting up Variable for inserting
$sql = "INSERT INTO rate (starRate,rateDate,rateName,rateMsg) VALUES ('$starRateV', '$rateDate', '$raterName','$rateMsg')";

    //INSERTS OR DIE
    if(mysqli_query($conn, $sql))
    {
        echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";
        echo "Success! We accepted your review into are system";
    } else {
        echo "Error: Please Try Again";
    }

    //close connection
    mysqli_close($conn);

    //Goes to thank you.html

 ?>
