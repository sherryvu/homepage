<?php
$con = mysqli_connect("localhost", "vuth", "jadeflag41", "vuth_wgccanteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> WGC CANTEEN </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
<header>
    <div class="top_section">
        <img src="wgc_logo.jpg" alt="WGC logo" class="logo" width="150" height="150">
        <h1> Welcome to WGC Canteen </h1>
    </div>
</header>
<nav>
    <div class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li> <a href='menu.php'> Our Menu </a></li>
            <li> <a href='special.php'> Weekly Special </a></li>
        </ul>
    </div>
</nav>
<div class="center">
    <img src="menu_picture.jpg" alt="Menu" style="width:100%; height:400px">
    <div class="centered"><a href="menu.php">View Our Menu</a></div>
</div>
<main>
    <section class="more_info">
        <div class="container">
            <h3> Opening Hours: </h3>
            <p>
                <span>Monday:</span>
                12:00am - 1:00pm <br>
                <span>Tuesday:</span>
                12:00am - 1:00pm <br>
                <span>Wednesday:</span>
                12:30am - 1:30pm<br>
                <span>Thursday:</span>
                12:00am - 1:00pm <br>
                <span>Friday:</span>
                12:00am - 1:00pm <br>
            </p>
            <h3> Contact Us: </h3>
            <p><span>Email:</span>
                wgc_canteen@wgc.school.nz <br>
                <span>Phone number:</span>
                022 678 4930 <br>
            </p>
            <p>
                Follow us on:<br>
                <a href="https://www.instagram.com/wgcteamteal/">
                    <img alt="Instagram" src="Ig_logo.png" width="50" height="50">
                </a>
                <a href="https://www.facebook.com/">
                    <img alt="Facebook" src="fb_logo.jpeg" width="50" height="50">
                </a>
            </p>
        </div>
        <div class="more_info_right">
            <h3>About Us:</h3>
            <p><span> WGC Canteen is the best school canteen in Wellington.
                      We have amazing food in the world include some Asian
                      food as well. It's a totally successful school canteen
                      for the past 20 years.</span>
            </p>
            <h3> Our location: </h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2998.536516319144!2d174.77800201577773!3d-41.27542644765845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d38ae2f27710d0d%3A0x2d0763d38f00974b!2sWellington%20Girls&#39;%20College!5e0!3m2!1sen!2snz!4v1632725135227!5m2!1sen!2snz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
</main>
</body>
</html>
