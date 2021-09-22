<?php
$con = mysqli_connect("localhost", "vuth", "jadeflag41", "vuth_wgccanteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}
if(isset($_GET['weekly'])){
    $id = $_GET['weekly'];
}else{
    $id = 1;\
}
$all_weekly_query = "SELECT SpecialID, Day From weekly ORDER BY Weekly.SpecialID ASC, weekly.Day";
$all_weekly_result = mysqli_query($con, $all_weekly_query);

$this_weekly_query = "SELECT weekly.SpecialID, weekly.Day, foods.Food, drinks.Drink, fruits.Fruit, snacks.Snack, weekly.Cost
    FROM weekly, foods, drinks, fruits, snacks
    WHERE foods.FoodID = weekly.FoodID
    AND weekly.DrinkID = drinks.DrinkID
    AND weekly.FruitID = fruits.FruitID
    AND weekly.SnackID = snacks.SnackID AND weekly.SpecialID = '" .$id . "'";
$this_weekly_result = mysqli_query($con, $this_weekly_query);
$this_weekly_record = mysqli_fetch_assoc($this_weekly_result);
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
<main>
    <!--Weekly form-->
    <form name='weekly_form' id='weekly_form' method = 'get' action ='special.php'>
        <select id = 'weekly' name = 'weekly'>
            <!--option-->
            <?php
            while($all_weekly_record = mysqli_fetch_assoc($all_weekly_result)){
                echo "<option value = '". $all_weekly_record['SpecialID'] . "'>";
                echo $all_weekly_record['Day'];
                echo "</option>";
            }
            ?>
        </select>
        <input type='submit' name='weekly_button' value='show me the weekly special information'>

    </form>
    <h2>Weekly Special Information</h2>
    <?php
    echo"<p> Day: " . $this_weekly_record['Day'] . "<br>";
    echo "<p> Food Item: " . $this_weekly_record['Food'] . "<br>";
    echo "<p> Drink Item: " . $this_weekly_record['Drink'] . "<br>";
    echo "<p> Fruit Item: " . $this_weekly_record['Fruit'] . "<br>";
    echo "<p> Snack Item: " . $this_weekly_record['Snack'] . "<br>";
    echo "<p> Cost: " . $this_weekly_record['Cost'] . "<br>";
    ?>

</main>
</body>