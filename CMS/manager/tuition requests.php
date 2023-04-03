<?php include "../includes/functions.php"; ?>

<?php
ob_start();
connect_to_db();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Manager</title>
    <link rel='stylesheet' type='text/css' media='screen' href=''>
    <script src=''></script>
</head>

<body>
    <h1>Manager</h1>
    <nav>
        <ul>
            <li><a href="tuition requests.php">tuition requests 🔗</a></li>
            <!-- <li><a href="">verify ✅</a></li> -->
            <li><a href="">dashboard 🛹</a></li>
            <li><a href="">clients 👤</a></li>

        </ul>
    </nav>

    <p>Manager - Tuition Requests</p>
    <table>
        <tr>
            <th>id</th>
            <th>parent name</th>
            <th>student name</th>
            <th>class</th>
            <th>subjects</th>
            <th>location</th>
            <th>additional notes</th>
            <th>CRUD actions</th>
        </tr>

        <?php
        read_tuition_requests();

        ?>



    </table>
    <?php
    delete_tuition_requests();

    edit_tuition_requests();

    update_tuition_requests();
    ?>
</body>

</html>