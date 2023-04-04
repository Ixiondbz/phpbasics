<?php include "../includes/functions.php"; ?>

<?php
#connect to xampp database
connect_to_db();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Homepage</title>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/blog-home.css" rel="stylesheet">
    <script src='../js/main.js'></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="homepage.php">TuitionPlatform</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="request a tuition.php">Request a tuition</a>
                        </li>
                        <li>
                            <a href="tuition list.php">Tuition list</a>
                        </li>
                        <li>
                            <a href="">Login</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- <ul>
            <li><a href="">tutors list</a></li>
            <li><a href="">how to use</a></li>
            <li><a href="">become a tutor</a></li>
        </ul> -->
        </nav>

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




</body>

</html>