<?php
    session_start();

    if (!isset($_SESSION["userid"])){
        header("location: adds.php?error=loginfirst");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--links for my folders-->
    <link rel="stylesheet" type="text/css" href="create-add.css">
    <link rel="stylesheet" type="text/css" href="adds.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" type="text/css" href="navigation.css">
    <!--Icons from FontAwesome-->
    <script src="https://kit.fontawesome.com/d2d45c5ac5.js" crossorigin="anonymous"></script>
    <script src="index.js" async></script>
    <script src="navigation.js" async></script>

    <!--icon on top of the card-->
    <link rel="shortcut icon" type="image" href="images/logo.png">
    <title>JobsOnline</title>
</head>
<body>
<!------------Navigation for small screens-------->
<div id="myNav" class="mobile-nav">
    <a href="javascript:void(0)" class="X-btn" onclick="closeNav()">&times;</a>
    <div class="mobile-nav-content"><hr
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
    <div style="height: 50px">
    </div>
</div>
<!------------------------------------------------------->

<div class="add-div">
    <form action="includes/insertAdd-inc.php" method="post">
        <input class="add-info" name="add-title" placeholder="Title"> <br>
        <input class="add-info" name="add-country" placeholder="Country"> <br>
        <input class="add-info" name="add-city" placeholder="City"> <br>
        <input class="add-info" name="add-expertise" placeholder="Expertise"> <br>
        <input class="add-info" name="add-occupation" placeholder="Occupation(full-time or part-time)"> <br>
        <textarea class="add-info add-info-desc" name="add-description" placeholder="Description"></textarea> <br>
        <button class="add-submit-btn" type="submit" name="submit-add">Submit</button>
    </form>
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