<?php
    /**
     * @author George Giantsios AEM 3476
     */

    if (isset($_POST["submit"])){

        $username = $_POST["name"];
        $pwd = $_POST["password"];

        require_once 'dbHandler-inc.php';
        require_once 'functions-inc.php';

        if (emptyInputLogin($username, $pwd) !== false){
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        loginUser($conn, $username, $pwd);
    }else{
        header("location: ../index.php");
        exit();
    }