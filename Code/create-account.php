<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image" href="images/logo.png">
    <link rel="stylesheet" type="text/css" href="profile.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" type="text/css" href="navigation.css">
    <script src="https://kit.fontawesome.com/d2d45c5ac5.js" crossorigin="anonymous"></script>

    <title>JobsOnline-Create-Account</title>
    <script src="navigation.js" async></script>

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

    <form class="profile-info-div" action="includes/signup-inc.php" method="post">
      <div class="profile-box">
          <div>
              <label for="username" class="profile-info-templates">Username :  </label>
              <input type="text" id="username" name="username" class="profile-info">
          </div>
            <div>
              <label for="email" class="profile-info-templates">Email : </label>
              <input type="email" id="email" name="email" class="profile-info">
            </div>
            <div>
              <label for="password" class="profile-info-templates">Password : </label>
              <input type="password" id="password" name="password" class="profile-info">
            </div>
            <div>
              <label for="verify-password" class="profile-info-templates">Verify password : </label>
              <input type="password" id="verify-password" name="verify-password" class="profile-info">
            </div>
            <div>
              <label for="fullname" class="profile-info-templates">Full name : </label>
              <input type="text" id="fullname" name="fullname" class="profile-info">
            </div>
            <div>
              <label for="date" class="profile-info-templates">Birth : </label>
              <input type="date" id="date" name="date" class="profile-info">
            </div>
            <div>
              <label for="country" class="profile-info-templates">Country : </label>
              <input type="text" id="country" name="country" class="profile-info">
            </div>
            <div>
              <label for="phone-number" class="profile-info-templates">Phone Number : </label>
              <input type="number" id="phone-number" name="phone-number" class="profile-info">
            </div>
          <?php
            if (isset($_GET["error"])){
                if ($_GET["error"] == "emptyinput"){
                    echo "<p>Fill in all fields!</p>";
                }else if ($_GET["error"] == "invaliduid"){
                    echo "<p>Invalid username!</p>";
                }else if ($_GET["error"] == "invalidemail"){
                    echo "<p>Invalid email!</p>";
                } else if ($_GET["error"] == "passwordsdontmatch"){
                    echo "<p>Passwords don't match!</p>";
                }else if ($_GET["error"] == "usernametaken"){
                    echo "<p>Username already exists!</p>";
                }
            }
          ?>

      </div>

      <div class="profile-cv">
        <label for="cv">Type your CV </label>
        <textarea id="cv"  name="cv" style="overflow:auto;resize:none" class="profile-info profile-cv-create"></textarea>
      </div>
        <button type="submit" name="submit" class="btn-submit">Submit</button>
    </form>

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