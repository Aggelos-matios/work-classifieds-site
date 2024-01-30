<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image" href="images/logo.png">
    <link rel="stylesheet" type="text/css" href="about.css">
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
            <a class="active" href="about.php">About</a>
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



<div class="form-container-1">
    <div class="about-us-text">
        <h2>About us</h2>
        <p>Η ιστοσελίδα JobsOnline δημιουργήθηκε για την εργασία του μαθήματος Πληροφοριακά Συστήματα Παγκόσμιου Ιστου
            του τμήματος Πληροφορική ΑΠΘ. Υλοποιήσαμε το 8ο θέμα των SDGs, Decent work and economic growth, με σκοπό να
            διευκολύνουμε την εύρεση εργασίας ειδικά σε περιόδους κρίσης.</p>
    </div>

</div>

<div class="form-container-2">
    <div class="our-team-text">
        <h2>Our Team</h2>
        <div class="form-container-3">
            <div class="our-team-row">
                <div class="col-1">
                    <div class="our-team-col">
                        <div class="image-profile"></div>
                        <h4>Άγγελος Μάτιος</h4>
                        <p>Φοιτητής Τμήματος Πληροφορικής ΑΠΘ</p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="our-team-col">
                        <div class="image-profile"></div>
                        <h4>Άγγελος-Θεόφιλος Παντελαίος</h4>
                        <p>Φοιτητής Τμήματος Πληροφορικής ΑΠΘ</p>
                    </div>
                </div>
                <div class="col-3"><div class="our-team-col">
                    <div class="image-profile"></div>
                    <h4>Γιώργος Γιάντσιος</h4>
                    <p>Φοιτητής Τμήματος Πληροφορικής ΑΠΘ</p>
                </div></div>
            </div>
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