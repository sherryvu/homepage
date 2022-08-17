<?php
$con = mysqli_connect("localhost", "vuth", "jadeflag41", "vuth_vnfood");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();
}
else {
    echo "connected to database";
}
if(isset($_GET['menu'])){
    $id = $_GET['menu'];
}else {
    $id = 1;
}
/* Create the SQL Query */
$this_menu_query = "SELECT EngName, VietName, Price, Food_Type FROM menu WHERE Food_ID = '".$id. "'";
/* Perform the query against the database */
$this_menu_result = mysqli_query($con, $this_menu_query);
/* Fetch the result into an associate array */
$this_menu_record = mysqli_fetch_assoc($this_menu_result);
?>
<! DOCTYPE html>
<html lang="en">
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
<body>

</body>
</html>

