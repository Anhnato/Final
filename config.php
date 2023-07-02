<?php

    //https://supportindeed.com/phpMyAdmin/signon.php?action=logout
    $servername = "fdb1029.awardspace.net";
    $username = "4324781_huyanh";
    $database = "4324781_huyanh";
    $password = "huyanh123";

    //create connection
    $conn = new mysqli($servername, $username, $password, $database);

    //check connection
    if ($conn->connect_error){
        error_log("database.php::Failed to connect to database: " . $conn->connect_error);
        die("connection failed: " . $conn->connect_error);
    } else {
        error_log("database.php::Connected to the database");
    }

?>