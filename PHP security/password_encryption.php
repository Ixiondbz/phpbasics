<?php
include "connect_db.php";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $hash_format = "$2y$10$";
    $salt = "iusesomecrazystrings22";
    $hashF_and_salt = $hash_format . $salt;
    $password = crypt($password, $hashF_and_salt);

    $query = "INSERT INTO `user`(`name`,`password`) ";
    $query .= "VALUES('$name','$password') ";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed");
    }

    echo "User Submitted! 😁";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Password encryption test</title>
</head>

<body>
    <h1>Password encryption test</h1>
    <form action="password_encryption.php" method="post">
        <input type="text" name="name" id="" placeholder="write your name">
        <br>
        <input type="password" name="password" id=""placeholder="write your password">
        <button type="submit" name="submit">
            Submit
        </button>
    </form>

</body>

</html>