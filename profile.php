<?php
    session_start();

    require_once 'includes/dbHandler-inc.php';
    require_once 'includes/functions-inc.php';

    if (!isset($_SESSION["userid"])){
        header("location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image" href="images/logo.png">
  <link rel="stylesheet" type="text/css" href="profile.css">
  <script src="https://kit.fontawesome.com/d2d45c5ac5.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="footer.css">
  <link rel="stylesheet" type="text/css" href="navigation.css">
  <script src="navigation.js" async></script>
  <script src="profile.js" async> </script>
  <title>JobsOnline-Profile</title>

</head>
<body>

    <!------------Navigation for small screens-------->
    <div id="myNav" class="mobile-nav">
        <a href="javascript:void(0)" class="X-btn" onclick="closeNav()">&times;</a>
        <div class="mobile-nav-content"><hr>
            <a href="index.php">Home</a>
            <a href="adds.php">Jobs</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a><hr>
            <?php
            if (isset($_SESSION["userid"])){
                echo "<a href=profile.php>Profile</a>";
                echo "<a href=includes/logout-inc.php>Logout</a><hr>";
            }
            ?>
        </div>
    </div>

    <!-----------------General Navigation----------------->
    <div class="bg1">
        <div class="navigation">
            <i class="fas fa-bars" onclick="openNav()"></i>
            <div class="nav-btn">
                <a href="index.php">Home</a>
                <a href="adds.php">Jobs</a>
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
            </div>
            <div class="dropdown">
                <img src="images/account.png" alt="Account" width="25" height="25">
                <?php
                if (isset($_SESSION["userid"])){
                    echo "<div class=dropdown-content>
                                <a href=profile.php>Profile</a>
                                <a href=includes/logout-inc.php>Logout</a>
                            </div>";
                }else{
                    echo "<div class=dropdown-content>
                                <form action=includes/login-inc.php method=post>
                                <input class=nav-input type=text name=name placeholder=Username/Email>
                                <input class=nav-input type=password name=password placeholder=Password>
                                <button class=nav-login-btn type=submit name=submit>Sign in</button>
                            </form>
                            <a href=create-account.php class=singup>Sign up</a>
                            </div>";
                }
                ?>
            </div>
        </div>
    </div>

    <div class="profile-header">
      <img class="profile-image" src="images/profile.png" alt="placeholder">
    </div>

    <div class="profile-info-div">
      <div class="profile-box">
          <?php
            $user = uidExists($conn, $_SESSION["username"], $_SESSION["username"]);
          ?>
          <form action="includes/updateUser-inc.php" method="post">
              <label for="username" class="profile-info-templates">Username :</label>
              <input readonly type="text" id="username" name="username" value="<?php echo $user["username"]?>" class="profile-info profile-info-js">
              <button type="button" name="username-edit" class="btn-edit edit-button-js">Edit</button>
              <button style="display: none" type="submit" name="username-submit" class="btn-cancel-submit submit-button-js">Submit</button>
              <button style="display: none" type="button" name="username-cancel" class="btn-cancel-submit cancel-button-js">Cancel</button>
          </form>
        <form action="includes/updateUser-inc.php" method="post">
          <label for="email" class="profile-info-templates">Email :</label>
          <input readonly type="email" id="email" name="email" value="<?php echo $user["email"]?>" class="profile-info profile-info-js">
          <button type="button" name="email-edit" class="btn-edit edit-button-js">Edit</button>
          <button style="display: none" type="submit" name="email-submit" class="btn-cancel-submit submit-button-js">Submit</button>
          <button style="display: none" type="button" name="email-cancel" class="btn-cancel-submit cancel-button-js">Cancel</button>
        </form>
          <form action="includes/updateUser-inc.php" method="post">
            <div id="old-password-div" style="display: none">
              <label for="old-password" class="profile-info-templates">Old password :</label>
              <input type="password" id="old-password" name="old-password" class="profile-info">
            </div>
            <div>
              <label id="label-password" for="password" class="profile-info-templates">Password :</label>
              <input readonly type="password" id="password" name="password" value="<?php echo $user["pwd"]?>" class="profile-info profile-info-js">
              <button type="button" name="password-edit" class="btn-edit edit-button-js">Edit</button>
              <button style="display: none" type="submit" name="password-submit" class="btn-cancel-submit submit-button-js">Submit</button>
              <button style="display: none" type="button" name="password-cancel" class="btn-cancel-submit cancel-button-js">Cancel</button>
            </div>
            <div id="verify-password-div" style="display: none">
              <label for="verify-password" class="profile-info-templates">Verify password :</label>
              <input  type="password" id="verify-password" name="verify-password" class="profile-info">
            </div>
          </form>
        <form action="includes/updateUser-inc.php" method="post">
          <label for="fullname" class="profile-info-templates">Name :</label>
          <input readonly type="text" id="fullname" name="fullname" value="<?php echo $user["name"]?>" class="profile-info profile-info-js">
          <button type="button" name="fullname-edit" class="btn-edit edit-button-js">Edit</button>
          <button style="display: none" type="submit" name="fullname-submit" class="btn-cancel-submit submit-button-js">Submit</button>
          <button style="display: none" type="button" name="fullname-cancel" class="btn-cancel-submit cancel-button-js">Cancel</button>
        </form>
        <form action="includes/updateUser-inc.php" method="post">
          <label for="date" class="profile-info-templates">Birth :</label>
          <input readonly type="date" id="date" name="date" value="<?php echo $user["date"]?>" class="profile-info profile-info-js">
          <button type="button" name="date-edit" class="btn-edit edit-button-js">Edit</button>
          <button style="display: none" type="submit" name="date-submit" class="btn-cancel-submit submit-button-js">Submit</button>
          <button style="display: none" type="button" name="date-cancel" class="btn-cancel-submit cancel-button-js">Cancel</button>
        </form>
        <form action="includes/updateUser-inc.php" method="post">
          <label for="country" class="profile-info-templates">Country :</label>
          <input readonly type="text" id="country" name="country" value="<?php echo $user["country"]?>" class="profile-info profile-info-js">
          <button type="button" name="country-edit" class="btn-edit edit-button-js">Edit</button>
          <button style="display: none" type="submit" name="country-submit" class="btn-cancel-submit submit-button-js">Submit</button>
          <button style="display: none" type="button" name="country-submit" class="btn-cancel-submit cancel-button-js">Cancel</button>
        </form>
        <form action="includes/updateUser-inc.php" method="post">
          <label for="phone-number" class="profile-info-templates">Phone Number :</label>
          <input readonly type="number" id="phone-number" name="phone-number" value="<?php echo $user["phoneNumber"]?>" class="profile-info profile-info-js">
          <button type="button" name="phone-number-edit" class="btn-edit edit-button-js">Edit</button>
          <button style="display: none" type="submit" name="phone-number-submit" class="btn-cancel-submit submit-button-js">Submit</button>
          <button style="display: none" type="button" name="phone-number-cancel" class="btn-cancel-submit cancel-button-js">Cancel</button>
        </form>
      </div>

      <form class="profile-cv" action="includes/updateUser-inc.php" method="post">
        <label for="cv"></label>
        <textarea readonly id="cv" name="cv" style="overflow:auto;resize:none" class="profile-info profile-cv-create profile-info-js"><?php echo $user["cv"]?></textarea>
        <button type="button" name="cv-edit" class="btn-edit btn-edit-cv edit-button-js">Edit</button>
        <button style="display: none" type="submit" name="cv-submit" class="btn-cancel-submit submit-button-js">Submit</button>
        <button style="display: none" type="button" name="cv-cancel" class="btn-cancel-submit cancel-button-js">Cancel</button>
      </form>
      <!--<input type="submit" id="submit" value="Submit" class="btn-submit"> -->
    </div>


    <!------------------------------------------------------->
    <footer class="footer">
      <div class="footer-container">
        <div class="footer-row">
          <div class="footer-col">
            <h4>Logo</h4>
            <ul class="footer-ul">
              <li><a href="index.php">Login</a></li>
              <li><a href="adds.php">Jobs</a></li>
              <li><a href="#">Stats</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>Get Started</h4>
            <ul class="footer-ul">
              <li><a href="create-account.php">Create Account</a></li>
              <!--<li><a href="#">Create CV</a></li>-->
              <li><a href="#">Meetings/Conference</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>Contact</h4>
            <ul class="footer-ul">
              <li><a href="about.php">About us</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="index.php#social-media-container">Social Media</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

</body>
</html>