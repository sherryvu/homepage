<?php
$con = mysqli_connect("localhost", "vuth", "jadeflag41", "vuth_wgccanteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}
if(isset($_GET['snack'])){
    $id = $_GET['snack'];
}else{
    $id = 1;
}

$this_snack_query = "SELECT Snack, Cost, Stock FROM snacks WHERE SnackID = '" . $id . "'";
$this_snack_result = mysqli_query($con, $this_snack_query);
$this_snack_record = mysqli_fetch_assoc($this_snack_result);
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
    <!--Snacks form-->
    <?php
    $all_snacks_query = "SELECT SnackID, Snack FROM snacks";
    $all_snacks_result = mysqli_query($con, $all_snacks_query);
    ?>
    <form name='snacks_form' id='snacks_form' method = 'get' action ='snack.php'>
        <select id = 'snack' name = 'snack'>
            <!--option-->
            <?php
            while($all_snacks_record = mysqli_fetch_assoc($all_snacks_result)){
                echo "<option value = '". $all_snacks_record['SnackID'] . "'>";
                echo $all_snacks_record['Snack'];
                echo "</option>";
            }
            ?>


        </select>
        <input type='submit' name='snack_button' value='show me the snack information'>

    </form>

    <h2>Snacks Information</h2>
    <?php
    echo "<p> Snack Name: " . $this_snack_record['Snack'] . "<br>";
    echo "<p> Cost: " . $this_snack_record['Cost'] . "<br>";
    echo "<p> Stock: " . $this_snack_record['Stock'] . "<br>";
    ?>
    <h2>Search For A Snack</h2>
    <form action ="" method="post">
        <input type="text" name='search'>
        <input type="submit" name="submit" name="search">
    </form>
    <?php
    if(isset($_POST['search'])) {
        $search = $_POST['search'];
        $query1 = "SELECT * FROM snacks WHERE Snack LIKE '%$search%'";
        $query = mysqli_query($con, $query1);
        $count = mysqli_num_rows($query);
        if($count == 0){
            echo "There was no search results!";

        }else{
            while ($row = mysqli_fetch_array($query)){
                echo $row ['Snack'];
                echo "<br>";
            }
        }
    }
    ?>
</main>
</body>