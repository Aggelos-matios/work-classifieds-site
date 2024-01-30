<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image" href="images/logo.png">
    <link rel="stylesheet" type="text/css" href="contact-style.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" type="text/css" href="navigation.css">
    <script src="https://kit.fontawesome.com/d2d45c5ac5.js" crossorigin="anonymous"></script>
    <script src="navigation.js" async></script>

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
            <a href="index.php">Home</a>
            <a href="adds.php">Jobs</a>
            <a href="about.php">About</a>
            <a class="active" href="contact.php">Contact</a>
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

<div class="img">
    <div class="contact-container-1">
        <div class="contact-text">
            <h2>Contact</h2>
            <p>Για περισσότερες πληροφορίες σχετικά με τον τρόπο λειτουργίας του JobsOnline,
                τη διαδικασία εγγραφής (εταιρείας ή χρήστη), τη δημοσίευση θέσεων εργασίας και
                τα πακέτα αγγελιών, μπορείτε να επικοινωνείτε μαζί μας συμπληρώνοντας την φόρμα παρακάτω.</p>

            <div class="contact-container-2"></div>

            <textarea placeholder="Type your email address here" cols="60" rows="1"></textarea>

            <div class="contact-container-3"></div>

            <textarea placeholder="Type your email here" cols="60" rows="10"></textarea>

            <div class="contact-container-3"></div>

            <div class="button">Submit</div>

            <div class="contact-container-2"></div>
        </div>
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
                    <li><a href="index.php#social-media-container">Social Media</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
