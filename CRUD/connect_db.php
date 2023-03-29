<?php
$connection = mysqli_connect('localhost', 'root', '', 'exampledb');

if (!$connection) {
    die("Database connection failed! CRUD operations will not work. 😭" . mysqli_error($connection));
}
// echo "asd";
?>