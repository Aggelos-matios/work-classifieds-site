<?php
    /**
     * @author George Giantsios AEM 3476
     */

    session_start();


    if (isset($_POST["submit-add"])){
        require_once 'dbHandler-inc.php';
        require_once 'functions-inc.php';

        $title = $_POST["add-title"];
        $description = $_POST["add-description"];
        $country = $_POST["add-country"];
        $city = $_POST["add-city"];
        $expertise = $_POST["add-expertise"];
        $occupation = $_POST["add-occupation"];
        $date = date("Y/m/d h:i:sa");
        if (emptyInputAdd($title, $description, $country, $city, $expertise, $occupation) !== false){
            header("location: ../createAdd.php?error=emptyinput");
            exit();
        }

        createAdd($conn, $title, $description, $country, $city, $expertise, $occupation, $date);

    }else{
        header("location: ../createAdd.php");
        exit();
    }