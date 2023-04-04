<?php include "../includes/functions.php"; ?>
<?php
connect_to_db();



if (isset($_POST["submit"])) {
    $parent_name = $_POST['parent_name'];
    $student_name = $_POST['student_name'];
    $student_class = $_POST['student_class'];
    $student_subjects = $_POST['student_subjects'];
    $teaching_location = $_POST['teaching_location'];
    $additional_notes = $_POST['additional_notes'];


    // SAVE INFO TO DATABASE
    $query = queryline("INSERT INTO `tuition request`( `parent name`, `student name`, `student class`, `student subjects`, `teaching location`, `additional notes`) 
                        VALUES ( '$parent_name', '$student_name', '$student_class', '$student_subjects', '$teaching_location', '$additional_notes')");

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    } else {
        echo "Form submitted successfully! 😁";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Request a tuition</title>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/blog-home.css" rel="stylesheet">
    <script src='../js/main.js'></script>
</head>

<body>
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
        </div>
        <!-- <ul>
            <li><a href="">tutors list</a></li>
            <li><a href="">how to use</a></li>
            <li><a href="">become a tutor</a></li>
        </ul> -->
    </nav>
    <h1>Request for a tuition </h1>
    <form action="request a tuition.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="parent_name">parent name</label>
            <input type="text" class="form-control" name="parent_name">
        </div>

        <div class="form-group">
            <label for="student_name">student name</label>
            <input type="text" class="form-control" name="student_name">
        </div>

        <div class="form-group">
            <label for="student_class">student class</label>
            <input type="text" class="form-control" name="student_class">
        </div>

        <div class="form-group">
            <label for="student_subjects">student subjects</label>
            <input type="text" class="form-control" name="student_subjects">
        </div>

        <div class="form-group">
            <label for="teaching_location">teaching location</label>
            <input type="text" class="form-control" name="teaching_location">
        </div>

        <div class="form-group">
            <label for="additional_notes">additional notes</label>
            <input type="text" class="form-control" name="additional_notes">
        </div>




        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="submit" value="submit">
        </div>


    </form>
</body>

</html>