<?php include "../includes/functions.php"; ?>
<?php
connect_to_db();



if(isset($_POST["submit"]))
{
    $parent_name=$_POST['parent_name'];
    $student_name=$_POST['student_name'];
    $student_class=$_POST['student_class'];
    $student_subjects=$_POST['student_subjects'];
    $teaching_location=$_POST['teaching_location'];
    $additional_notes=$_POST['additional_notes'];


    // SAVE INFO TO DATABASE
    $query = queryline("INSERT INTO `tuition request`( `parent name`, `student name`, `student class`, `student subjects`, `teaching location`, `additional notes`) 
                        VALUES ( '$parent_name', '$student_name', '$student_class', '$student_subjects', '$teaching_location', '$additional_notes')");
    
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error());
    } else {
        echo "Form submitted successfully! 😁";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Request a tuition</title>
</head>

<body>
    <h1>Request a tuition</h1>

    <form action="request a tuition.php" method="post">
        <input type="text" name="parent_name" id="" placeholder="parent name">
        <input type="text" name="student_name" id="" placeholder="student name">
        <input type="text" name="student_class" id="" placeholder="student class">
        <input type="text" name="student_subjects" id="" placeholder="student subjects">
        <input type="text" name="teaching_location" id="" placeholder="teaching location">
        <input type="text" name="additional_notes" id="" placeholder="additional notes">

        <!-- <textarea name="" name="additional_notes" id="" placeholder="additional notes" cols="30" rows="10"></textarea> -->

        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>