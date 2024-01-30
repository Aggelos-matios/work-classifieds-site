<?php
    /**
     * @author George Giantsios AEM 3476
     */

    $dbServerName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "website_database";

    $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
