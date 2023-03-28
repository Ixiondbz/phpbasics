<?php
if (isset($_POST['submit'])) {
    $connection = 
    mysqli_connect('localhost','root','','exampledb');
    
    if($connection)
    {
        echo "You are connected to the Database! 😊";
    }
    else
    {
        die("Database connection failed");
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
    <h1>Test Database connection from XAMPP</h1>
    <form action="test_db_connection.php" method="post">
        <button type="submit" name="submit">
            Check connection
        </button>
    </form>
    <br>
    <a href="request_form.php">Request a tutor</a>
</body>

</html>