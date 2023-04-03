<?php

function connect_to_db()
{
    global $connection;
    $connection = mysqli_connect('localhost', 'root', '', 'tuitionplatform');
    if (!$connection) {
        echo "Failed to connect to database! 😥";
    }
    // else 
    // {
    //     echo "yea buddy";
    // }
}
function queryline($query_string)
{
    return $query_string . " ";
}

function echobr($string_var)
{
    echo $string_var;
    echo "<br>";
}

function read_tuition_requests()
{
    global $connection;
    // GET INFO FROM DATABASE
    $query = queryline("SELECT * 
FROM `tuition request`");

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
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
}

function read_tuition_requests_without_id()
{
    global $connection;
    // GET INFO FROM DATABASE
    $query = queryline("SELECT `parent name`, `student name`, `student class`, `student subjects`, 
`teaching location`, `additional notes` 
FROM `tuition request`");

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error());
    } else {
        while ($row = mysqli_fetch_assoc($result)) {

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

}

function update_tuition_requests()
{
    global $connection;
    // UPDATE QUERY
    if (isset($_POST['update'])) {
        $edit_id = $_POST['edit_id'];

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
        WHERE id={$edit_id} ");

        $update_query = mysqli_query($connection, $query);

        if (!$update_query) {
            die("QUERY FAILED");
        } else {
            echo "Query successful 😄";
            header("Location: tuition requests.php");
        }
    }
}

function edit_tuition_requests()
{
    global $connection;
    // EDIT QUERY
    if (isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];
        $query = queryline("SELECT * FROM `tuition request` WHERE id={$edit_id}");
        $tuition_request = mysqli_query($connection, $query);

        // GENERATE TEXT BOXES SHOWING INFO OF THE SELECTED ROW
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
                <input type="hidden" name="edit_id" value="<?php if (isset($id)) {
                    echo $id;
                } ?>" />

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


    }
}

function delete_tuition_requests()
{
    global $connection;
    // DELETE QUERY
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $query = queryline("DELETE FROM `tuition request` WHERE id={$delete_id}");
        $delete_query = mysqli_query($connection, $query);
        header("Location: tuition requests.php");
    }
}

function search_tuitions_by_location()
{
    global $connection;

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

                <?php
            }
        }
    }
}

?>