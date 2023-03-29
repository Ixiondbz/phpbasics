<?php
include 'connect_db.php';
include 'functions.php';

if (isset($_POST['submit'])) {
    $items = $_POST['items'];
    $id = $_POST['id'];
    /*
    UPDATE `shopping cart` SET 
    `items` = '1 dozen eggs' 
    WHERE `shopping cart`.`id` = 1
    */
    $query = "UPDATE `shopping cart` SET ";
    $query .= "`items` = '$items' ";
    $query .= "WHERE `shopping cart`.`id` =  $id ";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed");
    }

    echo "Updated! 😁";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD Home page</title>
</head>

<body>
    <h1>update a shopping cart</h1>
    <!-- select id from dropdown menu -->

    <!-- write updated information -->
    <form action="update.php" method="post">
        <select name="id" id="">
            <?php
            show_all_ids_in_dropdown_menu();
            ?>
        </select>
        <input type="text" name="items" id="" placeholder="write your updated shopping items     ">
        <br>
        <!-- click update button -->

        <button type="submit" name="submit">
            UPDATE
        </button>
    </form><a href="home.php">home</a>
</body>


</html>