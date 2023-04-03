<?php
include "../functions.php";

#connect to xampp database
connect_to_db();

// GET INFO FROM DATABASE
$query = queryline("SELECT * 
    FROM `tuition request`");

$result = mysqli_query($connection, $query);

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
        if (!$result) {
            die("Query Failed" . mysqli_error());
        } else {
            while ($row = mysqli_fetch_assoc($result)) {

                $id = $row['id'];

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
                    <?php
                    echo "<td>
                     <a href='tuition requests.php?delete={$id}'>Delete</a>
                     </td>";
                    echo "<td>
                     <a href='tuition requests.php?edit={$id}'>Edit</a>
                     </td>";
                    ?>

                </tr>


                <?php
            }
        }

        ?>



    </table>
    <?php
    // DELETE QUERY
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $query = queryline("DELETE FROM `tuition request` WHERE id={$delete_id}");
        $delete_query = mysqli_query($connection, $query);
        header("Location: tuition requests.php");
    }
    // EDIT QUERY
    if (isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];
        $query = queryline("SELECT * FROM `tuition request` WHERE id={$edit_id}");
        $tuition_request = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($tuition_request)) {
            $id = $row['id'];
            $parent_name = $row['parent name'];
            $student_name = $row['student name'];
            $student_class = $row['student class'];
            $student_subjects = $row['student subjects'];
            $teaching_location = $row['teaching location'];
            $additional_notes = $row['additional notes'];
            ?>
            <form action="tuition requests.php" method="post">

                <input value="<?php if (isset($parent_name)) {
                    echo $parent_name;
                } ?>" type="text" name="parent_name" id="">

                <input value="<?php if (isset($student_name)) {
                    echo $student_name;
                } ?>" type="text" name="student_name" id="">

                <input value="<?php if (isset($student_class)) {
                    echo $student_class;
                } ?>" type="text" name="student_class" id="">

                <input value="<?php if (isset($student_subjects)) {
                    echo $student_subjects;
                } ?>" type="text" name="student_subjects" id="">

                <input value="<?php if (isset($teaching_location)) {
                    echo $teaching_location;
                } ?>" type="text" name="teaching_location" id="">

                <input value="<?php if (isset($additional_notes)) {
                    echo $additional_notes;
                } ?>" type="text" name="additional_notes" id="">


                <input type="submit" name="update" value="update">

            </form>

            <?php
        }

        // header("Location: tuition requests.php");
    }
    // UPDATE QUERY
    if (isset($_POST['update'])) {
        $parent_name = $_POST['parent_name'];
        $student_name = $_POST['student_name'];
        $student_class = $_POST['student_class'];
        $student_subjects = $_POST['student_subjects'];
        $teaching_location = $_POST['teaching_location'];
        $additional_notes = $_POST['additional_notes'];


        $query = queryline("UPDATE `tuition request` 
            SET `student name`='{$student_name}', `parent name`='{$parent_name}',
            `student class`='{$student_class}', `student subjects`='{$student_subjects}',
            `teaching location`='{$teaching_location}', `additional notes`='{$additional_notes}'
            WHERE id={$id} ");

        $update_query = mysqli_query($connection, $query);

        if (!$update_query) {
            die("QUERY FAILED");
        } else {
            echo "Edit successful 😄";
        }

        header("Location: tuition requests.php");

    }
    ?>
</body>

</html>