<?php
if (isset($_POST['submit'])) {
    $parent_name = $_POST['parent_name'];
    $student_name = $_POST['student_name'];
    $location = $_POST['location'];
    $class = $_POST['class'];


    $connection =
        mysqli_connect('localhost', 'root', '', 'exampledb');

    $query = "INSERT INTO `request tutor` (`parent name`, `student name`, `location`, `class`) ";
    $query .= "VALUES ('$parent_name', '$student_name', '$location', '$class')";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error());
    } else {
        echo "Request submitted successfully! 😁";
    }

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Request</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <h1>Request Form</h1>
    <form action="request_form.php" method="post">
        <input type="text" name="parent_name" id="" placeholder="parent name">
        <br>
        <input type="text" name="student_name" id="" placeholder="student name">
        <br>
        <input type="text" name="location" id="" placeholder="location">
        <br>
        <input type="text" name="class" id="" placeholder="class">
        <button type="submit" name="submit">
            Submit
        </button>
    </form>
    <br>
    <a href="test_db_connection.php">Test database connection</a>
</body>

</html>