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
    <h1>Search results...</h1>
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
    <table>
        <tr>
            <th>parent name</th>
            <th>student name</th>
            <th>class</th>
            <th>subjects</th>
            <th>location</th>
            <th>additional notes</th>
        </tr>
        <?php

        search_tuitions_by_location();

        ?>
    </table>

    <div>
        <a href="homepage.php">Search again</a>
    </div>
    <footer>
        <ul>
            <li><a href="">Privacy policy</a></li>
            <li><a href="">Contact us</a></li>
            <li><a href="">About us</a></li>
        </ul>
    </footer>
</body>

</html>