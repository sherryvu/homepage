<?php
$con = mysqli_connect("localhost", "vuth", "jadeflag41", "vuth_wgccanteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}
if(isset($_GET['fruit'])){
    $id = $_GET['fruit'];
}else{
    $id = 1;
}

$this_fruit_query = "SELECT Fruit, Cost, Stock FROM fruits WHERE FruitID = '" . $id . "'";
$this_fruit_result = mysqli_query($con, $this_fruit_query);
$this_fruit_record = mysqli_fetch_assoc($this_fruit_result);
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
    <!--Fruits form-->
    <?php
    $all_fruits_query = "SELECT FruitID, Fruit FROM fruits";
    $all_fruits_result = mysqli_query($con, $all_fruits_query);
    ?>
    <form name='fruits_form' id='fruits_form' method = 'get' action ='fruit.php'>
        <select id = 'fruit' name = 'fruit'>
            <!--option-->
            <?php
            while($all_fruits_record = mysqli_fetch_assoc($all_fruits_result)){
                echo "<option value = '". $all_fruits_record['FruitID'] . "'>";
                echo $all_fruits_record['Fruit'];
                echo "</option>";
            }
            ?>


        </select>
        <input type='submit' name='fruit_button' value='show me the fruit information'>

    </form>

    <h2>Fruits Information</h2>
    <?php
    echo "<p> Fruit Name: " . $this_fruit_record['Fruit'] . "<br>";
    echo "<p> Cost: " . $this_fruit_record['Cost'] . "<br>";
    echo "<p> Stock: " . $this_fruit_record['Stock'] . "<br>";
    ?>

    <h2>Search For A Fruit</h2>
    <form action ="" method="post">
        <input type="text" name='search'>
        <input type="submit" name="submit" name="search">
    </form>
    <?php
    if(isset($_POST['search'])) {
        $search = $_POST['search'];
        $query1 = "SELECT * FROM fruits WHERE Fruit LIKE '%$search%'";
        $query = mysqli_query($con, $query1);
        $count = mysqli_num_rows($query);
        if($count == 0){
            echo "There was no search results!";

        }else{
            while ($row = mysqli_fetch_array($query)){
                echo $row ['Fruit'];
                echo "<br>";
            }
        }
    }
    ?>

</main>
</body>