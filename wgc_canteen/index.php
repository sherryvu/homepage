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
        <a herf="index.php"><img src="wgc_logo.jpg" alt="WGC logo" class="logo" width="150" height="150"</a>
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

</body>
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
            <h3> Contact Us </h3>
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
            <h3> Our location</h3>
            <span><img src='school_map.jpg' alt='WGC Location' width='850' length='400' ></span>
            
        </div>

</main>
</html>
