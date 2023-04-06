<?php include "../includes/functions.php"; ?>

<?php
#connect to xampp database
connect_to_db();
?>

<!DOCTYPE html>
<html>

<?php include "includes/header.php"; ?>


<body>
    <div id="wrapper">
        <?php include "includes/navigation.php"; ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="container-fluid">
                    <div class="col-xs-13">
                        <table class="table table-bordered table-hover">
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
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php include "includes/footer.php"; ?>


</body>

</html>