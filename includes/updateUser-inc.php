<?php
    /**
     * @author George Giantsios AEM 3476
     */

    require_once 'dbHandler-inc.php';
    require_once 'functions-inc.php';

    session_start();

    if (isset($_POST["username-submit"])){
        $username = $_POST["username"];
        if (emptyInputUpdate($username) !== false){
            header("location: ../profile.php?error=emptyinput");
            exit();
        }
        if (invalidUid($username) !== false){
            header("location: ../profile.php?error=invaliduid");
            exit();
        }if (uidExists($conn ,$username, $username) !== false){
            header("location: ../profile.php?error=usernametaken"/*&email=".$email*/);
            exit();
        }

        updateUser($conn, "username", $username);
        //$_SESSION["username"] = $username;

        header("location: logout-inc.php");
        exit();
    }  else if (isset($_POST["email-submit"])){
        $email = $_POST["email"];
        if (emptyInputUpdate($email) !== false){
            header("location: ../profile.php?error=emptyinput");
            exit();
        }
        if (invalidEmail($email) !== false){
            header("location: ../profile.php?error=invalidemail");
            exit();
        }
        if (uidExists($conn ,$email, $email) !== false){
            header("location: ../profile.php?error=emailtaken"/*&email=".$email*/);
            exit();
        }

        updateUser($conn, "email", $email);

        header("location: ../profile.php");
        exit();
    } else if (isset($_POST["password-submit"])){
        $oldPwd = $_POST["old-password"];
        $password = $_POST["password"];
        $verifyPwd = $_POST["verify-password"];
        if (emptyInputUpdate($oldPwd) !== false){
            header("location: ../profile.php?error=emptyinput");
            exit();
        }
        if (emptyInputUpdate($password) !== false){
            header("location: ../profile.php?error=emptyinput");
            exit();
        }
        if (emptyInputUpdate($verifyPwd) !== false){
            header("location: ../profile.php?error=emptyinput");
            exit();
        }
        $user = uidExists($conn, $_SESSION["username"], $_SESSION["username"]);
        $pwdHashed = $user["pwd"];
        $checkPwd = password_verify($oldPwd, $pwdHashed);
        if ($checkPwd === false){
            header("location: ../profile.php?error=wrongpassword");
            exit();
        }

        if (pwdMatch($password, $verifyPwd) !== false){
            header("location: ../profile.php?error=passwordsdontmatch");
            exit();
        }

        //Hashing the password
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        updateUser($conn, "pwd", $hashedPwd);

        header("location: ../profile.php");
        exit();
    }else if (isset($_POST["fullname-submit"])){
        $name = $_POST["fullname"];
        if (emptyInputUpdate($name) !== false){
            header("location: ../profile.php?error=emptyinput");
            exit();
        }

        updateUser($conn, "name", $name);

        header("location: ../profile.php");
        exit();
    }else if (isset($_POST["date-submit"])){
        $date = $_POST["date"];
        if (emptyInputUpdate($date) !== false){
            header("location: ../profile.php?error=emptyinput");
            exit();
        }

        updateUser($conn, "date", $date);

        header("location: ../profile.php");
        exit();
    }else if (isset($_POST["country-submit"])){
        $country = $_POST["country"];
        if (emptyInputUpdate($country) !== false){
            header("location: ../profile.php?error=emptyinput");
            exit();
        }

        updateUser($conn, "country", $country);

        header("location: ../profile.php");
        exit();
    }else if (isset($_POST["phone-number-submit"])){
        $phone = $_POST["phone-number"];
        if (emptyInputUpdate($phone) !== false){
            header("location: ../profile.php?error=emptyinput");
            exit();
        }

        updateUser($conn, "phoneNumber", $phone);

        header("location: ../profile.php");
        exit();
    }else if (isset($_POST["cv-submit"])){
        $cv = $_POST["cv"];
        if (emptyInputUpdate($cv) !== false){
            header("location: ../profile.php?error=emptyinput");
            exit();
        }

        updateUser($conn, "cv", $cv);

        header("location: ../profile.php");
        exit();
    }