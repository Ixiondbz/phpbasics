<?php
include "connect_db.php";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];

    $name = mysqli_real_escape_string($connection, $name);
    $query = "INSERT INTO `test sql injection`(`name`) ";
    $query .= "VALUES('$name') ";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error());
    }

    echo "Submitted! 😁";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>SQL injection test</title>
</head>

<body>
    <h1>SQL injection test</h1>
    <p>Apparently mysqli_real_escape_string doesn't prevent sql injections</p>
    <p>instead it allows special characters like '\n' to be inserted into the database</p>
    <form action="sql_injection.php" method="post">
        <input type="text" name="name" id="" placeholder="write any name">
        <br>
        <button type="submit" name="submit">
            submit
        </button>
    </form>

</body>

</html>