<?php include "includes/base.php"; ?>


<!DOCTYPE html>
<html lang="en">

<?php
include "includes/header.php";
?>

<body>
    <div id="wrapper">

        <?php
        include "includes/navigation.php";
        ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manager
                            <small>Basepage</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="">⚾ Basepage</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page

                            </li>
                        </ol>
                        <?php
                        // session_start();
                        $session = session_id();
                        // echo $session;
                        $time = time();
                        $time_out_in_seconds = 20;
                        $time_out = $time - $time_out_in_seconds;

                        $query = queryline("SELECT * FROM users_online WHERE session = '$session'");
                        $send_query = mysqli_query($connection, $query);
                        $count = mysqli_num_rows($send_query);
                        echobr($count);

                        if ($count == NULL) {
                            echo "null";
                            mysqli_query($connection, "INSERT INTO users_online(session,time) VALUES('$session','$time')");
                        } else {
                            echo "else";
                            mysqli_query($connection, "UPDATE users_online SET time='$time' WHERE session='$session'");
                        }
                        $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
                        $count_user = mysqli_num_rows($users_online_query);
                        echo $count_user;
                        ?>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>