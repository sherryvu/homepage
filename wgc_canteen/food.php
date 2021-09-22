<?php
$con = mysqli_connect("localhost", "vuth", "jadeflag41", "vuth_wgccanteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}
if(isset($_GET['food'])){
    $id = $_GET['food'];
}else{
    $id = 1;
}

$this_food_query = "SELECT Food, Cost, Stock FROM foods WHERE FoodID = '" . $id . "'";
$this_food_result = mysqli_query($con, $this_food_query);
$this_food_record = mysqli_fetch_assoc($this_food_result);
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
    <!--Foods form-->
    <?php
    $all_foods_query = "SELECT FoodID, Food FROM foods";
    $all_foods_result = mysqli_query($con, $all_foods_query);
    ?>
    <form name='foods_form' id='foods_form' method = 'get' action ='food.php'>
        <select id = 'food' name = 'food'>
            <!--option-->
            <?php
            while($all_foods_record = mysqli_fetch_assoc($all_foods_result)){
                echo "<option value = '". $all_foods_record['FoodID'] . "'>";
                echo $all_foods_record['Food'];
                echo "</option>";
            }
            ?>


        </select>
        <input type='submit' name='food_button' value='show me the food information'>

    </form>

    <h2>Foods Information</h2>
    <?php
    echo "<p> Food Name: " . $this_food_record['Food'] . "<br>";
    echo "<p> Cost: " . $this_food_record['Cost'] . "<br>";
    echo "<p> Stock: " . $this_food_record['Stock'] . "<br>";
    ?>

    <h2>Search For A Food</h2>
    <form action ="" method="post">
        <input type="text" name='search'>
        <input type="submit" name="submit" name="search">
    </form>
    <?php
    if(isset($_POST['search'])) {
        $search = $_POST['search'];
        $query1 = "SELECT * FROM foods WHERE Food LIKE '%$search%'";
        $query = mysqli_query($con, $query1);
        $count = mysqli_num_rows($query);
        if($count == 0){
            echo "There was no search results!";

        }else{
            while ($row = mysqli_fetch_array($query)){
                echo $row ['Food'];
                echo "<br>";
            }
        }
    }
    ?>

</main>
</body>