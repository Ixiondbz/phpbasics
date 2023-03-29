<?php
include 'connect_db.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD Home page</title>
</head>

<body>
    <h1>Read shopping carts</h1>

    <?php

    $query = "SELECT * ";
    $query .= "FROM `shopping cart` ";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error());
    }
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <pre>
            <?php
            print_r($row['items']);
            ?>
        </pre>
        <?php
    }
    ?>

    <a href="home.php">home</a>
</body>

</html>