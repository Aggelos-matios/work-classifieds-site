<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" type="text/css" href="navigation.css">

    <script src="https://kit.fontawesome.com/d2d45c5ac5.js" crossorigin="anonymous"></script>
    <script src="index.js" async></script>
    <script src="navigation.js" async></script>
    <!--Icons from FontAwesome-->
    <link rel="shortcut icon" type="image" href="images/logo.png">
    <title>JobsOnline</title>
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
            <a class="active" href="#home">Home</a>
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
    <div class="title">
        <h1>JobsOnline</h1><hr>
        <p>Choose A job you love, and you will never have to work a day in your life!</p>
        <button class="login-btn" id="poplogin">LOGIN</button>
    </div>
</div>

<!--------------------popup window------------------------->
<div class="popup">
    <div class="popup-content">
        <i class="fas fa-times" id="close"></i>
        <h3>Account</h3>
        <form action="includes/login-inc.php" method="post">
            <input type="text" name="name" placeholder="Username/Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit"  class="confirm-login-btn">Sign in</button>
            <?php
            if (isset($_GET["error"])){
                if ($_GET["error"] == "emptyinput"){
                    echo "<p>Fill in all fields!</p>";
                }else if ($_GET["error"] == "userdoesntexist"){
                    echo "<p>User doesn't exist!</p>";
                }else if ($_GET["error"] == "wrondpassword"){
                    echo "<p>Wrong password!</p>";
                }
            }
            ?>
        </form>
        <!--<a href="#" class="confirm-login-btn">Sign in</a>-->
        <p>Not a member? <a href="create-account.php" class="singup">Sign up</a></p>
    </div>
</div>
<!--------------------------------------------------------->
<div class="bg2" id="tools">
    <div class="content">
        <h2>Jobs</h2>
        <p>
            Explore our featured content to find jobs that both match your interests and are looking for experts like you!
        </p>
        <a class="view-btn" href="adds.php">Here!</a>
    </div>
    <div class="content">
        <h2>Create Account</h2>
        <p>
            Create a new account now and live a better tomorrow!
        </p>
        <a class="view-btn" href="create-account.php">Go!</a>
    </div>
    <div class="content">
        <h2>Create Add</h2>
        <p>
            Are you looking for new employs to hire? Create your own add and let them know!
        </p>
        <a class="view-btn" href="createAdd.php">Go!</a>
    </div>
    <div class="content">
        <h2>About</h2>
        <p>
            Learn about us.
        </p>
        <a class="view-btn" href="about.php">Here</a>
    </div>
    <div class="content">
        <h2>Contact</h2>
        <p>
            Do you have any questions? Go ahead and contact us!
        </p>
        <a class="view-btn" href="contact.php">Here!</a>
    </div>
</div>
<!------------------------------------------------------->
<div id="social-media-container" class="social-container">
    <h1>Follow   us   on   Social   Media</h1>
    <div class="social-icons">
        <a href="https://www.facebook.com/" target="_blank">
            <i class="fab fa-facebook-square"></i>
        </a>
        <a href="https://gr.linkedin.com/" target="_blank">
            <i class="fab fa-linkedin"></i>
        </a>
        <a href="https://twitter.com/" target="_blank">
            <i class="fab fa-twitter-square"></i>
        </a>
        <a href="https://github.com/" target="_blank">
            <i class="fab fa-github-square"></i>
        </a>
        <a href="https://www.google.com/" target="_blank">
            <i class="fab fa-google-plus-square"></i>
        </a>
    </div>
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
                    <li><a href="#social-media-container">Social Media</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>


</body>
</html>
