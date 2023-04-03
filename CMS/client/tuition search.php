<?php
include "../functions.php";

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
<?php
if (isset($_POST['submit'])) {
    $search_string = $_POST['search'];

    $query = queryline("SELECT `parent name`, `student name`, `student class`, `student subjects`, 
    `teaching location`, `additional notes` FROM `tuition request`
                       WHERE `teaching location` LIKE '%$search_string%'");

    $search_query = mysqli_query($connection, $query);
    if (!$search_query) {
        die('QUERY FAILED');
    } else {
        $count = mysqli_num_rows($search_query);
        if ($count == 0) {
            echo "no search results found ☹️";
        } else {
            ?>
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
                if (!$search_query) {
                    die("Query Failed" . mysqli_error());
                } else {
                    while ($row = mysqli_fetch_assoc($search_query)) {



                        ?>
                        <tr>
                            <?php
                            foreach ($row as $key => $value) {
                                ?>
                                <td>
                                    <?php
                                    echo $value;
                                    ?>
                                </td>
                                <?php
                            }

                            ?>
                        </tr>


                        <?php
                    }
                }

                ?>
            </table>

        <?php
        }
    }
}
?>

    <footer>
        <ul>
            <li><a href="">Privacy policy</a></li>
            <li><a href="">Contact us</a></li>
            <li><a href="">About us</a></li>
        </ul>
    </footer>
</body>

</html>