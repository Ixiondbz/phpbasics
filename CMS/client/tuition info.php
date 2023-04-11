<?php include "../includes/functions.php"; ?>
<?php
connect_to_db();
?>
<?php
if (is_method('get')) {
    $tuition_id = escape_special_characters($_GET['edit']);
    // echo $tuition_id;
    $query = queryline("SELECT * FROM `user`");
    $query .= queryline("WHERE user_id='{$tuition_id}'");

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_row($result)) {
        echo $row['user_type'];
    }
}
?>

<!DOCTYPE html>
<html>

<?php include "includes/header.php"; ?>


<body>
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Tuition Sidebar Widgets Column -->
            <div class=" ">





            </div>
            <!-- Tuition Entries Column -->
            <div class=" ">

                <h1 class="page-header">
                    <small></small>
                </h1>

                <div class="container">
                    <div class="row">
                        <?php
                        // search_tuitions_by_location();
                        ?>
                    </div>

                </div>



            </div>



        </div>
        <!-- /.row -->

        <hr>


    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


    <?php include "includes/footer.php"; ?>

</body>

</html>