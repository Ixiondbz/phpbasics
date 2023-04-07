<?php include "../includes/functions.php"; ?>
<?php
connect_to_db();
?>
<?php

?>
<!DOCTYPE html>
<html>

<?php include "includes/header.php"; ?>

<body>
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Tuition Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Welcome <?php if (isset($_SESSION['user_email']) or isset($_SESSION['user_phone'])) {
                                // echo "logged in";
                                echo $_SESSION['user_full_name'];
                            } else echo "to TuitionPlatform" ?>
                    <small></small>
                </h1>

                <h4>Here you can find your desired tuitions according to your choice of place!</h4>

                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

            </div>

            <!-- Tuition Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Tuition Search Well -->
                <div class="well">
                    <h4>Tuition Search</h4>
                    <p>Search for tuitions near you 😊</p>

                    <form action="tuition search.php" method="post">
                        <div class="input-group">
                            <input class="form-control" type="search" name="search" id="" placeholder="search by locations">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>

                    <!-- /.input-group -->
                </div>

                <!-- Tuition Categories Well -->
                <div class="well">
                    <h4>Tuition Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci
                        accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
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

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
</body>

</html>