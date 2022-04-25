<?php
    $hostURL = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "v-cerf";
    $conn = mysqli_connect($hostURL, $dbUsername, $dbPassword, $dbName);
        
    if(mysqli_connect_errno())
    {
        echo "Connection Failed".mysqli_connect_error();
    }
    else{
        //echo "Connection Successful";
    }
?>
