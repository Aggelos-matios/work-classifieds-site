<?php
    /**
     * @author George Giantsios AEM 3476
     */

    if (isset($_POST["submit"])){

        $email = $_POST["email"];
        $pwd = $_POST["password"];
        $verifyPwd = $_POST["verify-password"];
        $username = $_POST["username"];
        $fullName = $_POST["fullname"];
        $date = $_POST["date"];
        $country = $_POST["country"];
        $phoneNumber = $_POST["phone-number"];
        $cv = $_POST["cv"];

        require_once 'dbHandler-inc.php';
        require_once 'functions-inc.php';

        if (emptyInputSignup($username, $email, $pwd, $verifyPwd, $fullName, $date, $country, $phoneNumber, $cv) !== false){
            header("location: ../create-account.php?error=emptyinput");
            exit();
        }
        if (invalidUid($username) !== false){
            header("location: ../create-account.php?error=invaliduid");
            exit();
        }
        if (invalidEmail($email) !== false){
            header("location: ../create-account.php?error=invalidemail");
            exit();
        }
        if (pwdMatch($pwd, $verifyPwd) !== false){
            header("location: ../create-account.php?error=passwordsdontmatch");
            exit();
        }
        if (uidExists($conn ,$username, $email) !== false){
            header("location: ../create-account.php?error=usernametaken"/*&email=".$email*/);
            exit();
        }

        createUser($conn, $username, $email, $pwd, $fullName, $date, $country, $phoneNumber, $cv);
        header("location: ../index.php");


    }else{
        header("location: ../create-account.php");
        exit();
    }
