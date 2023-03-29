<?php
include 'connect_db.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD Home page</title>
</head>

<body>
    <h1>create a shopping cart</h1>
    <form action="create.php" method="post">
        <input type="text" name="items" id="" placeholder="write your shopping items     ">
        <br>
        <button type="submit" name="submit">
            CREATE
        </button>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $items = $_POST['items'];

        $query = "INSERT INTO `shopping cart`(`items`) ";
        $query .= "VALUES('$items') ";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed" . mysqli_error());
        }
        
        echo "New shopping cart created! 😁";
    }
    ?>

    <a href="home.php">home</a>
</body>

</html>