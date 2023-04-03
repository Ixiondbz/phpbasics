<?php include "../includes/functions.php"; ?>
<?php

connect_to_db();


?>

<!DOCTYPE html>
<html>

<head>
    <title>Homepage</title>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/styles.css'>
    <script src='../js/main.js'></script>
</head>

<body>
    <h1>Tuition Platform</h1>
    <nav>
        <ul>
            <li><a href="request a tuition.php">request a tuition</a></li>
            <!-- <li><a href="">tutors list</a></li> -->
            <!-- <li><a href="">how to use</a></li> -->
            <!-- <li><a href="">become a tutor</a></li> -->
            <li><a href="tuition list.php">tuition list</a></li>
            <!-- <li><a href="">login</a></li> -->
        </ul>
    </nav>

    <form action="tuition search.php" method="post">
        <p>Search for tuitions near you!</p>
        <input type="search" name="search" id="" placeholder="search by locations">
        <input type="submit" name="submit">
    </form>

    <footer>
        <ul>
            <li><a href="">Privacy policy</a></li>
            <li><a href="">Contact us</a></li>
            <li><a href="">About us</a></li>
        </ul>
    </footer>
</body>

</html>