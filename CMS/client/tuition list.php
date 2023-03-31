<?php
include "functions.php";
#connect to xampp database
connect_to_db();





// GET INFO FROM DATABASE
$query = queryline("SELECT `parent name`, `student name`, `student class`, `student subjects`, 
    `teaching location`, `additional notes` 
    FROM `tuition request`");

$result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Tuition list</title>
</head>

<body>
    <h1>Tuition list</h1>
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
        if (!$result) {
            die("Query Failed" . mysqli_error());
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <th>
                        <?php
                        echo $row['parent name'];
                        ?>
                    </th>
                    <th>
                        <?php
                        echo $row['student name'];
                        ?>
                    </th>
                </tr>
                <?php
            }
        }
        ?>
    </table>

</body>

</html>