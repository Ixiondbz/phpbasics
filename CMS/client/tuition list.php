<?php include "../includes/functions.php"; ?>

<?php
#connect to xampp database
connect_to_db();
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
        read_tuition_requests_without_id();
        ?>
    </table>

</body>

</html>