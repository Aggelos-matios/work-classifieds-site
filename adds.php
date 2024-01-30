<?php
    session_start();

    require_once 'includes/dbHandler-inc.php';
    require_once 'includes/functions-inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--links for my folders-->
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
            <a class="active" href="adds.php">Jobs</a>
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
    <div class="logo-top top">
        <h3>Jobsonline</h3>
    </div>
</div>

<!------------------------------------------------------->
<div class="create-add-btn-div">
    <?php
        if (isset($_GET["error"]) && $_GET["error"] === "loginfirst"){
            echo "Login is required!";
        }
    ?>
    <a href="createAdd.php">Create add</a>
</div>

<div class="grid">
    <div class="filters">
        <h4>filters</h4><hr>
        <form class="filter-btns" method="post">
            <!--<button class="btn-submit" type="submit" name="submit">Submit</button>-->
            <div class="category">
                <b>City</b>
            </div>
            <div class="check-boxes">
                <?php
                 $results = getCities($conn);
                 $checked = [];
                 if (isset($_POST["city"])){
                     $checked = $_POST["city"];
                 }
                 foreach ($results as $result){?>
                    <input type="checkbox" name="city[]" onchange="this.form.submit()" value="<?php echo $result["name"]?>"
                        <?php if (in_array($result["name"], $checked)){ echo "checked";} ?>/>
                     <?php echo $result["name"]?> <br>

                <?php }?>
            </div><hr>
            <div class="category">
                <b>Country</b>
            </div>
            <div class="check-boxes">
                <?php
                $results = getCountries($conn);
                $checked = [];
                if (isset($_POST["country"])){
                    $checked = $_POST["country"];
                }
                foreach ($results as $result){?>
                    <input type="checkbox" name="country[]" onchange="this.form.submit()" value="<?php echo $result["name"]?>"
                        <?php if (in_array($result["name"], $checked)){ echo "checked";} ?>/>
                    <?php echo $result["name"]?> <br>

                <?php }?>
            </div><hr>
            <div class="category">
                <b>Expertise</b>
            </div>
            <div class="check-boxes">
                <?php
                $results = getExpertises($conn);
                $checked = [];
                if (isset($_POST["expertise"])){
                    $checked = $_POST["expertise"];
                }
                foreach ($results as $result){?>
                    <input type="checkbox" name="expertise[]" onchange="this.form.submit()" value="<?php echo $result["name"]?>"
                        <?php if (in_array($result["name"], $checked)){ echo "checked";} ?>/>
                    <?php echo $result["name"]?> <br>

                <?php }?>
            </div><hr>
            <div class="category">
                <b>Occupation</b>
            </div>
            <div class="check-boxes">
                <?php
                    $checked = [];
                    if (isset($_POST["occupation"])){
                        $checked = $_POST["occupation"];
                    }
                ?>
                <input type="checkbox" onchange="this.form.submit()" name="occupation[]" value="full-time"
                    <?php if (in_array("full-time", $checked)){ echo "checked";} ?>/> Πλήρη <br>
                <input type="checkbox" onchange="this.form.submit()" name="occupation[]" value="part-time"
                    <?php if (in_array("part-time", $checked)){ echo "checked";} ?>/> Μερική <br>
            </div><hr>
        </form>
    </div>

    <div class="products">
        <?php
            if (isset($_POST["city"]) || isset($_POST["country"]) || isset($_POST["expertise"]) || isset($_POST["occupation"])){
                $countries = [];
                $cities = [];
                $expertises = [];
                $occupations = [];
                if (isset($_POST["country"])){
                    $countries = $_POST["country"];
                }
                if (isset($_POST["city"])){
                    $cities = $_POST["city"];
                }
                if (isset($_POST["expertise"])){
                    $expertises = $_POST["expertise"];
                }
                if (isset($_POST["occupation"])){
                    $occupations = $_POST["occupation"];
                }
                $results = getAddsByFilter($conn, $countries, $cities, $expertises, $occupations);
                foreach ($results as $row){?>
                    <div class="block">
                        <div class="box-title">
                            <h4><?php echo $row[2] ?></php></h4>
                        </div>
                        <div class="description-div">
                            <p><?php echo $row[3] ?></p>
                        </div>
                        <div class="date">
                            <?php echo "Date: ". $row[8]?>
                        </div>
                        <div class="city">
                            <?php echo "City: " . $row[5] ?>
                        </div>
                        <div class="button-more">
                            <?php echo "<a href=add.php?id=$row[1]>more</a>"; ?>
                        </div>
                    </div>
                <?php }
        }else{
                $results = getAdds($conn);
                foreach ($results as $row){?>
                    <div class="block">
                        <div class="box-title">
                            <h4><?php echo $row["title"] ?></h4>
                        </div>
                        <div class="description-div">
                            <p><?php echo $row["description"] ?></p>
                        </div>
                        <div class="date">
                            <?php echo "Date: ". $row["date"]?>
                        </div>
                        <div class="city">
                            <?php echo "City: " . $row["city"] ?>
                        </div>
                        <div class="button-more">
                            <?php echo "<a href=add.php?id=$row[_id]>more</a>"; ?>
                        </div>
                    </div>
                <?php } ?>
        <?php } ?>

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

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>


</body>
</html>