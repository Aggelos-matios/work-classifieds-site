<?php
session_start();

require_once 'includes/dbHandler-inc.php';
require_once 'includes/functions-inc.php';

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image" href="images/logo.png">
    <script src="https://kit.fontawesome.com/d2d45c5ac5.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="profile.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" type="text/css" href="navigation.css">
    <link rel="stylesheet" type="text/css" href="about.css">
    <link rel="stylesheet" type="text/css" href="adds.css">
    <link rel="stylesheet" type="text/css" href="contact-style.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="navigation.css">

    <script src="navigation.js" async></script>
    <script src="index.js" async></script>
    <script src="profile.js" async> </script>
    <title>JobsOnline</title>

</head>
<body>

<!--<div id="myNav" class="mobile-nav">
  <a href="javascript:void(0)" class="X-btn" onclick="closeNav()">&times;</a>
  <div class="mobile-nav-content">
    <a href="index.php">Home</a>
    <a href="adds.php">Jobs</a>
    <a href="profile.php">Profile</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
      <a href="includes/logout-inc.php">Logout</a>
  </div>
</div>-->

<div class="navigation">
    <div>
        <a href="index.php">Home</a>
        <a href="adds.php">Jobs</a>
        <a class="active" href="profile.php">Profile</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
        <a href="includes/logout-inc.php">Logout</a>
    </div>
</div>
<!--<div class="dropdown">
  <i onclick="dropFunction()" class="fas fa-user-circle"></i>
  <div id="drop" class="dropdown-content">
    <a href="#">Profile</a>
    <a href="#">settings</a>
    <a href="#">Logout</a>
  </div>
</div>
</div>-->