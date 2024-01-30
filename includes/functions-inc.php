<?php
    /**
     * @author George Giantsios AEM 3476
     */

    //returns true if there is an empty input and false otherwise
    function emptyInputSignup($username, $email, $pwd, $verifyPwd, $fullName, $date, $country, $phoneNumber, $cv){
        if (empty($username) || empty($email) || empty($pwd) || empty($verifyPwd) || empty($fullName) || empty($date) || empty($country) || empty($phoneNumber) || empty($cv) ){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    //returns true if the username is invalid and false otherwise
    function invalidUid($username){
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    //returns true if the email is invalid and false otherwise
    function invalidEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    //returns true if the passwords doesn't match is invalid and false otherwise
    function pwdMatch($pwd, $verifyPwd){
        if ($pwd !== $verifyPwd){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    //returns true if the uid exists and false otherwise
    function uidExists($conn, $username, $email){
        $query = "SELECT * FROM users WHERE username = ? OR email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)){
            header("location: ../create-account.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)){
            mysqli_stmt_close($stmt);
            return $row;
        }else{
            mysqli_stmt_close($stmt);
            return false;
        }
        /*if (!userExists($username, $email)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;*/
    }

    //Adds a user to the database
    function createUser($conn, $username, $email, $pwd, $fullName, $date, $country, $phoneNumber, $cv){
        $query = "INSERT INTO users (username, email, pwd, name, date, country, phoneNumber, cv) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)){
            header("location: ../create-account.php?error=stmtfailed");
            exit();
        }

        //Hashing the password
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssssssss", $username, $email, $hashedPwd, $fullName, $date, $country, $phoneNumber, $cv);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../index.php");
        exit();
    }

    //returns true if there is an empty input and false otherwise
    function emptyInputLogin($username, $pwd){
        if (empty($username)  || empty($pwd)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    //if the user exists and the password is correct it starts the session
    function loginUser($conn, $username, $pwd){
        $user = uidExists($conn, $username, $username);

        if ($user == null){
            header("location: ../index.php?error=userdoesntexist");
            exit();
        }

        $pwdHashed = $user["pwd"];
        $checkPwd = password_verify($pwd, $pwdHashed);

        if ($checkPwd === false){
            header("location: ../index.php?error=wrongpassword");
            exit();
        }else {
            session_start();
            $_SESSION["userid"] = $user["_id"];
            $_SESSION["username"] = $user["username"];
            header("location: ../index.php");
            exit();
        }
    }

    //returns true if the input is empty and false otherwise
    function emptyInputUpdate($value){
        if (empty($value)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    //Updates a specific column in the database
    function updateUser($conn, $column, $value){
        $query = "UPDATE users SET " . $column . " = ? WHERE _id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)){
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "si", $value, $_SESSION["userid"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    //returns true if there is an empty input and false otherwise
    function emptyInputAdd($title, $description, $country, $city, $expertise, $occupation){
        if (empty($title) || empty($description) || empty($country) || empty($city) || empty($expertise) || empty($occupation)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    //Creates a new add in the database
    function createAdd($conn, $title, $description, $country, $city, $expertise, $occupation, $date){
        session_start();
        $query = "INSERT INTO adds (user_id, title, description, country, city, expertise, occupation, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)){
            header("location: ../createAdd.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "isssssss", $_SESSION["userid"], $title, $description, $country, $city, $expertise, $occupation, $date);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../adds.php");
        exit();
    }

    //Returns the values of the table cities
    function getCities($conn){
        $query = "SELECT * FROM cities;";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck <= 0){
            header("location: ../adds.php?error=noaddsindatabase");
            exit();
        }
        return $result;
    }

    //Returns the values of the table countries
    function getCountries($conn){
        $query = "SELECT * FROM countries;";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck <= 0){
            header("location: ../adds.php?error=noaddsindatabase");
            exit();
        }
        return $result;
    }

    //Returns the values of the table expertises
    function getExpertises($conn){
        $query = "SELECT * FROM expertises;";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck <= 0){
            header("location: ../adds.php?error=noaddsindatabase");
            exit();
        }
        return $result;
    }

    //Returns all of the adds from the table
    function getAdds($conn){
        $query = "SELECT * FROM adds;";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 0){
            header("location: ../adds.php?error=noaddsindatabase");
            exit();
        }
        return $result;
    }

    //Returns all of the adds according to filters
    function getAddsByFilter($conn, $countries , $cities , $expertises, $occupations){
        $countries_imploded = implode(",", $countries);
        $cities_imploded = implode(",", $cities);
        $expertises_imploded = implode(",", $expertises);
        $occupations_imploded = implode(",", $occupations);
        $query = "SELECT * FROM adds WHERE country IN ('".$countries_imploded."') 
        OR city IN ('".$cities_imploded."') 
        OR expertise IN ('".$expertises_imploded."') 
        OR occupation IN ('".$occupations_imploded."');";
        $gg = [];
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            $gg = $result->fetch_all(PDO::FETCH_ASSOC);
        }
        return $gg;
    }

    //Returns an add with the given id if it exists
    function getAddByid($conn, $id){
        $query = "SELECT * FROM adds WHERE _id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)){
            header("location: ../create-add.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)){
            mysqli_stmt_close($stmt);
            return $row;
        }else{
            mysqli_stmt_close($stmt);
            return false;
        }
    }

    //Updates a specific column in the database
    function updateAdd($conn, $_id, $title, $description, $country, $city, $expertise, $occupation, $date){
        $query = "UPDATE adds SET title = ?, description = ?, country = ?, city = ?, expertise = ?, occupation = ?, date = ? WHERE _id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)){
            header("location: ../add.php?id=" . $_id . "?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sssssssi", $title, $description, $country, $city, $expertise, $occupation, $date, $_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../add.php?id=" . $_id . "?error=none");
        exit();
    }


    /*//Returns all of the adds that have the same city value as the array cities
    function getAddsByCity($conn, $cities){
        $cities_imploded = implode(",", $cities);
        $query = "SELECT * FROM adds WHERE city IN ('".$cities_imploded."');";
        $gg = [];
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            $gg = $result->fetch_all(PDO::FETCH_ASSOC);
        }
        return $gg;
    }

    //Returns all of the adds that have the same country value as the array countries
    function getAddsByCountry($conn, $country){
        $countries_imploded = implode(",", $country);
        $query = "SELECT * FROM adds WHERE country IN ('".$countries_imploded."');";
        $gg = [];
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            $gg = $result->fetch_all(PDO::FETCH_ASSOC);
        }
        return $gg;
    }

    //Returns all of the adds that have the same expertise value as the array expertises
    function getAddsByExpertise($conn, $expertises){
        $expertises_imploded = implode(",", $expertises);
        $query = "SELECT * FROM adds WHERE expertise IN ('".$expertises_imploded."');";
        $gg = [];
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            $gg = $result->fetch_all(PDO::FETCH_ASSOC);
        }
        return $gg;
    }
     */



