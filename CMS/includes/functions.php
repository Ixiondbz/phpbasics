<?php ob_start();
?>
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
        die("Query Failed" . mysqli_error($connection));
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

            <!-- <table class="table table-bordered table-hover">
                <tr>
                    <td>parent anme</td>
                    <td>student name</td>
                    <td>class</td>
                    <td>subjects</td>
                    <td>location</td>
                    <td>additional notes</td>
                </tr>
            </table> -->

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
        echo "Deleted successfully";
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
                    die("Query Failed" . mysqli_error($connection));
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

function is_method($method = null)
{
    if ($_SERVER['REQUEST_METHOD'] == strtoupper($method)) {

        return true;
    }

    return false;
}

function redirect($location)
{
    header("Location:" . $location);
    exit;
}

function login_user($email_or_phone, $password)
{
    global $connection;
    $email_or_phone = mysqli_real_escape_string($connection, trim($email_or_phone));
    $password = mysqli_real_escape_string($connection, trim($password));

    $query = queryline("SELECT * from user WHERE user_email = ? OR user_phone = ?");
    $statement = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($statement, 'ss', $email_or_phone, $email_or_phone);
    mysqli_stmt_execute($statement);
    mysqli_stmt_bind_result($statement, $user_id, $user_full_name, $user_email, $user_phone, $user_type, $user_password, $user_image);
    mysqli_stmt_fetch($statement);

    if (!mysqli_stmt_num_rows($statement) === 0) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    $db_user_id = $user_id;
    $db_user_full_name = $user_full_name;
    $db_user_email = $user_email;
    $db_user_phone = $user_phone;
    $db_user_type = $user_type;
    $db_user_password = $user_password;
    $db_user_image = $user_image;


    if (password_verify($password, $db_user_password)) {

        $_SESSION['user_email'] = $db_user_email;
        $_SESSION['user_phone'] = $db_user_phone;
        $_SESSION['user_full_name'] = $db_user_full_name;
        $_SESSION['user_type'] = $db_user_type;
        redirect("index.php");
    } else {
        echo "authentication failed";

        return false;
    }


    return true;
}
function get_email_or_blank($str)
{
    $email_regex = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E\\pL\\pN]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F\\pL\\pN]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E\\pL\\pN]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F\\pL\\pN]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iDu';
    if (preg_match($email_regex, $str)) {
        return $str;
    }
    return '';
}
function get_phone_or_blank($str)
{
    $phone_regex = '/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/';
    if (preg_match($phone_regex, $str)) {
        return $str;
    }
    return '';
}
function register_user($email_or_phone, $password)
{

    global $connection;

    $email_or_phone = mysqli_real_escape_string($connection, $email_or_phone);
    $password = password_hash(mysqli_real_escape_string($connection, $password), PASSWORD_BCRYPT, array('cost' => 12));
    // echo "asd";
    // return;
    $email = get_email_or_blank($email_or_phone);
    $phone = get_phone_or_blank($email_or_phone);

    $query = queryline("INSERT INTO user(user_email, user_phone, user_password)");
    $query .= queryline("VALUES(?,?,?)"); // order: user_email, user_phone, user_password
    $statement = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($statement, 'sss', $email, $phone, $password);
    mysqli_stmt_execute($statement);
    // mysqli_stmt_bind_result($statement, $result);
    // mysqli_stmt_fetch($statement);

    if (!mysqli_stmt_affected_rows($statement) === 0) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    echo "registered";
}

?>