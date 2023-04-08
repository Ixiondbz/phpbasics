<?php include "../includes/functions.php"; ?>
<?php
connect_to_db();
?>
<!DOCTYPE html>
<html>

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

                <table class="table table-bordered table-hover">



                    <?php
                    $query = queryline("DESC user");
                    $statement = mysqli_prepare($connection, $query);
                    mysqli_stmt_execute($statement);
                    $result = mysqli_stmt_get_result($statement);
                    echo "<tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<th>";
                        echo $row['Field'];
                        echo "</th>";
                    }
                    echo "</tr>";


                    // <th>user_id</th>
                    // <th>user_full_name</th>
                    // <th>user_type</th>


                    $excluded_user_type = 'manager';
                    $query = queryline("SELECT * FROM user");
                    $query .= queryline("WHERE user_type != ? ");
                    $statement = mysqli_prepare($connection, $query);
                    mysqli_stmt_bind_param($statement, 's', $excluded_user_type);
                    mysqli_stmt_execute($statement);
                    $result = mysqli_stmt_get_result($statement);
                    // mysqli_stmt_bind_result($statement, $user_id,$user_full_name,$user_type);
                    // mysqli_stmt_fetch($statement);


                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        foreach ($row as $key => $value) {
                            echo "<td>" . $value . "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                    <!-- <tr>
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                    </tr> -->
                </table>
            </div>

        </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>





</body>

</html>