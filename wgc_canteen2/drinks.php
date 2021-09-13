<?php
$con = mysqli_connect("localhost", "vuth", "jadeflag41", "vuth_wgccanteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}
if(isset($_GET['drink'])){
    $id = $_GET['drink'];
}else{
    $id = 1;
}

$this_drink_query = "SELECT Drink, Cost, Stock FROM drinks WHERE DrinkID = '" . $id . "'";
$this_drink_result = mysqli_query($con, $this_drink_query);
$this_drink_record = mysqli_fetch_assoc($this_drink_result);
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
    <h1> Our Menu </h1>
    <nav>
        <ul>
            <li> <a href='index.php'> Home </a></li>
            <li> <a href='menu.php'> Our Menu </a></li>
            <li> <a href='special.php'> Weekly Special </a></li>
        </ul>
    </nav>
</header>

<nav>
    <ul>
        <li> <a href='drinks.php'> Drinks </a></li>
        <li> <a href='food.php'> Foods </a></li>
        <li> <a href='fruit.php'> Fruits </a></li>
        <li> <a href='snack.php'> Snacks </a></li>
    </ul>
</nav>
<main>
    <!--Drinks form-->
    <?php
    $all_drinks_query = "SELECT DrinkID, Drink FROM drinks";
    $all_drinks_result = mysqli_query($con, $all_drinks_query);
    ?>
    <form name='drinks_form' id='drinks_form' method = 'get' action ='drinks.php'>
        <select id = 'drink' name = 'drink'>
            <!--option-->
            <?php
            while($all_drinks_record = mysqli_fetch_assoc($all_drinks_result)){
                echo "<option value = '". $all_drinks_record['DrinkID'] . "'>'";
                echo $all_drinks_record['Drink'];
                echo "</option>";
            }
            ?>


        </select>
        <input type='submit' name='drinks_button' value='show me the drink information'>

    </form>

    <h2>Drinks Information</h2>
    <?php
    echo "<p> Drink Name: " . $this_drink_record['Drink'] . "<br>";
    echo "<p> Cost: " . $this_drink_record['Cost'] . "<br>";
    echo "<p> Stock: " . $this_drink_record['Stock'] . "<br>";
    ?>

    <h2>Search For A Drink</h2>
    <form action ="" method="post">
        <input type="text" name='search'>
        <input type="submit" name="submit" name="search">
    </form>
    <?php
    if(isset($_POST['search'])) {
        $search = $_POST['search'];
        $query1 = "SELECT * FROM drinks WHERE Drink LIKE '%$search%'";
        $query = mysqli_query($con, $query1);
        $count = mysqli_num_rows($query);
        if($count == 0){
            echo "There was no search results!";

        }else{
            while ($row = mysqli_fetch_array($query)){
                echo $row ['Drink'];
                echo "<br>";
            }
        }
    }
    ?>

</main>
</body>