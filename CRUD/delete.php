<?php
include 'connect_db.php';
include 'functions.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    /*
    DELETE FROM `shopping cart` 
    WHERE `shopping cart`.`id` = 1
    */
    $query = "DELETE FROM `shopping cart` ";
    $query .= "WHERE `shopping cart`.`id` = $id ";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed");
    }

    echo "Deleted! 😁";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD Home page</title>
</head>

<body>
    <h1>Delete a shopping cart</h1>

    <form action="delete.php" method="post">
        <!-- select id from dropdown menu -->
        <select name="id" id="">
            <?php
            show_all_ids_in_dropdown_menu();
            ?>
        </select>
        <br>
        <!-- click delete button -->

        <button type="submit" name="submit">
            DELETE
        </button>
    </form>
    <a href="home.php">home</a>

</body>


</html>