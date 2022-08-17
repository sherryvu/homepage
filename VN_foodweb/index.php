<?php
$con = mysqli_connect("localhost", "vuth", "jadeflag41", "vuth_vnfood");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else {
    echo "connected to database";
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
<head>
    <title> Viet Food </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<header>
    <h1> Viet Food </h1>
</header>
<nav>
    <div class="nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li> <a href='menu.php'> Our Menu </a></li>
            <li> <a href='special.php'> Special Deal </a></li>
        </ul>
    </div>
</nav>
</body>
</html>